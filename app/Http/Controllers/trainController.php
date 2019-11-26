<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fighter;
use App\Train;
use Illuminate\Support\Facades\Auth;




class trainController extends Controller
{
    public function train(Request $request){

        $user_id = Auth::user()->id;

        $training_data= Train::where([['user_id', $user_id], ['status', 'progress']])->get();

        $fighterData = fighter::where("user_id", $user_id )->get();

        $attribute = $request->input('trainSelect');

        $trainPoints = $request->input('trainPoints');

        $previousTrainingPoints = $fighterData[0][$attribute];

        $newTrainingPoints=$previousTrainingPoints + $trainPoints;

        if( $newTrainingPoints >= 100 ){
            $newTrainingPoints = 100;
        }

         if($training_data->isEmpty()){
             Train::insert([
                 'user_id' => $user_id,
                 'points' => $newTrainingPoints,
                 'attribute' =>$attribute,
                 'status' => 'progress'
             ],
                 ['timestamps' => false]);
         }else{
             Train::where([['user_id', $user_id], ['status', 'progress']])->update([
                 'points' => $newTrainingPoints,
                 'attribute' =>$attribute,
             ],
                 ['timestamps' => false]);
         }


    }
}
?>