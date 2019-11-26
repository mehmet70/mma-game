@extends('layouts.master')
@section('title')
    Challenge
@endsection
@section("content")
<?php
    use App\fighter;

    $user_id = Auth::user()->id;

    $fightersData = fighter::where("user_id", "!=" , $user_id)->inRandomOrder()->get();
?>

    <link href="css/challenge.css" rel="stylesheet">
    <script src="js/challenge.js"></script>
    <br>
    <h1 style="text-align: center;">Challenge Fighter</h1>
    <br>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            <div id="message" class="col-sm">
                   <h3 style="color:red;text-align: center;"></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <h3 style="text-align: center;">Select someone to challenge!</h3>
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <div class="col-sm">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th style="border-bottom:1px solid darkred;border-top:0px; background-color:red" scope="col"></th>
                            <th style="border-bottom:1px solid darkred;border-top:0px; background-color:red" scope="col">First Name</th>
                            <th style="border-bottom:1px solid darkred;border-top:0px; background-color:red" scope="col">Last Name</th>
                            <th style="border-bottom:1px solid darkred;border-top:0px; background-color:red" scope="col">Background</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach ($fightersData as $fighterData){ ?>

                            <tr id="<?php echo $fighterData["user_id"]; ?>">
                                <td style=" border-bottom:1px solid darkred;"><img style="height:100px" src={{$fighterData["characterurl"]}}></td>
                                <td style="vertical-align: middle; border-bottom:1px solid darkred;"><h3><?php echo $fighterData["firstname"]; ?></h3></td>
                                <td style="vertical-align: middle; border-bottom:1px solid darkred;"><h3><?php echo $fighterData["lastname"]; ?></h3></td>
                                <td style="vertical-align: middle; border-bottom:1px solid darkred;"><h3><?php echo $fighterData["background"]; ?></h3></td>
                            </tr>
                           <?php } ?>

                        </tbody>
                    </table>
            </div>
            <div class="col-md-auto">
                <button id="challengeBoy" type="button" class="btn btn-danger">Challenge!</button>
            </div>
        </div>
        <br>
    </div>
@endsection
