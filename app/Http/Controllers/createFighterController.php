<?php

namespace App\Http\Controllers;
use App\fighter;
use Illuminate\Http\Request;
use Auth;
use App\User;
class createFighterController extends Controller
{
    public function saveData(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $background = $request->input('fightingbackgrounds');
        $characterurl= $request->input("characterurl");
        $userId = Auth::user()->id;
        User::whereId($userId)->update([
            'fighter' => 2
        ]);


        if($background == "boxing"){
            fighter::insert(
                [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'background' => $background,
                    'striking' => 70,
                    'grapling' => 30,
                    'health' => 65,
                    'stamina' => 55,
                    'user_id' => $userId,
                    'characterurl' => $characterurl
                ]
            );
        }else{
            fighter::insert(
                [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'background' => $background,
                    'striking' => 45,
                    'grapling' => 60,
                    'health' => 55,
                    'stamina' => 65,
                    'user_id' => $userId,
                    'characterurl', $characterurl
                ]
            );
        }
    }
}
