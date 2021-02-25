@extends('layouts.app')

@section('content')
    @if(!empty($leaderboard))

        <input type="hidden" name="active-leaderboad-single" id="active-leaderboad-single" value="{{(!empty($leaderboard->active) && $leaderboard->active==1) ? $leaderboard->id : ''}}">
        <div class="wrapper" id="user_leaderboard" data-id="{{$leaderboard->id}}" data-endtime="{{$leaderboard->leaderboard_end_date}}" data-starttime="{{$leaderboard->leaderboard_start_date}}">
            <div class="admin-side container-fluid site-wrapper">
                <div class="row">
                    
                    <div class="col-12 col-md-12 order-md-2 order-2 mobile-leaderboard">
                        <div class="Payment-Method-header leaderboard-header position-relative admin-leadboard">
                            <div class="row">
                            <div class="col-md-3 col-3 order-md-1 desktop order-1 text-left">
								<div class="prize-button exit-button">
								<a href="{{ route('home') }}"><button class="btn">Back</button></a>
								</div>
                            </div>
                                <div class="col-md-6 col-6 order-md-2 order-2 casino-timer leaderboard-timer text-center">
                                    @if($leaderboard->active == 0 || $leaderboard->active == 1)
                                    <div class="row counter-width">
                                        <div class="col-12">
                                            <p>COMPETITION ENDS IN</p>
                                        </div>
                                        <div class="col-3 days"><h3 id="days">{{$leaderboard->days}}</h3><p>Days</p></div>
                                        <div class="col-3 hours"><h3 id="hours">{{$leaderboard->hours}}</h3><p>Hours</p></div>
                                        <div class="col-3 mins"><h3 id="mins">{{$leaderboard->mins}}</h3><p>Mins</p></div>
                                        <div class="col-3 secs"><h3 id="secs">{{$leaderboard->secs}}</h3><p>Secs</p></div>
                                      <div class="col-12 text-center"><p class="Live-enter-post-footer-text"><span class="run-lable">{{($leaderboard->active == 2) ? 'Ran' :'Running'}}</span> for {{$leaderboard->leaderboard_run_period}} Days</p></div>
                                    </div>
                                    @endif
                                        @if($leaderboard->active == 2)
                                            <div class="row" style="   max-width: 400px; margin: auto;">
                                                <div class="col-12">
                                                    <p>COMPETITION IS COMPLETED</p>
                                                    <p class="Live-enter-post-footer-text"><span class="run-lable">{{($leaderboard->active == 2) ? 'Ran' :'Running'}}</span> for {{$leaderboard->leaderboard_run_period}} Days</p>
                                                </div>
                                            </div>
                                        @endif


                                </div>
                               <div class="col-md-3 col-3 order-3 order-md-3 prize-table text-right">

                                    <div class="prize-button">

                                        <button class="btn"><i class="fa fa-gift"></i>  <a href="https://www.instagram.com/s/aGlnaGxpZ2h0OjE3ODU1MDg1OTExNDY4MDI3?igshid=wu57rjjq2cco&story_media_id=2504848121957656095" target="_blank" style="color: white">See Prizes </a></button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                        <div class="col-md-6 col-12 order-2 order-md-1 mobile-space">
                            <div class="col-12 col-md-12 order-md-4 order-6 leaderboard-container">
                                <div class="row work-part leaderboard-work">
                                    <div class="col-12">
                                        <div class="row admin-main-leadboard-page">
                                            <div class="col-6">
                                                <h4>ENTRY POST</h4>
                                            </div>
                                            <div class="col-6">
                                                <div class="how-it-works text-right">
                                                    <button type="link" data-toggle="modal" data-target="#gamerule1">
                                                        How It Works
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 iframe-box ">
                                        <div id="myCarousel" class="carousel slide" data-ride="carousel">



                                            <!-- The slideshow -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <?php echo $leaderboard->media; ?>
                                                </div>

                                            </div>

                                        </div>



                                    </div>
                                    <div class="col-12 work-form mt-4">
                                        <div class="modal fade" id="gamerule1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="gamerule modal-title" id="exampleModalLongTitle">How It Works</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea id="howitworkstextarea" name="howitworkstextarea" cols="20" class="form-control" rows="5">{{$leaderboard->how_it_works}}</textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="how-it-works">
                                                            <button type="button" class="" id="save-how-it-work" >Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 order-1 order-md-2 mobile-space">
                            <div class="col-12 col-md-12 order-md-5 order-4 leaderboard-container leaderboard-spacing mobile-leaderboard">
                                <div class="leaderboard-bar">
                                    <h3>Leaderboard- Top 100</h3>
                                </div>
                                <div class="show-table rotate-image" onclick="myFunction()">
                                    <img src="{{ asset('assets/logos/Group 88.svg') }}" alt="">
                                </div>
                            </div>

                            <div class="col-12 col-md-12 order-md-5 order-7 leaderboard-container">
                                    <div class="row leaderboard-search user-search">
                                        <div class="col-md-5 d-none d-sm-block">
                                             <h4>THE LIVE LEADERBOARD</h4>
                                        </div>
                                        <div class="col-md-7 d-none d-sm-block">
                                            <div class="input-group md-form form-sm form-2 pl-0">
                                                <form action="" style="display: flex;width: 100%;" method="GET" id="search-form">
                                                    <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search here..." aria-label="Search" name="keyword" id="keyword" value="" onkeyup="searchUser()">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text amber lighten-3" id="basic-text1">
                                                            <i class="fas fa-search text-grey" aria-hidden="true" id="fa-search"></i>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-3 text-right">
                                        <div class="how-it-works skip-to-me"><button>Skip To Me</button></div>
                                        </div> -->
                                    </div>
                                </div>
                            <div class="col-12 col-md-12 order-md-6 order-5 leaderboard-container position-relative" id="mytable">
                            <div class="user-tbl">
                                <div class="row leaderboard-bar-table  table-title-bar m-0">
                                    <div class="col-12 leaderboard-search user-search d-md-none d-lg-none d-xl-none d-sm-block">
                                        <div class="input-group md-form form-sm form-2 pl-0">
                                            <form action="" method="GET" id="search-form" style="display: flex; width: 100%;">
                                                <input type="text" placeholder="Search here..." aria-label="Search" name="keyword" id="keyword" value="" onkeyup="searchUser()" class="form-control my-0 py-1 amber-border" />
                                                <div class="input-group-append">
                                                        <span id="basic-text1" class="input-group-text amber lighten-3"><i aria-hidden="true" id="fa-search" class="fas fa-search text-grey"></i></span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="prize">
                                            <h4>Position</h4>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="name">
                                            <h4>Username</h4>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="points">
                                            <h4>Mentions</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="leaderboard-table" id="leaderboard-table">
                                    @if(!empty($leaderboard->post_mentions))
                                        <?php
                                            /**dark-orange => orange **/
                                            /**light-bg => green **/
                                        $color_array = array('light-bg', 'dark-orange', 'dark-red');
                                        $k = count($color_array);
                                        $i=0;
                                        $p=1;
                                        $FinalMentions=$leaderboard->post_mentions;
                                        $class='dark-red';
                                        ?>

                                        @foreach($FinalMentions as $Mentions)


                                                <?php
                                                if($p>=1 && $p<=3){
                                                    $class='light-bg';
                                                }elseif ($p>=4 && $p<=10){
                                                    $class='dark-orange';
                                                }else{
                                                    $class='dark-red';
                                                }
                                                //$class= $color_array[$i % $k];
                                            ?>
                                            <div class="row leaderboard-details mentions-row {{$class}} m-0 data-row ownerId_{{$Mentions->ownerId}}"  data-username="{{$Mentions->ownername}}" data-mention="{{$Mentions->totalMentiones}}" >
                                                <div class="col-3">
                                                    <div class="prize">
                                                        <h4><span class="poition-no">{{$p}}</span>
                                                        <img class="mr-2" src="{{$Mentions->ownerflag}}" alt="" style="width: 20px;height: 20px">
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="name">
                                                        <div class="account">
                                                            <div class="table-avatar">
                                                                <img class="mr-2" src="{{$Mentions->ownername_profile_pic_url}}" alt="">
                                                                <span><h4>{{$Mentions->ownername}}</h4></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-6 text-right">
                                                    <div class="points">
                                                        <h4 id="total_mentions_{{$Mentions->ownerId}}">{{$Mentions->totalMentiones}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $i++;
                                            $p++;
                                            ?>
                                        @endforeach
                                    @endif
                                </div>
                                <!--<div class="col-12 text-center insta-Mentions-tbl">
                                    <div class="how-it-works"> <button>See Post</button></div>
                                </div>-->
                            </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    @endif


<script>
    var intervalID = null;
    function ManageCounterleadboard(flag,countDownDate,countStartDownDate){
        // Set the date we're counting down to
        var countDownDate = new Date(countDownDate).getTime();
        var countStartDownDate = new Date(countStartDownDate).getTime();
        // Update the count down every 1 second
        if(flag){
            intervalIDleadboard = setInterval(function() {
                // Get today's date and time
                var now = new Date().getTime();
                // Find the distance between now and the count down date
                countDownDate=countDownDate - 1000;
                var  distance = countDownDate - countStartDownDate;
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Output the result in an element with id="demo"
                var leaderboard_post_wrapper=$("#user_leaderboard");
                leaderboard_post_wrapper.find("#days").text(days);
                leaderboard_post_wrapper.find("#hours").text(hours);
                leaderboard_post_wrapper.find("#mins").text(minutes);
                leaderboard_post_wrapper.find("#secs").text(seconds);
                /*document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                   + minutes + "m " + seconds + "s ";*/
                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(intervalIDleadboard);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        }else{
            clearInterval(intervalIDleadboard);
        }
    }
    $( document ).ready(function() {

        if($("#active-leaderboad-single").val()!=''){
            var id=$("#active-leaderboad-single").val();
            var countDownDate=$("#user_leaderboard").attr("data-endtime");
            var countStartDownDate=$("#user_leaderboard").attr("data-starttime");
            ManageCounterleadboard(true,countDownDate,countStartDownDate);
        }
        sortMentionRow();
        setInterval(function(){ getlatestMentionBoard(); }, 3000);



        $("#save-how-it-work").click(function (){
            var route='/savehowitworks';
            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    'how_it_works':$("#howitworkstextarea").val(),
                    'id':{{$leaderboard->id}},
                    '_token': '{{ csrf_token() }}',
                },
                success: function(response) {
                    if(response.code==200){
                        $("#gamerule1").modal('hide');
                    }

                },
            });

        });

    });

    function sortMentionRow(){
        var store = [];
        $( ".mentions-row" ).each(function( i ) {
            var sortnr = parseFloat($(this).attr("data-mention"));
            if(!isNaN(sortnr)) store.push([sortnr, $(this)]);
        });
        store.sort(function(x,y){
            // return x[0] - y[0];
            return y[0] - x[0];
        });
        var len=store.length;
        var p=1;
        var colorclass='';
        for(var i=0; i<len; i++){
            if(p>=1 && p<=3){
                colorclass='light-bg';
            }else if (p>=4 && p<=10){
                colorclass='dark-orange';
            }else{
                colorclass='dark-red';
            }
            $(store[i][1]).removeClass('light-bg');
            $(store[i][1]).removeClass('dark-orange');
            $(store[i][1]).removeClass('dark-red');
            $(store[i][1]).addClass(colorclass);
            $("#leaderboard-table").append(store[i][1]);
            p++;
        }
        store = null;


        $('.poition-no').each(function(idx, elem){
            $(elem).text(idx+1);
        });
    }
    /*Get Post Updated Data*/
    function getlatestMentionBoard(){
        var route='/latestMentionBoard';
        $.ajax({
            url: route,
            type: 'POST',
            data: {
                'id':$("#active-leaderboad-single").val(),
                '_token': '{{ csrf_token() }}',
            },
            success: function(response) {
                if(response.code==200){
                    var Allmentions=response.mentions;
                    console.info(Allmentions);
                    var html='';
                    for (var i = 0; i < Allmentions.length; i++) {
                        var mention=Allmentions[i];

                        if($(".mentions-row").hasClass("ownerId_"+mention.ownerId)){
                            $("#total_mentions_"+mention.ownerId).text(mention.totalMentiones);
                            $('.ownerId_'+mention.ownerId).attr('data-mention',mention.totalMentiones);
                        }else{

                            html+='<div class="row leaderboard-details mentions-row m-0 ownerId_'+mention.ownerId+'" data-id="'+mention.ownerId+'" data-mention="'+mention.totalMentiones+'">';
                            html+='<div class="col-3">';
                            html+='<div class="prize">';
                             html+='<h4><span class="poition-no"></span>';
                            html+='<img class="mr-2" src="'+mention.ownerflag+'" alt="" style="width: 20px;height: 20px">';
                            html+='</h4>';
                            html+='</div>';
                            html+='</div>';

                            html+='<div class="col-3">';
                            html+='<div class="name">';
                            html+='<div class="account">';
                            html+='<div class="table-avatar">';
                            html+='<img class="mr-2" src="'+mention.ownername_profile_pic_url+'" alt="">';
                            html+='<span><h4>'+mention.ownername+'</h4></span>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';

                            html+='<div class="col-6 text-right">';
                            html+='<div class="points">';
                            html+='<h4 id="total_mentions_'+mention.ownerId+'">'+mention.totalMentiones+'</h4>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';

                        }

                    }
                    if(html!=''){
                        $("#leaderboard-table").append(html);
                    }
                    sortMentionRow();
                }

            },
        });
    }
