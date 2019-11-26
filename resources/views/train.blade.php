@extends('layouts.master')
@section('title')
    Train
@endsection

@section("content")
    <?php
    use App\fighter;
    use Illuminate\Support\Facades\Auth;
    use App\Train;
    $user_id = Auth::user()->id;
    $fighterData = fighter::where("user_id", $user_id )->get();
    $firstname = $fighterData[0]['firstname'];
    $lastname = $fighterData[0]['lastname'];
    $background = $fighterData[0]['background'];
    $striking = $fighterData[0]['striking'];
    $grapling = $fighterData[0]['grapling'];
    $health = $fighterData[0]['health'];
    $stamina = $fighterData[0]['stamina'];
    $training_data= Train::where([['user_id', $user_id], ['status', 'progress']])->get();

    ?>
    <script src="js/train.js"></script>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <p>Striking</p>
                            <div class="w3-light-grey w3-round-xlarge">
                                <div class="w3-container w3-red w3-round-xlarge striking" style="width:<?php echo $striking ?>%"><?php echo $striking ?></div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <p>grapling</p>
                            <div class="w3-light-grey w3-round-xlarge">
                                <div class="w3-container w3-red w3-round-xlarge grapling" style="width:<?php echo $grapling ?>%"><?php echo $grapling ?></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-sm">
                            <p>Health</p>
                            <div class="w3-light-grey w3-round-xlarge">
                                <div class="w3-container w3-red w3-round-xlarge health" style="width:<?php echo $health ?>%"><?php echo $health ?></div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <p>Stamina</p>
                            <div class="w3-light-grey w3-round-xlarge">
                                <div class="w3-container w3-red w3-round-xlarge stamina" style="width:<?php echo $stamina ?>%"><?php echo $stamina ?></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm">
                <br>
                <select  class="form-control" id="trainSelect">
                    <option disabled selected value>Select one attribute</option>
                    <option value="striking">Striking</option>
                    <option value="grapling">Grapling</option>
                    <option value="stamina">Stamina</option>
                    <option value="health">Health</option>
                </select>
            </div>
            <div class="col-sm">
                <br>
                <button id="trainButton" type="button" class="btn btn-danger">Train!</button>
            </div>
        </div>
        <br>
        <div style="text-align:center;" class="row">
            <div class="col-sm">
                @if(!$training_data->isEmpty())
                    <h1>Currently training: <?php echo $training_data[0]['attribute'] ?> </h1>
                @endif
            </div>
        </div>
    </div>
@endsection