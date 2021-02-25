<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BOOM') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style1.css') }}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


</head>
<body>
    <div id="app">
        <header>
            <div class="container-fluid site-wrapper">
                <div class="row header-row">
                    <div class="col-12 text-center">
                        <img src="{{ asset('assets/logos/logo.png') }}" height="40">
                    </div>
<!--                     <div class="col-6 avatar-casino">
                        @guest
                        @else
                            <span class="casino-user mr-2">Hello<span class="ml-2">{{ Auth::user()->name }}</span>
                        </span>
                             <span class="avatar-image ml-2 mr-2">
                            <img src="{{ asset('assets/logos/avatar.jpg') }}" alt="">
                        </span> 
                        @endguest
                        @guest
                            @if (Route::has('register'))
                            @endif
                        @else

                            <div class="logout-button">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest


                    </div> -->
                </div>
            </div>

        </header>


        <main>
            @yield('content')
        </main>
        <footer>
          <div class="container-fluid site-wrapper">
                <div class="row">
                    <div class="col-12 text-center">
                       <p>©️ 2021 The Leaderboard</p>
                    </div>
                    <div class="col-12 text-center d-flex justify-content-center mt-2 mb-2">
                        <div class="language-selector">
                           <!-- <select data-placeholder="Choose a Language...">
                            <option value="AF">Afrikaans</option>
                            <option value="SQ">Albanian</option>
                            <option value="AR">Arabic</option>
                            <option value="HY">Armenian</option>
                            <option value="EU">Basque</option>
                            <option value="BN">Bengali</option>
                            <option value="BG">Bulgarian</option>
                            <option value="CA">Catalan</option>
                            <option value="KM">Cambodian</option>
                            <option value="ZH">Chinese (Mandarin)</option>
                            <option value="HR">Croatian</option>
                            <option value="CS">Czech</option>
                            <option value="DA">Danish</option>
                            <option value="NL">Dutch</option>
                            <option value="EN">English</option>
                            <option value="ET">Estonian</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finnish</option>
                            <option value="FR">French</option>
                            <option value="KA">Georgian</option>
                            <option value="DE">German</option>
                            <option value="EL">Greek</option>
                            <option value="GU">Gujarati</option>
                            <option value="HE">Hebrew</option>
                            <option value="HI">Hindi</option>
                            <option value="HU">Hungarian</option>
                            <option value="IS">Icelandic</option>
                            <option value="ID">Indonesian</option>
                            <option value="GA">Irish</option>
                            <option value="IT">Italian</option>
                            <option value="JA">Japanese</option>
                            <option value="JW">Javanese</option>
                            <option value="KO">Korean</option>
                            <option value="LA">Latin</option>
                            <option value="LV">Latvian</option>
                            <option value="LT">Lithuanian</option>
                            <option value="MK">Macedonian</option>
                            <option value="MS">Malay</option>
                            <option value="ML">Malayalam</option>
                            <option value="MT">Maltese</option>
                            <option value="MI">Maori</option>
                            <option value="MR">Marathi</option>
                            <option value="MN">Mongolian</option>
                            <option value="NE">Nepali</option>
                            <option value="NO">Norwegian</option>
                            <option value="FA">Persian</option>
                            <option value="PL">Polish</option>
                            <option value="PT">Portuguese</option>
                            <option value="PA">Punjabi</option>
                            <option value="QU">Quechua</option>
                            <option value="RO">Romanian</option>
                            <option value="RU">Russian</option>
                            <option value="SM">Samoan</option>
                            <option value="SR">Serbian</option>
                            <option value="SK">Slovak</option>
                            <option value="SL">Slovenian</option>
                            <option value="ES">Spanish</option>
                            <option value="SW">Swahili</option>
                            <option value="SV">Swedish </option>
                            <option value="TA">Tamil</option>
                            <option value="TT">Tatar</option>
                            <option value="TE">Telugu</option>
                            <option value="TH">Thai</option>
                            <option value="BO">Tibetan</option>
                            <option value="TO">Tonga</option>
                            <option value="TR">Turkish</option>
                            <option value="UK">Ukrainian</option>
                            <option value="UR">Urdu</option>
                            <option value="UZ">Uzbek</option>
                            <option value="VI">Vietnamese</option>
                            <option value="CY">Welsh</option>
                            <option value="XH">Xhosa</option>
                            </select> -->
                            <div id="google_translate_element"></div>
                        </div>
                        <div class="insta-feed ml-3">
                            <a href="https://www.instagram.com/theleaderboard.io/">
                             <i class="fab fa-instagram"></i>
                            </a>
                        </div>


                    </div>
                    <div class="col-12 text-center">
                      <p>The Leaderboard.io is a decentralised gaming platform. Players can win cash prizes by playing The Leaderboard games. All games are based on skill and not by chance. We are not regulated by the gambling commission. </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- CDNS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}">

    <!-- CDNS -->
    <!-- Start and Stop Leaderboard script start here -->
    <script type="text/javascript">
    $( document ).ready(function() {
        if($("#active-leaderboad").val()!=''){
            var id=$("#active-leaderboad").val();
            var countDownDate=$("#onofftoggel_"+id).attr("data-endtime");
            var countStartDownDate=$("#onofftoggel_"+id).attr("data-starttime");
            ManageCounter('start',id,countDownDate,countStartDownDate);
        }

        $(".onofftoggel").change(function (){
            var id=$(this).attr("data-id");
            var countDownDate=$(this).attr("data-endtime");
            if ($(this).is(':checked')) {
                if($("#active-leaderboad").val()!=''){
                    $(".slider-message").text('');
                    $("#leaderboard_post_wrapper_"+id).find(".slider-message").text('ONE BOADR IS ALREADY LIVE,PLEAS PAUSED IT');
                    $(this).prop("checked",false);
                    return false;
                }else{
                    $(".slider-message").text('');
                    activeleaderBoard('start',id);
                }
            }else{
                activeleaderBoard('stop',id);
            }
        });

    });
    /*Active leadbord*/
    function activeleaderBoard(action,id){
        var route='/activeleaderBoard';
        $.ajax({
            url: route,
            type: 'POST',
            data: {
                'id':id,
                'action':action,
                '_token': '{{ csrf_token() }}',
            },
            success: function(response) {
                if(response.code==200) {
                if(action=='start'){
                    var countDownDate=$("#onofftoggel_"+id).attr("data-endtime");
                    var countStartDownDate=$("#onofftoggel_"+id).attr("data-starttime");
                    ManageCounter('start',id,countDownDate,countStartDownDate);
                    $("#active-leaderboad").val(id);
                    $("#leaderboard_post_wrapper_"+id).find(".Go-Live-btn").text('LIVE');

                }else{
                    var countDownDate=$("#onofftoggel_"+$("#active-leaderboad").val()).attr("data-endtime");
                    var countStartDownDate=$("#onofftoggel_"+$("#active-leaderboad").val()).attr("data-starttime");
                    $("#leaderboard_post_wrapper_"+$("#active-leaderboad").val()).find(".Go-Live-btn").text('PAUSED');
                    ManageCounter('stop',$("#active-leaderboad").val(),countDownDate,countStartDownDate);
                    $("#active-leaderboad").val('');

                }


                }

            },
        });
    }
    var intervalID = null;
    function ManageCounter(flag,id,countDownDate,countStartDownDate){
        var countDownDate = new Date(countDownDate).getTime();
        var countStartDownDate = new Date(countStartDownDate).getTime();

        console.info(countDownDate);
        /**New Code **/
        if(flag=='start'){
            var c=0;
            intervalID = setInterval(function() {
                var now = new Date().getTime();
                countDownDate=countDownDate - 1000;
                var  distance = countDownDate - countStartDownDate;
                console.info(distance);
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));

                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);


                console.info(seconds);

                var leaderboard_post_wrapper=$("#leaderboard_post_wrapper_"+id);
                leaderboard_post_wrapper.find("#days").text(days);
                leaderboard_post_wrapper.find("#hours").text(hours);
                leaderboard_post_wrapper.find("#mins").text(minutes);
                leaderboard_post_wrapper.find("#secs").text(seconds);
                if (distance < 0) {
                    clearInterval(intervalID);
                    $("#leaderboard_post_wrapper_"+$("#active-leaderboad").val()).find(".Go-Live-btn").text('EXPIRED');
                    $("#leaderboard_post_wrapper_"+$("#active-leaderboad").val()).addClass('Finished');
                    $("#onofftoggel_"+$("#active-leaderboad").val()).prop('disabled', true);
                    $("#leaderboard_post_wrapper_"+$("#active-leaderboad").val()).find(".casino-timer").addClass('d-none');
                    $("#leaderboard_post_wrapper_"+$("#active-leaderboad").val()).find(".run-lable").text('Ran');
                    $("#active-leaderboad").val('');
                }
                c++;
            }, 1000);

        }else{
            clearInterval(intervalID);
        }
    }



    function searchUser() {
        // Declare variables
        var input = document.getElementById("keyword");
        var filter = input.value.toLowerCase();
        var table = document.getElementById("leaderboard-table");
        var div = table.getElementsByClassName("mentions-row");
        var filtered=false;
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < div.length; i++) {
            var username = div[i].getAttribute("data-username");
            console.info(username+"=="+filter);
            if (username.toLowerCase().indexOf(filter) > -1) {
                filtered = true;
            }
            if(filtered===true) {
                div[i].style.display = '';
            }
            else {
                console.info("notmatc");
                console.info(div[i]);
                div[i].style.display = 'none';
            }
        }

    }
</script>
    <!--Frolad Editor Js -->

 <script type="text/javascript">
/*function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}*/
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <!-- Start and Stop Leaderboard script start End -->
</body>
</html>