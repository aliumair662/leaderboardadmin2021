<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use Carbon\Carbon;
use Phpfastcache\Helper\Psr16Adapter;
use Goutte\Client;
use InstagramScraper\Instagram;
use PhpParser\Node\Expr\PreInc;
use Log;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            /*$this->updateUserInstagramId();
            $this->checkExpiredLeaderboard();
             $this->updateActiveleaderboardRunTime();
            $this->startScrapping();*/
             $this->updateBuyleadboardTime();
             
        })->everyMinute();
    }
    /**
     * Check if user instagramid not exit then update.
     *
     * @return void
     */
    public function updateUserInstagramId(){
        Log::debug('Start updateUserInstagramId');
        $users=DB::table('users')
            ->whereNull('instagramid')
            ->whereNotNull('instagramUsername')
            ->get();
        /**
         * Running leaderboard
         **/
        if(!empty($users)){
            foreach ($users as $user){
                Log::debug('Start user update instagramUsername=>'.$user->instagramUsername);
                if($user->instagramUsername!=''){
                    $owner=DB::table('leaderboardcomments')
                        ->where('ownername',$user->instagramUsername)
                        ->first();
                        if(!empty($owner)){
                           $update=  DB::table('users')
                        ->where('id',$user->id)
                        ->update(array(
                            'instagramid'=>$owner->ownerId,
                        )); 
                        }
                    
                }
            }


        }

    }
    /**
     * Check if leaderboard expired then  Active =2.
     *
     * @return void
     */
    public function checkExpiredLeaderboard(){
        $leaderboard=DB::table('leaderboard')
            ->where('active',1)
            //->where('endtime','<=',Carbon::now()->timestamp)
            ->where('leaderboard_end_date', '>=', Carbon\Carbon::now()->toDateString())
            ->first();
        /**
         * Running leaderboard
         **/
        if(!empty($leaderboard)){
            $update=  DB::table('leaderboard')
                ->where('id',$leaderboard->id)
                ->update(array(
                    'active'=>2,
                    'expired'=>1,
                    'leaderboard_expired_at'=>Carbon::now()
                ));
        }

    }
    public function updateActiveleaderboardRunTime(){
        $leaderboard=DB::table('leaderboard')
            ->where('active',1)
            ->first();
        if(!empty($leaderboard)){
            DB::table('leaderboard')
                ->where('active',1)->update(array('endtime'=>$leaderboard->endtime - 60));
        }

    }
    public function updateBuyleadboardTime(){
        for($i=0;$i<6;$i++){
            DB::table('leaderboard_buy_time')
            ->where('active',1)
            ->decrement('total_time', 5); 
             sleep( 5 );
        }
        

    }
    
    public function startScrapping(){
       //echo "111";
        Log::debug('Start SCARPPER');
        $leaderboard=DB::table('leaderboard')
            ->where('active',1)
            ->first();
        if(empty($leaderboard)){

            die("not found");
        }
        for($i=0;$i<100;$i++){
            Log::debug('start loop'.$i);
            //sleep(10);
            /****Start Cron Job ****/
            $lastComment=DB::table('leaderboardcomments')->where('leaderboard_id',$leaderboard->id)
                ->where('next_cursor','!=' ,'none')->orderBy('id', 'DESC')->first();
            /**Fetch Media Comment now**/
            $str=explode('p/',$leaderboard->post_url);
            $short_code=str_replace("/","",$str[1]);
            /**if next cursor exit then fetch data desc with next_cursor **/
            $url="https://instagram28.p.rapidapi.com/media_comments?short_code=".$short_code;
            if(!empty($lastComment)){
                $url.="&next_cursor=".$lastComment->next_cursor;
                Log::debug('next_cursor=>'.$lastComment->next_cursor);
            }else{
                Log::debug('next_cursor=>');
            }

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
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
               // return back()->with('error', 'Something went Wrong Post url is incorrect!');
            } else {
                //Log::debug('media_comments=>'.$media_comments);
                $media_comments=json_decode($media_comments);

                if(!empty($media_comments) && isset($media_comments->status)){
                    if($media_comments->status=='ok'){
                        //$comments=$media_comments->data->shortcode_media->edge_media_to_parent_comment->edges;
                        $comments=$media_comments->data->shortcode_media->edge_media_to_parent_comment->edges;

                        /*** Store Messages to Leadboard Message First***/
                        if(!empty($comments)) {
                            $k=1;
                            $duplicateCount=0;
                            foreach ($comments as $rawComments) {
                                /***
                                 * match if comment already exist  then make the next_cursor none
                                 *stop insertion
                                 ****/
                                $DuplicateComment = DB::table('leaderboardcomments')
                                    ->where('leaderboard_id', $leaderboard->id)
                                    ->where('comment_id', $rawComments->node->id)
                                    ->first();
                                if (!empty($DuplicateComment)) {
                                    Log::debug('duplicate found. => '.$DuplicateComment->comment_id);
                                    $duplicateCount++;
                                    /*DB::table('leaderboardcomments')
                                        ->where('leaderboard_id', $leaderboard->id)
                                        ->update(array('next_cursor' => 'none'));*/
                                    //die("duplicate found");
                                }else{
                                    Log::debug('INSERT DATA');
                                    $leaderboardcommentsData = array(
                                        'leaderboard_id' => $leaderboard->id,
                                        'comment_id' => $rawComments->node->id,
                                        'text' => preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $rawComments->node->text),
                                        'ownername' => $rawComments->node->owner->username,
                                        'ownerId' => $rawComments->node->owner->id,
                                        'ownername_profile_pic_url' => $rawComments->node->owner->profile_pic_url,
                                        'next_cursor' => ($k == 1) ? $rawComments->node->id : 'none',
                                        'created_at' => Carbon::now(),
                                    );
                                    DB::table('leaderboardcomments')->insert($leaderboardcommentsData);
                                    Log::debug('comment_id=>'.$leaderboard->id.'text=>'.$rawComments->node->text);
                                    $k++;
                                    /**Insert data into unique mentioned table **/
                                    if (preg_match_all("/(^|[^\w])@([\w\_\.]+)/", $rawComments->node->text, $matches)) {
                                        if (count($matches) > 0) {
                                            foreach ($matches[0] as $match) {
                                                /**check if owner already tags already exist then not added **/
                                                $unique_mentiones = DB::table('leaderboard_unique_mentiones')
                                                    ->where('leaderboard_id', $leaderboard->id)
                                                    ->where('ownerId', $rawComments->node->owner->id)
                                                    ->where('text', str_replace(' ', '', $match))
                                                    ->first();
                                                if (empty($unique_mentiones)) {
                                                    $leaderboard_unique_mentionesData = array(
                                                        'leaderboard_id' => $leaderboard->id,
                                                        'text' => str_replace(' ', '', preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $match)),
                                                        'ownername' => $rawComments->node->owner->username,
                                                        'ownerId' => $rawComments->node->owner->id,
                                                        'ownername_profile_pic_url' => $rawComments->node->owner->profile_pic_url,
                                                        'created_at' => Carbon::now(),
                                                    );
                                                    DB::table('leaderboard_unique_mentiones')->insert($leaderboard_unique_mentionesData);
                                                }
                                                /*** end of insert in unique mentions table for each box ***/
                                            }
                                        }
                                    }
                                }
                                /***check if complete array ***/
                                if($duplicateCount==count($comments) && $leaderboard->scrapp_all_old_comments==1){
                                    DB::table('leaderboardcomments')
                                        ->where('leaderboard_id', $leaderboard->id)
                                        ->update(array('next_cursor' => 'none'));
                                    Log::debug('duplicate found start recent 20 now');

                                }
                                /**End of Insert data into unique mentioned table ***/

                            }
                            if(!empty($lastComment)){
                                DB::table('leaderboardcomments')->where('id',$lastComment->id)->update(array('next_cursor'=>'none'));
                            }

                        }else{
                            Log::debug('COMMENTS  EMPTY');
                            //if($media_comments->data->shortcode_media->edge_media_to_parent_comment->count>0 && $media_comments->data->shortcode_media->edge_media_to_parent_comment->page_info->end_cursor==NULL){
                            if($media_comments->data->shortcode_media->edge_media_to_parent_comment->page_info->end_cursor==NULL){
                                /***
                                All previous scrapper record are finish now
                                 ***   1. update cursor_next to none for all leadboard
                                 ***   2. start scrapping without cursor
                                 ***  match eacho comment id with database
                                 *** if comment id match then we are done with lates commnet then make cursor_next none again
                                 ***/
                                 DB::table('leaderboard')
                                    ->where('id',$leaderboard->id)
                                    ->update(array('scrapp_all_old_comments'=>1));
                                    Log::debug('All old comments SCRApped');
                                DB::table('leaderboardcomments')
                                    ->where('leaderboard_id',$leaderboard->id)
                                    ->update(array('next_cursor'=>'none'));
                                Log::debug('end_cursor NULL');
                                //die("reverse now");
                            }


                        }
                    }
                }else{
                    
                     /***getting 500 reponse  may be all scrapped next_cursor not giving data***/
                    /***if all scrapped old data then start from first***/
                     Log::debug('getting 500 reponse  may be all scrapped next_cursor not giving data');
                    if($leaderboard->scrapp_all_old_comments==1){
                        DB::table('leaderboardcomments')
                            ->where('leaderboard_id',$leaderboard->id)
                            ->update(array('next_cursor'=>'none'));
                    }
                }

            }

            /****End of  Cron Job ****/
            /**** sTORING ****/


            Log::debug('End loop'.$i);
            /**** sTORING ****/
        }

    }




    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
