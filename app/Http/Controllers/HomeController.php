<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Phpfastcache\Helper\Psr16Adapter;
use Goutte\Client;
use InstagramScraper\Instagram;
use Carbon\Carbon;
use App\User;
use PDF;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpParser\Node\Expr\PreInc;
use Fideloper\Proxy\TrustProxies as Middleware;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function notused(){
        $comments=DB::table('leaderboardcomments')->where('leaderboard_id',1)
            ->get();
        foreach ($comments as $comment){

            if (preg_match_all("/(^|[^\w])@([\w\_\.]+)/", $comment->text, $matches)) {
                if (count($matches) > 0) {
                    foreach ($matches[0] as $match) {
                        $unique_mentiones=DB::table('leaderboard_unique_mentiones')
                            ->where('leaderboard_id',1)
                            ->where('ownerId',$comment->ownerId)
                            ->where('text',str_replace(' ', '', $match))
                            ->first();
                        if(empty($unique_mentiones)){
                            $leaderboard_unique_mentionesData=array(
                                'leaderboard_id' =>1,
                                'text' => str_replace(' ', '', $match),
                                'ownername' =>$comment->ownername,
                                'ownerId' =>$comment->ownerId,
                                'ownername_profile_pic_url' =>$comment->ownername_profile_pic_url,
                                'created_at'=>Carbon::now(),
                            );
                            DB::table('leaderboard_unique_mentiones')->insert($leaderboard_unique_mentionesData);
                        }

                    }
                }
            }
        }


    }
    public function index()
    {
        return view('home');
    }

    public function CreateLeaderboard()
    {

        $leaderboardpackages=DB::table('leaderboardpackages')->get();
        return view('leaderboard/index',array('leaderboardpackages'=>$leaderboardpackages));
    }
    public function EditLeaderboard($id)
    {
        $leaderboard=DB::table('leaderboard')
            ->where('id',$id)
            ->first();
        return view('leaderboard/edit',array('leaderboard'=>$leaderboard));
    }

    public function ManageLeaderboard()
    {
        $leaderboardsActive=DB::table('leaderboard')
            ->where('active',1)
            ->first();
        if(!empty($leaderboardsActive)){
            $leaderboardsActive->leaderboard_end_date =Carbon::createFromTimestamp($leaderboardsActive->endtime)
                ->format('Y/m/d H:i:s');
        }
        $leaderboards=DB::table('leaderboard')
            ->get();
        if(!empty($leaderboards)){
            foreach ($leaderboards as $leaderboard){
                $t1 = Carbon::parse(Carbon::createFromTimestamp($leaderboard->endtime)
                    ->format('Y-m-d H:i:s'));
                $t2 =  Carbon::parse(Carbon::createFromTimestamp($leaderboard->starttime)
                    ->format('Y-m-d H:i:s'));
                $diff = $t1->diff($t2);
                $leaderboard->days=$diff->d;
                $leaderboard->hours=$diff->h;
                $leaderboard->mins=$diff->m;
                $leaderboard->secs=$diff->s;

                $media='';
                if($leaderboard->media_type=='image'){
                    $media='<img  src="'.$leaderboard->media_url.'">';
                }else{
                    $media='<video width="320" height="240" controls>';
                    $media.='<source src="movie.ogg" type="video/ogg">';
                    $media.='</video>';
                }
                $leaderboard->media=$media;
                $leaderboard->leaderboard_end_date =Carbon::createFromTimestamp($leaderboard->endtime)
                    ->format('Y/m/d H:i:s');
                $leaderboard->leaderboard_start_date =Carbon::createFromTimestamp($leaderboard->starttime)
                    ->format('Y/m/d H:i:s');
            }
        }


        return view('leaderboard/manageleaderboard' ,array('leaderboardsActive'=>$leaderboardsActive,'leaderboards'=>$leaderboards));
    }
    public function latestMentionBoard(Request $request)
    {
        $leaderboard=DB::table('leaderboard')
            ->where('id',$request->id)
            ->first();
        if(!empty($leaderboard)){
            $leaderboardleaderboardmentions=DB::table('leaderboard_unique_mentiones')
                ->select('ownerId', DB::raw('count(*) as totalMentiones'))
                ->where('leaderboard_id',$leaderboard->id)
                ->groupBy('ownerId')
                ->orderBy('totalMentiones', 'DESC')
                ->limit(100)
                ->get();
            $allboardleaderboardmentions=array();
            if(!empty($leaderboardleaderboardmentions)){
                foreach ($leaderboardleaderboardmentions as $leaderboardmentions){
                    $owner=DB::table('leaderboard_unique_mentiones')
                        ->where('ownerId',$leaderboardmentions->ownerId)
                        ->first();
                        $user=DB::table('users')
                        ->where('instagramid',$leaderboardmentions->ownerId)
                        ->first();
                    $leaderboardmentions->ownerflag=url("/assets/logos/annony.svg");
                    if(!empty($user)){
                        $leaderboardmentions->ownerflag=($user->flag != '') ? $user->flag : url("/assets/logos/annony.svg");
                    }
                    $leaderboardmentions->ownername=$owner->ownername;
                    $leaderboardmentions->ownername_profile_pic_url=$owner->ownername_profile_pic_url;
                    $allboardleaderboardmentions[]=$leaderboardmentions;
                }
                $leaderboard->post_mentions=$allboardleaderboardmentions;

            }

        }
        if(!empty($leaderboard->post_mentions)){
            return response()->json(['mentions'=>$leaderboard->post_mentions,'code'=>200],200);
        }else{
            return response()->json(['html'=>'','code'=>200],404);
        }
    }
    public function Leaderboard($id)
    {

        $leaderboard=DB::table('leaderboard')
            ->where('id',$id)
            ->first();
        if(!empty($leaderboard)){

            $t1 = Carbon::parse(Carbon::createFromTimestamp($leaderboard->endtime)
                ->format('Y-m-d H:i:s'));
            $t2 =  Carbon::parse(Carbon::createFromTimestamp($leaderboard->starttime)
                ->format('Y-m-d H:i:s'));
            $diff = $t1->diff($t2);
            $leaderboard->days=$diff->d;
            $leaderboard->hours=$diff->h;
            $leaderboard->mins=$diff->m;
            $leaderboard->secs=$diff->s;
            $leaderboardleaderboardmentions=DB::table('leaderboard_unique_mentiones')
                ->select('ownerId', DB::raw('count(*) as totalMentiones'))
                ->where('leaderboard_id',$id)
                ->groupBy('ownerId')
                ->orderBy('totalMentiones', 'DESC')
                ->limit(100)
                ->get();
            $allboardleaderboardmentions=array();
            if(!empty($leaderboardleaderboardmentions)){
                foreach ($leaderboardleaderboardmentions as $leaderboardmentions){
                    $owner=DB::table('leaderboard_unique_mentiones')
                        ->where('ownerId',$leaderboardmentions->ownerId)
                        ->first();
                        $user=DB::table('users')
                        ->where('instagramid',$leaderboardmentions->ownerId)
                        ->first();
                    $leaderboardmentions->ownerflag=url("/assets/logos/annony.svg");
                    if(!empty($user)){
                        $leaderboardmentions->ownerflag=($user->flag != '') ? $user->flag : url("/assets/logos/annony.svg");
                    }
                    $leaderboardmentions->ownername=$owner->ownername;
                    $leaderboardmentions->ownername_profile_pic_url=$owner->ownername_profile_pic_url;
                    $allboardleaderboardmentions[]=$leaderboardmentions;
                }
                $leaderboard->post_mentions=$allboardleaderboardmentions;

            }
            $media='';
            if($leaderboard->media_type=='image'){
                $media='<img  src="'.$leaderboard->media_url.'">';
            }else{
                $media='<video width="320" height="240" controls>';
                $media.='<source src="movie.ogg" type="video/ogg">';
                $media.='</video>';
            }
            $leaderboard->media=$media;
            $leaderboard->leaderboard_end_date =Carbon::createFromTimestamp($leaderboard->endtime)
                ->format('Y/m/d H:i:s');
            $leaderboard->leaderboard_start_date =Carbon::createFromTimestamp($leaderboard->starttime)
                ->format('Y/m/d H:i:s');
        }

        return view('leaderboard/leaderboard',array('leaderboard'=>$leaderboard));
    }
    public function Users()
    {
        $users=DB::table('users')
            ->where('type',1)
            ->get();
        return view('users/index',array('users'=>$users));
    }
    public function Noleaderboard()
    {
        return view('leaderboard/noleaderboard');
    }
    public function privacy()
    {
        return view('leaderboard/privacy');
    }

    public function Leaderboardends()
    {
        return view('leaderboard/leaderboardends');
    }
    public function addLeaderboard(Request $request)
    {
        $str=explode('p/',$request->post_url);
        $short_code=str_replace("/","",$str[1]);
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://instagram28.p.rapidapi.com/media_info?short_code=".$short_code."",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: instagram28.p.rapidapi.com",
                "x-rapidapi-key: 438f76a88cmshdc45e7e5a5eaf76p1ec979jsn463486d7c2f7"
            ],
        ]);
        $media_info = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return back()->with('error', 'Something went Wrong Post url is incorrect!');
        } else {
            $media_info=json_decode($media_info);
        }
        if($media_info->status!='ok'){
            return back()->with('error', 'Post url is incorrect!');
        }
        if($media_info->status=='ok'){
            $media_url=$media_info->data->shortcode_media->display_url;
            $media_type=($media_info->data->shortcode_media->is_video != '') ? 'video' : 'image';
            $post_title=$media_info->data->shortcode_media->accessibility_caption;
            $leaderboard_start_date = Carbon::now();
            $leaderboard_end_date = Carbon::now()->addDays($request->leaderboard_run_period)->endOfDay();
            $boardData=array(
                'post_url' =>$request->post_url,
                'post_title' =>'Entry Post',
                'post_id' => $short_code,
                'media_url' =>$media_url,
                'media_type' =>$media_type,
                'created_at'=>Carbon::now(),
                'post_mentions' =>serialize(array()),
                'leaderboard_run_period'=>$request->leaderboard_run_period,
                'leaderboard_start_date'=>$leaderboard_start_date,
                'leaderboard_end_date'=>$leaderboard_end_date,
                'package'=>$request->package,
                'starttime'=>Carbon::now()->endOfDay()->timestamp,
                'endtime'=>Carbon::now()->addDays($request->leaderboard_run_period)->endOfDay()->timestamp,
                'runtime'=>0,
            );
            DB::table('leaderboard')->insert($boardData);
            $leaderBoard=DB::getPdo()->lastInsertId();

            /**Fetch Media Comment now**/
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://instagram28.p.rapidapi.com/media_comments?short_code=".$short_code."",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "x-rapidapi-host: instagram28.p.rapidapi.com",
                    "x-rapidapi-key: 438f76a88cmshdc45e7e5a5eaf76p1ec979jsn463486d7c2f7"
                ],
            ]);
            $media_comments = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                return back()->with('error', 'Something went Wrong Post url is incorrect!');
            } else {
                $media_comments=json_decode($media_comments);
            }
            if($media_comments->status=='ok'){
                $comments=$media_comments->data->shortcode_media->edge_media_to_parent_comment->edges;
                /*** Store Comments to Leadboard Message First***/
                if(!empty($comments)) {
                    $i=1;
                    foreach ($comments as $rawComments) {
                        $leaderboardcommentsData=array(
                            'leaderboard_id' =>$leaderBoard,
                            'comment_id' =>$rawComments->node->id,
                            'text' => $rawComments->node->text,
                            'ownername' =>$rawComments->node->owner->username,
                            'ownerId' =>$rawComments->node->owner->id,
                            'ownername_profile_pic_url' =>$rawComments->node->owner->profile_pic_url,
                            'next_cursor' =>($i==1) ? $rawComments->node->id : 'none',
                            'created_at'=>Carbon::now(),
                        );
                        DB::table('leaderboardcomments')->insert($leaderboardcommentsData);
                        $i++;
                    }

                }

                /**Get All Comments of the post using pagination**/
                $AllOwners=array();
                $AllOwnersById=array();
                $FinalMentions = array();
                if(!empty($comments)) {
                    foreach ($comments as $comment) {
                        /**Match if comments have some mentiones example, this is message @omer_ranja* */
                        if (preg_match_all("/(^|[^\w])@([\w\_\.]+)/", $comment->node->text)) {
                            $AllOwners[] = array(
                                'ownerId' => $comment->node->owner->id,
                                'comment' => $comment->node->text,
                                'ownername' => $comment->node->owner->username,
                                'ownername_profile_pic_url' => $comment->node->owner->profile_pic_url,
                            );
                            $AllOwnersById[$comment->node->owner->id] = array(
                                'ownerId' => $comment->node->owner->id,
                                'comment' => $comment->node->text,
                                'ownername' => $comment->node->owner->username,
                                'ownername_profile_pic_url' => $comment->node->owner->profile_pic_url,
                            );
                        }
                    }
                    /**Get Unique mentiones from Comments for ecah comment **/
                    $AllMentionsFromComments = array();
                    foreach ($AllOwners as $Owners) {
                        if (preg_match_all("/(^|[^\w])@([\w\_\.]+)/", $Owners['comment'], $matches)) {
                            if (count($matches) > 0) {
                                foreach ($matches[0] as $match) {
                                    /***insert in unique mentions table for each box ***/
                                    /**check if owner already tags already exist then not added **/
                                    $unique_mentiones=DB::table('leaderboard_unique_mentiones')
                                        ->where('leaderboard_id',$leaderBoard)
                                        ->where('ownerId',$Owners['ownerId'])
                                        ->where('text',str_replace(' ', '', $match))
                                        ->first();
                                    if(empty($unique_mentiones)){
                                        $leaderboard_unique_mentionesData=array(
                                            'leaderboard_id' =>$leaderBoard,
                                            'text' => str_replace(' ', '', $match),
                                            'ownername' =>$Owners['ownername'],
                                            'ownerId' =>$Owners['ownerId'],
                                            'ownername_profile_pic_url' =>$Owners['ownername_profile_pic_url'],
                                            'created_at'=>Carbon::now(),
                                        );
                                        DB::table('leaderboard_unique_mentiones')->insert($leaderboard_unique_mentionesData);

                                    }
                                    /*** end of insert in unique mentions table for each box ***/
                                    $AllMentionsFromComments[$Owners['ownerId']][] = str_replace(' ', '', $match);
                                }
                                $AllMentionsFromComments[$Owners['ownerId']] = array_unique($AllMentionsFromComments[$Owners['ownerId']]);
                            }
                        }
                    }

                    foreach ($AllMentionsFromComments as $key => $MentionsOwner) {
                        $Owners = $AllOwnersById[$key];
                        $Owners['totalMentiones'] = count($MentionsOwner);
                        $FinalMentions[] = $Owners;
                    }
                }

            }
        }
        if($leaderBoard){
            return redirect(route('ManageLeaderboard'));
        }else{
            return back()->with('error', 'some thing went wrong!');
        }
    }

    public function updateLeaderboard(Request $request)
    {
        $leaderboard=DB::table('leaderboard')
            ->where('id',$request->id)
            ->first();
        if(!empty($leaderboard)){
            $leaderboard_start_date = Carbon::now();
            $leaderboard_end_date = Carbon::now()->addDays($request->leaderboard_run_period);

            DB::table('leaderboard')
                ->where('id',$request->id)
                ->update(array(
                    'leaderboard_start_date'=>$leaderboard_start_date,
                    'leaderboard_end_date'=>$leaderboard_end_date,
                    'leaderboard_run_period'=>$request->leaderboard_run_period,
                    'leaderboard_inactive_at'=>null
                ));

            return back()->with('status', 'leaderboard update successfully!');
        }else{
            return back()->with('error', 'some thing went wrong!');
        }

    }


    public function activeleaderBoard(Request $request){
        $leaderboard=DB::table('leaderboard')
            ->where('id',$request->id)
            ->first();
        if($request->action == 'start'){
            $update= DB::table('leaderboard')
                ->where('id',$request->id)
                ->update(
                    array('active'=>1)
                );

        }else{
            $leaderboard_start_date = Carbon::now();
            $update=  DB::table('leaderboard')
                ->where('id',$request->id)
                ->update(array(
                    'active'=>0,
                    'leaderboard_inactive_at'=>Carbon::now(),
                    'leaderboard_start_date'=>$leaderboard_start_date,
                ));

        }
        if($update){
            return response()->json(['status'=>true,'code'=>200],200);
        }else{
            return response()->json(['status'=>false,'code'=>401],200);

        }

    }
    public function savehowitworks(Request $request){
        $update=  DB::table('leaderboard')
            ->where('id',$request->id)
            ->update(array(
                'how_it_works'=>$request->how_it_works,
            ));
        if($update){
            return response()->json(['status'=>true,'code'=>200],200);
        }else{
            return response()->json(['status'=>false,'code'=>401],200);

        }

    }
    public function UserListPdf(){
        $users=DB::table('users')
            ->where('type',1)
            ->get();
        $pdf = PDF::loadView('users/userlistpdf',array('users'=>$users));
        return $pdf->download('BoomUserList.pdf');

    }
    public function UserListexport()
    {
        return Excel::download(new UsersExport, 'BoomUserList.xlsx');
    }
    public function UserListexportCSV()
    {
        return Excel::download(new UsersExport, 'BoomUserList.csv');
    }

    public function addpackage(Request $request)
    {
            $package=array(
                'package_name' =>$request->package_name,
                'free_time' =>$request->free_time,
                'price_per_hour' =>$request->price_per_hour,
                'free_credit' =>$request->free_credit,
                'max_purchase' => $request->free_credit,
            );
           $packageid= DB::table('leaderboardpackages')->insert($package);
           if($packageid){
         return back()->with('status', 'package add successfully!');
        }else{
            return back()->with('error', 'some thing went wrong!');
        }
    }

}
