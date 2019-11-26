@extends('layouts.master')
@section('title')
    Incoming Challenges
@endsection
@section("content")
    <?php
    use App\fight;
    use Illuminate\Support\Facades\Auth;
    use App\fighter;
    use App\Messages;

    $user_id=Auth::user()->id;
    $fightersData= fight::where([['receiver_id', $user_id],["status", "send"]])->orderBy('id', 'desc')->get();
    $msg_datas=Messages::where('receiver_id', $user_id)->orderBy('id', 'desc')->get();;
    ?>
    <script src="js/incoming.js"></script>

    <div class="container">
        <div class="row">
            <div style="text-align:center;" class="col-sm">
                <table class="table table-hover table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">First name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">background</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($fightersData as $fighterData){ $challenger_id=$fighterData['sender_id'];  $challenger_data=fighter::where('user_id', $challenger_id)->get();?>
                    <tr class="fight" id="<?php echo $fighterData["id"]; ?>">
                        <td>Incoming Challenge</td>
                        <td><?php echo $challenger_data[0]["firstname"]; ?></td>
                        <td><?php echo $challenger_data[0]["lastname"]; ?></td>
                        <td><?php echo $challenger_data[0]["background"]; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div style="text-align:center;" class="col-sm">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">From</th>
                        <th scope="col">Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($msg_datas as $msg_data){ $msg_sender_id= $msg_data['sender_id']; $msg_sender_data = fighter::where('user_id', $msg_sender_id )->orderBy('id', 'asc')->get(); ?>
                    <tr>
                        <td>Fight Offer</td>
                        <td><?php echo $msg_sender_data[0]['firstname']; ?> <?php echo $msg_sender_data[0]['lastname']; ?></td>
                        <td><?php echo $msg_data["msg"]; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection