<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fight;
use App\fighter;
use App\Train;
class simulateController extends Controller
{
    public function simulate(){

        // simulate fights

        $fights_data=fight::where('status', 'accepted')->get();
        $fights_data_ignored=fight::where('status', 'send')->get();
        $fights_data_completed=fight::where('status', 'completed')->get();

        foreach ($fights_data_completed as $fights_data_complete){
            $id=$fights_data_complete['id'];
            fight::where('id', $id)->update([
                'status' => 'done'
            ]);
        }

        foreach ($fights_data_ignored as $fight_data_ignored){
            $id=$fight_data_ignored['id'];
            fight::where('id', $id)->update([
                'status' => 'ignored'
            ]);
        }

        foreach ($fights_data as $fight_data){
            if($fight_data['winner_id'] == $fight_data["sender_id"]){
                $winner_id=(int) $fight_data["sender_id"];
                $loser_id=(int) $fight_data["receiver_id"];
            }
            if($fight_data['winner_id'] == $fight_data["receiver_id"]){
                $winner_id=(int) $fight_data["receiver_id"];
                $loser_id=(int) $fight_data["sender_id"];
            }

            $fight_status=$fight_data['status'];
            $fight_id=$fight_data['id'];


            // update Winner matches & wins
            $fighter_winner_data=fighter::where('user_id', $winner_id)->get();
            $fight_wins=$fighter_winner_data[0]['win'];

            $win_old = (int)$fight_wins;
            $win_new=$win_old+1;

            $fight_winner_matches=$fighter_winner_data[0]['matches'];
            $winner_matches_old = (int)$fight_winner_matches;
            $winner_matches_new=$winner_matches_old+1;


            fighter::where('user_id', $fighter_winner_data[0]['user_id'])->update([
                'win' => $win_new,
                'matches' => $winner_matches_new
            ]);


            // update Loser matches & wins

            $fighter_loser_data=fighter::where('user_id', $loser_id)->get();
            $fight_losses=$fighter_loser_data[0]['loss'];
            $loss_old = (int)$fight_losses;
            $loss_new=$loss_old+1;

            $fight_loser_matches=$fighter_winner_data[0]['matches'];
            $loser_matches_old = (int)$fight_loser_matches;
            $loser_matches_new=$loser_matches_old+1;

            fighter::where('user_id', $fighter_loser_data[0]['user_id'])->update([
                'loss' => $loss_new,
                'matches' => $loser_matches_new
            ]);

            // update Status of all matches

            if($fight_status == 'accepted'){
                fight::where('id', $fight_id)->update([
                    'status' => 'completed'
                ]);
            }
        }

        // simulate training

        $train_datas=Train::where('status', 'progress')->get();
        foreach ( $train_datas as $train_data ){
            $train_user_id = $train_data['user_id'];
            $train_points = $train_data['points'];
            $train_attribute = $train_data['attribute'];

            fighter::where('user_id', $train_user_id)->update([

                $train_attribute => $train_points

            ]);

            Train::where('user_id', $train_user_id)->update([

                'status' => 'completed'

            ]);

        }


    }
}
