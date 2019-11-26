@extends('layouts.master')
@section('title')
    Fight Offer
@endsection
@section("content")
    <script src="js/fight.js"></script>
<?php
    use App\fight;
    use App\fighter;
    use Illuminate\Support\Facades\Auth;

    $fighter_id=Auth::user()->id;
    $fighter_data=fighter::where( 'user_id', $fighter_id )->get();

    $fight_data=fight::where([['id', $fight_id],['receiver_id', $fighter_id], ['status', 'send']])->get();
   ?>

    @if(!$fight_data->isEmpty()) <?php
        $receiver_id=$fight_data[0]['receiver_id'];
        $challenger_id=$fight_data[0]['sender_id'];
        $challenger_data=fighter::where('user_id', $challenger_id)->get();
        $fighter_firstname=$fighter_data[0]['firstname'];
        $fighter_lastname=$fighter_data[0]['lastname'];
        $challenger_firstname=$challenger_data[0]['firstname'];
        $challenger_lastname=$challenger_data[0]['lastname'];
        $permission='yes';
        ?>
    <div style="margin-top:100px;" class="container">
        <div class="row">
            <div id="message" class="col-sm">
                <h3 style="color:red;text-align: center;"></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <h1 style="text-align:center;"><?php echo $fighter_firstname;  ?> <?php echo $fighter_lastname;  ?></h1>
            </div>
            <div class="col-sm">
                <h1 style="text-align:center;"> VS </h1>
            </div>
            <div class="col-sm">
                <h1 style="text-align:center;"><?php echo $challenger_firstname;  ?> <?php echo $challenger_lastname;  ?></h1>
            </div>
        </div>
        <br>
        <div style="margin-top:30px;" class="row">
            <div  align="center" class="col-sm">
                <button data=<?php echo $fight_id ?> id="accept" type="button" class="btn btn-success">Accept</button>
                <button data=<?php echo $fight_id ?> id="decline" type="button" class="btn btn-danger">Decline</button>
            </div>
        </div>
    </div>

    @else
        NO PERMISSION
    @endif

<?php

?>


@endsection