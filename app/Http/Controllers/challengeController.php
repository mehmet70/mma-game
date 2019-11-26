<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\fighter;
use App\fight;

class challengeController extends Controller
{
    public function getAuthId(Request $request){

        $sender_id = Auth::id();
        $receiver_id =$request->input('receiver_id');

        $sender_data= fighter::where("user_id", $sender_id)->get();
        $receiver_data= fighter::where("user_id", $receiver_id)->get();

        $fruits = array (
            "sender"  => $sender_data,
            "receiver" => $receiver_data
        );

        return $fruits ;
    }
    public function addFightWin(Request $request){
        $sender_id =$request->input('sender_id');
        $receiver_id =$request->input('receiver_id');
        $fight_data=fight::where([['sender_id', $sender_id],['receiver_id', $receiver_id], ['status', 'accepted']])->get();

        $fight_user_receive=fight::where([['receiver_id', $receiver_id], ['status', 'accepted']])->get();
        $fight_user_send=fight::where([['sender_id', $sender_id], ['status', 'accepted']])->get();

        $fight_opponent_receive=fight::where([['receiver_id', $sender_id], ['status', 'accepted']])->get();
        $fight_opponent_send=fight::where([['sender_id', $receiver_id], ['status', 'accepted']])->get();


        if ($fight_user_receive->isEmpty() && $fight_user_send->isEmpty()&& $fight_opponent_receive->isEmpty()&& $fight_opponent_send->isEmpty()) {
            fight::insert([
                [
                    'sender_id' => $sender_id,
                    'receiver_id' => $receiver_id,
                    'winner_id' => $sender_id,
                    'status' => "send"
                ]
            ]);
        }else{
            $message='This fighter is already fighting tonight or you might be already fighting tonight!';
                return $message;
        }

    }
    public function addFightLoss(Request $request){

        $sender_id =$request->input('sender_id');
        $receiver_id =$request->input('receiver_id');
        $fight_data=fight::where([['sender_id', $sender_id],['receiver_id', $receiver_id], ['status', 'accepted']])->get();

        $fight_user_receive=fight::where([['receiver_id', $receiver_id], ['status', 'accepted']])->get();
        $fight_user_send=fight::where([['sender_id', $sender_id], ['status', 'accepted']])->get();

        $fight_opponent_receive=fight::where([['receiver_id', $sender_id], ['status', 'accepted']])->get();
        $fight_opponent_send=fight::where([['sender_id', $receiver_id], ['status', 'accepted']])->get();
        if ($fight_user_receive->isEmpty() && $fight_user_send->isEmpty() && $fight_opponent_receive->isEmpty()&& $fight_opponent_send->isEmpty()) {
            fight::insert([
                [
                    'sender_id' => $sender_id,
                    'receiver_id' => $receiver_id,
                    'winner_id' => $receiver_id,
                    'status' => "send"
                ]
            ]);
        }else{
            $message='This fighter is already fighting tonight or you might be already fighting tonight!';
                return $message;
        }
    }
}
