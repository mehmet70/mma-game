@extends('layouts.master')
@section('title')
    Create Fighter!
@endsection
@section("content")
    <link href="css/createfighter.css" rel="stylesheet">
    <script src="js/createfighter.js"></script>


    <div class="container">
        <div class="row">
            <div class="col-sm">
                <label>
                    <input class="backgroundRadio" type="radio" name="test" value="wrestling">
                    <img style="height:200px; width:325px" src="img/wrestling1.png">
                </label>
                <h1 style="text-align:center">Wrestling</h1>
            </div>
            <div class="col-sm">
                <h1 style="margin:30px auto auto auto; text-align:center"> Pick your fighting background!</h1>
            </div>
            <div class="col-sm">
                <label>
                    <input class="backgroundRadio" type="radio" name="test" value="boxing">
                    <img style="height:200px; width:325px" src="img/boxing1.jpg">
                </label>
                <h1 style="text-align:center">Boxing</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <div style="margin-left:50px !important">
                    <input id="firstname" type="text" placeholder="First Name"> <br> <br>
                    <input id="lastname" type="text" placeholder="Last Name">
                </div>
            </div>
            <div class="col-sm">

            </div>
        </div>
        <br>
        <h1 style="text-align: center;">Pick your fighter!</h1>
        <br>
        <div class="row">
            <div class="col-sm">
                <label>
                    <input class="character" type="radio" name="character" value="img/fighter1.gif">
                    <img style="height:300px; width:300px" src="img/fighter1.gif">
                </label>
            </div>
            <div class="col-sm">
                <label>
                    <input class="character" type="radio" name="character" value="img/fighter2.gif">
                    <img style="height:300px; width:300px" src="img/fighter2.gif">
                </label>
            </div>
            <div class="col-sm">
                <label>
                    <input class="character" type="radio" name="character" value="img/fighter3.gif">
                    <img style="height:300px; width:300px" src="img/fighter3.gif">
                </label>
            </div>
        </div>
    </div><br>
    <h1 style="text-align:center">Player Stats</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <p>Striking</p>
                <div class="w3-light-grey w3-round-xlarge">
                    <div class="w3-container w3-red w3-round-xlarge striking" style="width:0%">0</div>
                </div>
            </div>
            <div class="col-sm">
                <p>grapling</p>
                <div class="w3-light-grey w3-round-xlarge">
                    <div class="w3-container w3-red w3-round-xlarge grapling" style="width:0%">0</div>
                </div>
            </div>
            <div class="col-sm">

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <p>Health</p>
                <div class="w3-light-grey w3-round-xlarge">
                    <div class="w3-container w3-red w3-round-xlarge health" style="width:0%">0</div>
                </div>
            </div>
            <div class="col-sm">
                <p>Stamina</p>
                <div class="w3-light-grey w3-round-xlarge">
                    <div class="w3-container w3-red w3-round-xlarge stamina" style="width:0%">0</div>
                </div>
            </div>
            <div class="col-sm">

            </div>
        </div>
    </div>
    <br><br>
    <div style="text-align:center;">
        <button id="createButton" type="button" class="btn btn-danger">Create</button>
    </div>



@endsection