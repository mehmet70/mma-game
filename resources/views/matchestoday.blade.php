
@extends('layouts.master')
@section('title')
    Tonight's Matches
@endsection

@section("content")
<?php
    use App\fight;
    use App\fighter;

    $user_id=Auth::user()->id;
    $fight_data=fight::where([['sender_id', $user_id],['status', 'accepted']])->orWhere([['receiver_id', $user_id],['status', 'accepted']])->get();
    $fighter = Auth::user()->fighter;
    $all_fights=fight::where('status', 'accepted')->get();

?>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <h1 style="color:white; background-image: linear-gradient(to right, gold, darkgoldenrod, gold); padding:30px; text-align:center">Tonight's Matches</h1>
        </div>
    </div>
</div>
<br>
@if(!$fight_data->isEmpty())
@foreach($all_fights as $all_fight)
    <?php
    $sender_id = $all_fight['sender_id'];
    $receivers_id = $all_fight['receiver_id'];
    $sender_data=fighter::where('user_id', $sender_id )->get();
    $receiver_data=fighter::where('user_id', $receivers_id)->get();
    ?>

    <div style="color:white;background-image: linear-gradient(to right, #870000 ,#190A05); padding:60px;" class="row">

        <div class="col-sm">

        </div>
        <div class="col-sm">
            <h1 style="text-align:center;"><?php echo $receiver_data[0]['firstname'];  ?> <?php echo $receiver_data[0]['lastname'];  ?></h1>
        </div>
        <div class="col-sm">
            <h1 style="text-align:center;"> VS </h1>
        </div>
        <div class="col-sm">
            <h1 style="text-align:center;"><?php echo $sender_data[0]['firstname'];;  ?> <?php echo $sender_data[0]['lastname'];;  ?></h1>
        </div>
        <div class="col-sm">
        </div>
    </div>
    <br>
@endforeach
    @else
    <h1 style="text-align:center;"> No Fights Today</h1>
    @endif

@endsection
