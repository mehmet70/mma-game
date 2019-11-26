@extends('layouts.master')
@section('title')
    Most Wins
@endsection

@section("content")
    <link href="css/wins.css" rel="stylesheet">

    <?php
    use App\fighter;
    use Illuminate\Support\Facades\Auth;
    $user_id = Auth::user()->id;
    $fightersData = fighter::orderBy('win', 'desc')->get();?>
    <table class="table borderless">
        <thead style="color:white;background-image: linear-gradient(to right, #870000, #190A05);" class="thead">
        <tr>
            <th  scope="col">Rank</th>
            <th scope="col">Wins</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Background</th>
        </tr>
        </thead>
        <tbody style=" color:white;background-image: linear-gradient(to right, #870000, #190A05);">
            <?php $x=0; ?>
            <?php foreach ($fightersData as $fighterData){$x++; ?>
            <tr  class="rank<?php echo $x ?>" id="<?php echo $fighterData["user_id"]; ?>">
                <td style="padding-top:50px;"><?php echo $x ?></td>
                <td style="padding-top:50px;"><?php echo $fighterData["win"]; ?></td>
                <td style="padding-top:50px;"><?php echo $fighterData["firstname"]; ?></td>
                <td style="padding-top:50px;"><?php echo $fighterData["lastname"]; ?></td>
                <td ><img style=" margin:auto; width:50px;" src="{{$fighterData["characterurl"]}}"></td>
            </tr>


            <?php } ?>
        </tbody>
    </table>

@endsection