</script>

    <script src="{{ asset('js/froala_editor_sources/js/plugins/image.js') }}"></script>
    <script src="{{ asset('js/froala_editor_sources/js/plugins/file.js') }}"></script>
    <script src="{{ asset('js/froala_editor_sources/js/plugins/font_family.min.js') }}"></script>
    <link href="{{ asset('js/froala_editor_sources/css/froala_editor.pkgd.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/froala_editor_sources/css/froala_editor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/froala_editor_sources/css/froala_style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/froala_editor_sources/css/themes/dark.css') }}" rel="stylesheet">
    <script>
        function myFunction() {
            var x = document.getElementById("mytable");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <script>



        $.getScript("{{ asset('js/froala_editor_sources/js/froala_editor.pkgd.min.js') }}", function () {

            $('#howitworkstextarea').froalaEditor({
                key:'lB6C1B4C1E1G2wG1G1B2C1B1D7B4E1D4D4jXa1TEWUf1d1QSDb1HAc1==',
                theme: 'light',
                imageUploadURL: '',
                fileUploadURL: '',
                imageUploadParams: {
                    id: 'howitworkstextarea'
                },
                // Additional upload params.
                fileUploadParams: {id: 'howitworkstextarea'},
                // Set request type.
                imageUploadMethod: 'POST',
                // Set request type.
                fileUploadMethod: 'POST',
                // Set max image size to 5MB.
                imageMaxSize: 5 * 1024 * 1024,
                // Set max file size to 20MB.
                fileMaxSize: 1024 * 1024 * 5,
                //fileUseSelectedText: true,
                // Allow to upload PNG and JPG.
                imageAllowedTypes: ['gif','jpeg', 'jpg', 'png'],
                // Allow to upload any file.
                //fileAllowedTypes: ["txt","doc","pdf","json","html"],
                fileAllowedTypes: ['*'],
                // Set the video upload URL.
                videoUploadURL: '',
                videoResponsive: true,
                videoUploadParams: {
                    id: 'abouttextarea'
                },
                /*height: 250,*/
                heightMin:250,
                //fullPage: true,
                tableStyles: {
                    'fr-dashed-borders': 'Dashed Borders',
                    'fr-alternate-rows': 'Alternate Rows',
                    'fr-no-border':'No Borders'
                },
                charCounterCount: false,
                toolbarButtonsSM: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'embedly', 'insertFile', 'insertTable', '|', 'emoticons', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'spellChecker', 'help', 'html', '|', 'undo', 'redo'],
                toolbarButtonsXS: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'embedly', 'insertFile', 'insertTable', '|', 'emoticons', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'spellChecker', 'help', 'html', '|', 'undo', 'redo'],
            }).on('froalaEditor.file.beforeUpload', function (e, editor, files) {
                // Return false if you want to stop the file upload.
                console.log('files',files);
            })
                .on('froalaEditor.file.inserted', function (e, editor, $file, response) {
                    // File was inserted in the editor.
                    console.log('Inserted file',$file);
                    console.log('Inserted responce',response);

                })
                .on('froalaEditor.video.beforeRemove', function (e, editor, $video) {
                    /*src=$($('#footer_compliance_text').froalaEditor('selection.element')).find('video').attr('src');
                    console.log('video src',src);*/
                })
                .on('froalaEditor.video.removed', function (e, editor, $video) {
                    $.ajax({
                        // Request method.
                        method: 'POST',
                        // Request URL.
                        url: "",
                        // Request params.
                        data: {
                            src: $video.attr('src')
                            //src: file.getAttribute('href')
                        }
                    })
                        .done (function (data) {
                            console.log ('video was deleted');
                        })
                        .fail (function (err) {
                            console.log ('video delete problem: ' + JSON.stringify(err));
                        })
                })
                .on('froalaEditor.file.unlink', function (e, editor, file) {
                    $.ajax({
                        // Request method.
                        method: 'POST',
                        // Request URL.
                        url: "",
                        // Request params.
                        data: {
                            src: file.getAttribute('href')
                        }
                    })  .done (function (data) {
                        console.log ('File was deleted');
                    })
                        .fail (function (err) {
                            console.log ('File delete problem: ' + JSON.stringify(err));
                        })
                })
                .on('froalaEditor.file.error', function (e, editor, error, response) {
                    if (error.code == 1) {
                        console.log('Bad link.');
                    }else if (error.code == 2) {
                        console.log('Error during file upload.');
                    }else if (error.code == 3) {
                        console.log('Parsing response failed.');
                    }else if (error.code == 4) {
                        console.log('File too text-large.');
                    }else if (error.code == 5) {
                        console.log('Invalid file type.');
                    }else if (error.code == 6) {
                        console.log('File can be uploaded only to same domain in IE 8 and IE 9.');
                    }else if (error.code == 7) {
                        console.log('Response contains the original server response to the request if available.');

                    }

                })
                .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
                    // Return false if you want to stop the image upload.
                    console.log(images);
                })
                .on('froalaEditor.image.uploaded', function (e, editor, response) {
                    // Image was uploaded to the server.
                    console.log("uploaded");
                    console.log(response);
                    $(".savebtn").removeClass("disabled");
                })
                .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
                    // Image was inserted in the editor.
                    console.log($img);
                    console.log(response);

                })
                .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
                    // Image was replaced in the editor.

                    console.log($img);

                    console.log(response);

                })

                .on('froalaEditor.image.error', function (e, editor, error, response) {
                    // Bad link.
                    if (error.code == 1) {
                        console.log('No link in upload response.');
                    }else if (error.code == 2) {
                        console.log('Error during image upload.');
                    }else if (error.code == 3) {
                        console.log('Parsing response failed.');
                    }else if (error.code == 4) {
                        console.log('Image too text-large.');
                    }else if (error.code == 5) {
                        console.log('Invalid image type.');
                    }else if (error.code == 6) {
                        console.log('Image can be uploaded only to same domain in IE 8 and IE 9.');
                    }else if (error.code == 7) {
                        console.log('Response contains the original server response to the request if available.');
                    }

                })
                .on('froalaEditor.image.removed', function (e, editor, $img) {
                    $.ajax({
                        // Request method.
                        method: "POST",
                        // Request URL.
                        url: "",
                        // Request params.
                        data: {
                            src: $img.attr('src')
                        }

                    })
                        .done (function (data) {
                            console.log ('image was deleted');

                        })
                        .fail (function () {
                            console.log ('image delete problem');

                        })

                });



        });

    </script>
@endsection
