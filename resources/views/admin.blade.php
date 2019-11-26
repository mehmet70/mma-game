@extends('layouts.master')
@section('title')
    Admin Button
@endsection
@section("content")
    <script src="js/simulate.js"></script>
    <div class="container">
        <div style="height:200px;" class="row align-items-center">
            <div class="col">

            </div>
            <div class="col">
                <button class="btn btn-outline-danger" style="display:block;margin:0 auto;" id="simulateButton" >simulate</button>
            </div>
            <div class="col">

            </div>
        </div>
        <div class="row align-items-center">
            <div class="col">

            </div>
            <div class="col">
                <div id="message" style="text-align:center;">click on the button to simulate the day</div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection()