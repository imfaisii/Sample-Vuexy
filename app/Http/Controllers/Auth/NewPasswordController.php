<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset as ModelsPasswordReset;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {   
        

        $obj=ModelsPasswordReset::where('token',$request->token)->latest()->get();
        if($obj->isNotEmpty())
        {      
            try {
            DB::beginTransaction();   
                $user=$obj[0]->value('email');
                    if (ModelsPasswordReset::where('email',$user)->latest()->delete()){
                    DB::commit();
                    return view('auth.reset-password', compact('user'));
                    }else{
                        DB::rollBack();
                        return response()->json([
                            'erorr'=>'saf',
                        ]);
                        return redirect('exception?message='. 'The Given link is Not Valid');
                    }
            }
            catch(Exception $exception){
                DB::rollBack();
                return redirect('exception?message='.$exception->getMessage(). '');
      
            }
       
        }else{
            return redirect('exception?message='. 'The Given link is Not Valid');
            
        }

    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'email' => ['required','exists:users,email'],
            'password'=>['confirmed','required','min:8','string']
            
        ],
        [   
            'email.required'    => 'Please Enter a Email',
            'password.confirmed'=>'Password Not matched',
        
        ]);
        try {
            $identifier= Hash::make($request->password);
            DB::beginTransaction(); 
            $roles= User::where('email',$request->email)->update(['password'=>$identifier]);
            if($roles){
                
                    DB::commit();
                    $message = "Password Updated Successfully !";
                    return response()->json(['status' => 422,'operation'=>1, 'message' => "Success"]);
            }
            else {
                DB::rollBack();
                return response()->json(['status' => 421,'operation'=>0, 'message' => "Password Updation Failed"]);
            }
        }
        catch(Exception $exception){
            DB::rollBack();
            return response()->json(['status' => 403, 'message' => $exception->getMessage()]);
        }
    }
}
