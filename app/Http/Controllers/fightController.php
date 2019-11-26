<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\fighter;
use App\fight;
use App\Messages;

class fightController extends Controller
{
   public function returnView($id){
       $fight_id=$id;

       return view('fight', ['fight_id' => $fight_id]);
   }
    public function updateStatus(Request $request){
       $user_id=Auth::user()->id;
        $status = $request->input('status');
        $fight_id = $request->input('fight_id');
        $challeger_data=fight::where('id', $fight_id)->get();
        $challeger_data_check=fight::where([['receiver_id', $user_id], ['status', 'accepted']])->get();
        $challenger_id=$challeger_data[0]['sender_id'];
        if($challeger_data_check->isEmpty()){
            fight::where([['receiver_id', $user_id],['id', $fight_id],['status', 'send']])->update([
                'status' => $status
            ]);
            if($status == 'accepted'){
                $message="Fight offer accepted";
                Messages::insert([
                    'sender_id' => $user_id,
                    'receiver_id' => $challenger_id,
                    'msg' => $message
                ]);
            }
            $msg='Fight accepted';

        }else{
            $msg='declined';
        }
        if($status == 'declined'){
            $message="Fight offer rejected";
            Messages::insert([
                'sender_id' => $user_id,
                'receiver_id' => $challenger_id,
                'msg' => $message
            ]);
        }
        return $msg;
    }
}
