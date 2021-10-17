<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Member;
use App\Models\User;
use App\Events\Listener;
use App\Events\myEvent;
use App\Models\UserAttributes;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\Constraint\Operator;

class RoomController extends Controller
{
    //
    
    public function agent_available(Request $request){
        try {
            DB::beginTransaction();
            $room_id=Member::where('user_id',auth()->user()->id)->latest()->value('room_id'); //returning the first room id 
            if($room_id==Null){
                DB::rollBack();
                return response()->json(['status' => 422, 'message' => "You cannot perfrom this action of destroying room"]);
            
            }
             $agent_id=Member::where('room_id',$room_id)->get(); //returning agent object
            foreach($agent_id as $agent){
            // $agentd=User::where('id',$agent->user_id)->get();

            if(auth()->user()->id!=$agent->user_id){
                //notify him that room is closed 
                event(new myEvent(auth()->user()->id, 'I have disconned the Room. You may leave Now', $agent->user_id, $room_id));
            }
                $our_user=UserAttributes::where('user_id',$agent->user_id)->first();
                
            $member_ = Member::find($agent->id);
            $member_->delete();
                if($our_user->user_type=="csr"){
                    $our_user->is_available -= 1;
                    $our_user->save();
                }
         }
         $room=Room::find($room_id)->delete();
            if($agent_id){
                DB::commit();
                $message = "Agent is now available  Successfully !";
                return response()->json(['status' => 422, 'message' => $message]);
            
             }
            else {
                DB::rollBack();
                return response()->json(['status' => 422, 'message' => "Agent available to Create failed. Please Try Again."]);
            }
        }
        catch(Exception $exception){
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }
     
    public function make_agent_offline(){
        try {
            DB::beginTransaction();
         
                $old_value=UserAttributes::where('user_id',auth()->user()->id)->value('is_available');
                $room_id=UserAttributes::where('user_id',auth()->user()->id)->update( 
                    array( 
                          "is_available" => 0,
                          "val_id" => $old_value,
                          )); 

                          if($room_id){
                            DB::commit();
                           
                            return response()->json(['status' => 422, 'message' => "Agent Offline Successful . ."]);
                        
                         }
                        else {
                            DB::rollBack();
                            return response()->json(['status' => 422, 'message' => "Agent  to Offline failed. Please Try Again."]);
                        }
        }
        catch(Exception $exception){
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }
    

    public function make_agent_available(){
        try {
            DB::beginTransaction();
                $old_value=UserAttributes::where('user_id',auth()->user()->id)->value('val_id');
                $room_id=UserAttributes::where('user_id',auth()->user()->id)->update( 
                    array( 
                          "is_available" => $old_value,
                          "val_id" => 1,
                          // ..
                          )); 
                          if($room_id){
                            DB::commit();
                            return response()->json(['status' => 422, 'message' => "Agent online Successful "]);
                        
                         }
                        else {
                            DB::rollBack();
                            return response()->json(['status' => 422, 'message' => "Agent  to Offline failed. Please Try Again."]);
                        }
        }
        catch(Exception $exception){
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }


    public function support_chat(){
        return view("support.chat");
    }
    public function support(){
        return view("support.support");
    }
    public function support_agent(){
        return view("support.support_agent");
    }
    public function create_room(Request $req){
       
        try {
            if($mem=Member::where('user_id',auth()->user()->id)->orderBy('id','DESC')->first()){
                    return response()->json(['status' => 423,'operation'=>0,'message'=>"you are already a part of a room", 'mem'=>$mem]);
            }
            DB::beginTransaction();
               $Room= Room::create(['Creater'=>auth()->user()->id]);
            if($Room->exists()){

                $Member1= Member::create(['room_id'=>$Room->id,'user_id'=>auth()->user()->id,'user_type'=>Auth::user()->load('UserAttributes')->UserAttributes->user_type]);
                /* find the vela agent and assign him that user for support chat */
                      
                   $vela_agent=UserAttributes::where('is_available','<',4)->where('is_available','>',0)->where('user_type','csr')->inRandomOrder()->first();
                    if($vela_agent){
                         $vela_agent->is_available += 1;
                          $vela_agent->save();
                       }else{
                    return response()->json(['status' => 422,'operation'=>0, 'message' => "No CSR is free right now"]);
               
                       }
                       $roles= Member::create(['room_id'=>$Room->id,'user_id'=>$vela_agent->id,'user_type'=>UserAttributes::where('user_id',$vela_agent->id)->value('user_type')]);
                       if($roles->exists()){
                        event(new Listener($vela_agent->id));   
                        DB::commit();
                        return response()->json(['status' => 200,'operation'=>1, 'message' => "Room Created successfully","velaagent"=>$vela_agent]);
                         //notify that agent  that somebody has made a room wit him
                       }else{
                        DB::rollBack();
                        return response()->json(['status' => 422,'operation'=>0, 'message' => "Failed to Add CSR in your room "]);
           
                       }
               
            }
            else {
                DB::rollBack();
                return response()->json(['status' => 422, 'message' => "Failed to Create New Room. Please Try Again."]);
            }
        }
        // }
        catch(Exception $exception){
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }

    
}
