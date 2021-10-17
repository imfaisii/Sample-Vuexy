<?php

namespace App\Http\Controllers;

use App\Models\UserAttributes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterPageController extends Controller
{
    //
    public function Status_Online(){
        try{
            DB::beginTransaction(); 
            $update=UserAttributes::where('id',auth()->user()->id)->update([
                'status'=>'online'
            ]);
            if($update){
                DB::commit();
                return response()->json(['operation'=>1,'message'=>'User status changed to online successfully']);
            }else{
                DB::rollBack();
                return response()->json(['operation'=>0,'message'=>'User status changed to online Failed']);
            }

        }catch(Exception $exception){
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }
    public function Status_Offline(){
        try{
            DB::beginTransaction(); 
            $update=UserAttributes::where('id',auth()->user()->id)->update([
                'status'=>'offline'
            ]);
            if($update){
                DB::commit();
                return response()->json(['operation'=>1,'message'=>'User status changed to online successfully']);
            }else{
                DB::rollBack();
                return response()->json(['operation'=>0,'message'=>'User status changed to online Failed']);
            }
        }catch(Exception $exception){
            DB::rollBack();
            return response()->json(['status' => 422, 'message' => $exception->getMessage()]);
        }
    }
}
