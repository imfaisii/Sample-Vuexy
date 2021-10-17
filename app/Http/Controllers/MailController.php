<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForgetPasswordRequest;
use App\Events\ForgetPasswordEvent;
use App\Models\PasswordReset;
use App\Notifications\ForgetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Str;
use App\Mail\ForgetPasswordMail;
use App\Models\User;

class MailController extends Controller
{
    //
    public function forget_passowrd(ForgetPasswordRequest $request){
        if(PasswordReset::where('email',$request->email)->exists()){
            return response()->json(['status' => 420, 'message' => "A Mail is already Sent to you"]);
        }
        try {
            DB::beginTransaction();
            $token=Str::random(64);
            $user=User::where('email',$request->email)->with(['UserAttributes'])->get();
            $roles= PasswordReset::create(['token'=>$token,'email'=>$request->email]);

            if($roles->exists()){
                Mail::to($request->email)->send(new ForgetPasswordMail($user,$token, ));
                    DB::commit();

                    return response()->json(['status' => 422,'operation'=>1, 'message' => "Reset Password Mail Sent Successfully"]);
            }
            else {
                DB::rollBack();
                return response()->json(['status' => 421,'operation'=>0, 'message' => "Failed to sent Mail for reset Password"]);
            }
        }
        catch(Exception $exception){
            DB::rollBack();
            return response()->json(['status' => 403, 'message' => $exception->getMessage()]);
        }



    }
}
