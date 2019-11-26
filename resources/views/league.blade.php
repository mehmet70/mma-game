@extends('layouts.master')
@section('title')
    League
@endsection

@section("content")
    <link href="css/league.css" rel="stylesheet">

    <div class="container">
        <div class="row" style="margin-top:2%;">

            <div class="col-sm">
                <a href="wins">
                    <div class="card win">
                        <h1 style="margin:auto;">Most Wins</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="row" style="margin-top:2%;">
            <div class="col-sm">
                <a href="#">
                    <div class="card ko">
                        <h1 style="margin:auto;">Most Ko's</h1>
                    </div>
                </a>
            </div>
            <div class="col-sm">
                <a href="#">
                    <div class="card stoppage">
                        <h1 style="margin:auto;">Most Stoppages</h1>
                    </div>
                </a>
            </div>
            <div class="col-sm">
                <a href="#">
                    <div class="card sub">
                        <h1 style="margin:auto;">Most Subs</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection()