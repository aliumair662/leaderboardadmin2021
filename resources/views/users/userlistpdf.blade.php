<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid site-wrapper">
            <div class="row">

                <div class="col-12">
                    <div class="row leaderboard-search user">
                        <div class="col-md-3">
                            <h4>USERS</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 player-data user-table">
                    <table class="table table-borderless table-responsive" id="customers">
                        <tbody><tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            
                            <th>Email</th>
                            <th>Password</th>
                             <th>instagram</th>
                             <th>Ip</th>
                          <th>Country</th>
                        </tr>
                        @if(!empty($users))
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->firstname}}</td>
                                    <td>{{$user->lastname}}</td>
                                    
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->password_text}}</td>
                                     <td>{{$user->instagramUsername}}</td>
                                      <td>{{$user->ip}}</td>
                <td>{{$user->country}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>


</body>
</html>

