<?php

namespace App\Http\Controllers;

use App\Models\enrollTourn;
use App\Models\Tournaments;
use App\Models\User;
use Illuminate\Http\Request;

class enrollTournController extends Controller
{
    function enroll($userId,$tournId){
        $user=User::find($userId);
        $tourn=Tournaments::find($tournId);
        // dd(auth()->guard('web'));

        if(enrollTourn::where("user_id",$userId)->where("tournament_id",$tournId)->exists()){
            return redirect()->back()->with('error',[response()->json([
                'status'=>404,
                'errors'=>'You Already Joined The Tournament'
            ],400)]);
        }
        if($user){
            if($tourn){
                if($tourn->remainingPlaces > 0){
                    $enrollement= new enrollTourn;
                    $enrollement->user_id=$userId;
                    $enrollement->tournament_id=$tournId;
                    $enrollement->save();
                    
                    $tourn->takesPlaces +=1;
                    $tourn->remainingPlaces -=1;
                    $tourn->update();

                    return redirect()->back()->with('response',[response()->json([
                        'status'=>200,
                        'message'=>'You successefuly Join '. $tourn->name . ' tournament',
                        'Enrollement'=>$enrollement
                    ],200)]);
                }else{
                    return redirect()->back()->with('error',[response()->json([
                        'status'=>404,
                        'errors'=>'No Remaining Places'
                    ],404)]);
                }


            }else{
                return redirect()->back()->with('error',[response()->json([
                    'status'=>404,
                    'errors'=>'The Tournament doesnt exist'
                ],404)]);
            }
        }else{
            return redirect()->back()->with('error',[response()->json([
                'status'=>404,
                'errors'=>'The User doesnt exist'
            ],404)]);
        }
    }

    function kick($userId,$tournId){
        $user=User::find($userId);
        $tourn=Tournaments::find($tournId);
        if($user){
            if($tourn){
                $enrollement=enrollTourn::where("tournament_id",$tournId)->where('user_id',$userId)->first();
                $enrollement->delete();
                $tourn->takesPlaces -=1;
                $tourn->remainingPlaces +=1;
                $tourn->update();

                return redirect()->back()->with('response',[response()->json([
                    'status'=>200,
                    'message'=>'The user has been kicked out of the tournament'
                ],200)]);
            }else{
                return redirect()->back()->with('error',[response()->json([
                    'status'=>404,
                    'error'=>'The Tournament doesnt exist'
                ],404)]);
            }
        }else{
            return redirect()->back()->with('error',[response()->json([
                'status'=>404,
                'error'=>'The User doesnt exist'
            ],404)]);
        }
    }
}
