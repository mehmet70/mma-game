@extends('layouts.master')
@section('title')
    My Fights
@endsection
@section("content")
    <?php
    use App\fighter;
    use App\fight;

    $user_id = Auth::user()->id;

    $losses = fight::where([["sender_id", $user_id], ['winner_id', "!=", $user_id], ['status', 'completed']])->orWhere([['receiver_id', $user_id],['winner_id', "!=", $user_id], ['status', 'completed']])->orderBy('id', 'desc')->get();

    $wins = fight::where([["sender_id", $user_id], ['winner_id', "=", $user_id], ['status', 'completed']])->orWhere([['receiver_id', $user_id],['winner_id', "=", $user_id], ['status', 'completed']])->orWhere([['receiver_id', $user_id],['winner_id', "=", $user_id], ['status', 'done']])->orWhere([["sender_id", $user_id], ['winner_id', "=", $user_id], ['status', 'done']])->orderBy('id', 'desc')->get();
    $win_data= fight::where('winner_id', $user_id)->get();
    $count = count($win_data);
    $user_data = fighter::where('user_id', $user_id)->get();

    $user_wins=$user_data[0]['win'];
    $user_losses=$user_data[0]['loss']; ?>

    @if(!$wins->isEmpty())
        <?php
        $winprecentage= $user_wins / ($user_wins+$user_losses) * 100;
        $winpercentagerounded=round($winprecentage, 1); ?>
    @else
      <?php  $winpercentagerounded=0; ?>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div style="text-align: center" class="col-sm">
                <h4><?php echo $user_wins ?>
                    <script type="text/javascript">
                        var message = "W/L";
                        var colors = new Array("green", 'black', "red");
                        for (var i = 0; i < message.length; i++)
                            document.write("<span style=\"color:" + colors[(i % colors.length)] + ";\">" + message[i] + "</span>");
                    </script>
                    <?php echo $user_data[0]['loss'] ?>
                </h4>
                <h4>Win Percentage:&nbsp; <?php echo $winpercentagerounded ?> %</h4>
            </div>
            <div class="col-sm">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <h1 style="text-align: center">Wins</h1>
                <table class="table">
                    <tbody>
                    <? foreach ($wins as $win){
                        if($win['sender_id'] == $user_id){
                            $opponent_id=$win['receiver_id'];
                        }else{
                            $opponent_id=$win['sender_id'];
                        }
                        $user_firstname=$user_data[0]['firstname'];
                        $user_lastname=$user_data[0]['lastname'];

                        $opponent_data=fighter::where('user_id', $opponent_id)->get();
                        $opponent_firstname=$opponent_data[0]['firstname'];
                        $opponent_lastname=$opponent_data[0]['lastname'];
                    ?>
                    <tr style="text-align: center">
                        <td><?php echo $user_firstname; ?> &nbsp; <?php echo $user_lastname; ?></td>
                        <td>vs</td>
                        <td><?php echo $opponent_firstname; ?> &nbsp; <?php echo $opponent_lastname; ?></td>
                    </tr>
               <?php  } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm">
                <h1 style="text-align: center">Losses</h1>
                <table class="table">
                    <tbody>
                    <? foreach ($losses as $loss){
                    if($loss['sender_id'] == $user_id){
                        $opponent_id=$loss['receiver_id'];
                    }else{
                        $opponent_id=$loss['sender_id'];
                    }
                    $user_data = fighter::where('user_id', $user_id)->get();
                    $user_firstname=$user_data[0]['firstname'];
                    $user_lastname=$user_data[0]['lastname'];

                    $opponent_data=fighter::where('user_id', $opponent_id)->get();
                    $opponent_firstname=$opponent_data[0]['firstname'];
                    $opponent_lastname=$opponent_data[0]['lastname'];
                    ?>
                    <tr style="text-align: center">
                        <td><?php echo $user_firstname; ?> &nbsp; <?php echo $user_lastname; ?></td>
                        <td>vs</td>
                        <td><?php echo $opponent_firstname; ?> &nbsp; <?php echo $opponent_lastname; ?></td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection