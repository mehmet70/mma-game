@extends('layouts.master')
@section('title')
    My Fighter
@endsection
@section("content")
<?php
    use App\fighter;
    use Illuminate\Support\Facades\Auth;
    $user_id = Auth::user()->id;
    $fighterData = fighter::where("user_id", $user_id )->get();
    $firstname = $fighterData[0]['firstname'];
    $lastname = $fighterData[0]['lastname'];
    $background = $fighterData[0]['background'];
    $striking = $fighterData[0]['striking'];
    $grapling = $fighterData[0]['grapling'];
    $health = $fighterData[0]['health'];
    $stamina = $fighterData[0]['stamina'];
    $characterurl = $fighterData[0]['characterurl'];

?>

    <div class="container" style="background-color:green; padding:80px; border-radius:20px;background: linear-gradient(90deg, rgba(135,135,135,1) 11%, rgba(236,236,236,1) 80%, rgba(184,179,179,1) 100%, rgba(84,84,84,0) 100%);">
        <div class="row">

            <div class="col-sm">
                <img style="display:block; margin:auto; width:140px;" src="{{$characterurl}}">
            </div>

            <div class="col-sm">
                <div class="row">
                    <div class="col-sm">
                        <h2 style="text-align: center;"><b> <?php echo $firstname . " " . $lastname?></b></h2> <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <p>Striking</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-container w3-black w3-round-xlarge striking" style="width:<?php echo $striking ?>%"><?php echo $striking ?></div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <p>grapling</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-container w3-black w3-round-xlarge grapling" style="width:<?php echo $grapling ?>%"><?php echo $grapling ?></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm">
                        <p>Health</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-container w3-black w3-round-xlarge health" style="width:<?php echo $health ?>%"><?php echo $health ?></div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <p>Stamina</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-container w3-black w3-round-xlarge stamina" style="width:<?php echo $stamina ?>%"><?php echo $stamina ?></div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-sm">

            </div>

        </div>

        <div class="row">

        </div>
    </div>
<br>


@endsection