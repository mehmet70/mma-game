@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section("background-image")
    'img/myfighter.jpg'
@endsection
@section("content")
    <?php
      use App\fight;
       use App\fighter;

        $user_id=Auth::user()->id;
        $fight_data=fight::where([['sender_id', $user_id],['status', 'accepted']])->orWhere([['receiver_id', $user_id],['status', 'accepted']])->get();
        $fighter = Auth::user()->fighter;
        $all_fights=fight::where('status', 'accepted')->get();

        $fight_yesterday_data=fight::where([['sender_id', $user_id],['status', 'completed']])->orWhere([['receiver_id', $user_id],['status', 'completed']])->get();


    if($fighter == 1){
        $title="Create Fighter";
    }else{
        $title="My Fighter";
    }
    ?>


    @if(!$fight_data->isEmpty())
        <?php
            $receiver_id=$fight_data[0]['receiver_id'];
            $challenger_id=$fight_data[0]['sender_id'];

            $challenger_data=fighter::where('user_id', $challenger_id)->get();
            $fighter_data = fighter::where('user_id', $receiver_id)->get();

            $fighter_firstname=$fighter_data[0]['firstname'];
            $fighter_lastname=$fighter_data[0]['lastname'];
            $fighter_characterurl=$fighter_data[0]['characterurl'];
            $challenger_firstname=$challenger_data[0]['firstname'];
            $challenger_lastname=$challenger_data[0]['lastname'];
            $challenger_characterurl=$challenger_data[0]['characterurl'];
        ?>
        <br>
        <h1 style="text-align: center;">Tonight's Fight</h1>
        <br>
        <div style="color:white;background-image: linear-gradient(to right, #d1913c ,#ffd194); padding:30px;" class="row">
            <div class="col-sm">
                <img style=" margin-left:45%; width:100px;" src="{{$fighter_characterurl}}">
            </div>

            <div class="col-sm" style="margin-top:60px;">
                <h1 style="text-align:center;"><?php echo $fighter_firstname;  ?> <?php echo $fighter_lastname;  ?></h1>

            </div>
            <div class="col-sm" style="margin-top:60px;">
                <h1 style="text-align:center;"> VS </h1>
            </div>
            <div class="col-sm" style="margin-top:60px;">
                <h1 style="text-align:center;"><?php echo $challenger_firstname;  ?> <?php echo $challenger_lastname;  ?></h1>
            </div>
            <div class="col-sm">
                <img style=" transform: scaleX(-1); margin-left:45%; width:100px;" src="{{$challenger_characterurl}}">

            </div>
            <br>
            <hr>
        </div>
    @else
        <br>
        <h1 style="color:black; background-image: linear-gradient(to right, #abbaab ,#ffffff); padding:30px; text-align:center">You are not fighting today</h1>
    @endif
        <div class="container">
            <div class="row">
                <div class="col-sm">

                </div>
                <div class="col-sm">

                </div>
            </div>
        </div>


    @if(!$fight_yesterday_data->isEmpty())
        <?php
        $current_winner=$fight_yesterday_data[0]['winner_id'];
        $challenger_yesterday_data=fighter::where('user_id', $fight_yesterday_data[0]['sender_id'])->get();
        $fighter_yesterday_data=fighter::where('user_id', $fight_yesterday_data[0]['receiver_id'])->get();
        ?>
        @if($fight_yesterday_data[0]['sender_id'] == $current_winner)
            <br>
            <h1 style="text-align: center;">Yesterday's Result</h1>
            <br>
            <div style="color:white;background-image: linear-gradient(to right, #870000 ,#190A05); padding:60px;" class="row">
                <div class="col-sm">
                    <h1 style="text-align:center;color:white; margin-top:60px;">L</h1>
                </div>
                <div class="col-sm">
                    <h1 style="text-align:center; margin-top:60px;"> <?php echo $fighter_yesterday_data[0]['firstname'];  ?> <?php echo $fighter_yesterday_data[0]['lastname'];  ?></h1>
                </div>
                <div class="col-sm">
                    <img style=" margin-left:35%; width:100px;" src="{{$fighter_yesterday_data[0]['characterurl']}}">
                </div>
                <div class="col-sm">
                    <h1 style="text-align:center; margin-top:60px;"> VS </h1>
                </div>
                <div class="col-sm">
                    <img style=" margin-left:35%; width:100px; transform: scaleX(-1);" src="{{$challenger_yesterday_data[0]['characterurl']}}">
                </div>
                <div class="col-sm">
                    <h1 style="text-align:center; margin-top:60px;">  <?php echo $challenger_yesterday_data[0]['firstname'];  ?> <?php echo $challenger_yesterday_data[0]['lastname'];  ?> </h1>
                </div>
                <div class="col-sm">
                    <h1 style="color:green;text-align: center; margin-top:60px;">W</h1>
                </div>
                <hr>
            </div>
        @else
            <br>
            <h1 style="text-align: center;">Yesterday's Result</h1>
            <br>
            <div style="color:white;background-image: linear-gradient(to right, #870000 ,#190A05); padding:60px;" class="row">
                <div class="col-sm">
                    <h1 style="text-align:center; color:green; margin-top:60px;">W</h1>
                </div>
                <div class="col-sm">
                    <h1 style="text-align:center; margin-top:60px;">  <?php echo $fighter_yesterday_data[0]['firstname'];  ?> <?php echo $fighter_yesterday_data[0]['lastname'];  ?></h1>
                </div>
                <div class="col-sm">
                    <img style=" margin-left:35%; width:100px;" src="{{$fighter_yesterday_data[0]['characterurl']}}">
                </div>
                <div class="col-sm">
                    <h1 style="text-align:center; margin-top:60px;">  VS </h1>
                </div>
                <div class="col-sm">
                    <img style=" margin-left:35%; width:100px; transform: scaleX(-1);" src="{{$challenger_yesterday_data[0]['characterurl']}}">
                </div>
                <div class="col-sm">
                    <h1 style="text-align:center; margin-top:60px;"><?php echo $challenger_yesterday_data[0]['firstname'];  ?> <?php echo $challenger_yesterday_data[0]['lastname'];  ?>  </h1>
                </div>
                <div class="col-sm">
                    <h1 style="text-align:center; margin-top:60px;"> L </h1>
                </div>
                <br>
                <hr>
            </div>

        @endif

    @endif


    <br>
    <link href="css/dashboard.css" rel="stylesheet">
    <div class="container">
        <div class="row" style="margin-top:2%;">
            <div class="col-sm">
                <a href="myfighter">
                    <div class="card myfighter" >
                        <h1 style="margin:auto; color:white"><?php echo $title ?></h1>
                    </div>
                </a>
            </div>
            <div class="col-sm">
                <a href="train">
                    <div class="card train">
                        <h1 style="margin:auto;">Train</h1>
                    </div>
                </a>
            </div>
            <div class="col-sm">
                <a href="challenge">
                    <div class="card challenge">
                        <h1 style="text-align:center;margin:auto;">Challenge Fighter</h1>
                    </div>
                </a>
            </div>

        </div>
        <div class="row" style="margin-top:1%;">
            <div class="col-sm">
                <a href="myfights">
                    <div class="card myfights">
                        <h1 style="margin:auto;">My fights</h1>
                    </div>
                </a>
            </div>
            <div class="col-sm">
                <a href="league">
                    <div class="card league">
                        <h1 style="margin:auto;">League</h1>
                    </div>
                </a>
            </div>
            <div class="col-sm">
                <a href="incomingchallenges">
                    <div class="card mycareer" >
                        <h1 style="margin:auto;">Incoming<br>Challenges</h1>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection