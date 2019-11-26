<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/offersend', function () {
    return view('offersend');
})->middleware('auth');

Route::get('/challenge', function () {
    return view('challenge');
})->middleware('auth');

Route::get('/offerdeclined', function () {
    return view('declined');
})->middleware('auth');

Route::get('/train', function () {
    return view('train');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/myfights', function () {
    return view('myfights');
})->middleware('auth');

Route::get('/league', function () {
    return view('league');
})->middleware('auth');

Route::get('/wins', function () {
    return view('wins');
})->middleware('auth');

Route::get('/incomingchallenges', function () {
    return view('incomingchallenges');
})->middleware('auth');

Route::get('/offeraccept', function () {
    return view('offeraccepted');
})->middleware('auth');

Route::get('/offerdecline', function () {
    return view('offerdeclined');
})->middleware('auth');

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/admin', function () {
    $admin = Auth::user()->admin;
    if($admin == 1){
        return view('admin');
    }else{
        return view('dashboard');
    }
})->middleware('auth');

Route::get('/myfighter', function () {
    $fighter = Auth::user()->fighter;
    if($fighter == 1){
        return view('createfighter');
    }else{
        return view('myplayer');
    }
})->middleware('auth');

Route::get('/home', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/home', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/matchestoday', function () {
    return view('matchestoday');
})->middleware('auth');

Route::get('/results', function () {
    return view('results');
})->middleware('auth');

Route::get('/fightdetail/{random_id}', function () {
    return view('fightdetail');
})->middleware('auth');


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/{random_id}', 'fightController@returnView');

Route::post('/getAuthId', 'challengeController@getAuthId');

Auth::routes();

Route::post('/updateStatus', 'fightController@updateStatus');

Route::post('/saveData', 'createFighterController@saveData');

Route::post('/addFightWin', 'challengeController@addFightWin');

Route::post('/addFightLoss', 'challengeController@addFightLoss');

Route::post('/train', 'trainController@train');

Route::post('/simulate', 'simulateController@simulate')->name("simulate");


Auth::routes();