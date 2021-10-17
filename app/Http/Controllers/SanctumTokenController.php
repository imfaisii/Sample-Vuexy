<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SanctumTokenController extends Controller
{
    static function generate_token_with_email($email)
    {
        $user = User::where('email', '=', $email)->first();
        $token = $user->createToken('FamilyTrackerAppToken')->plainTextToken;
        $user->api_token = 'Bearer ' . $token;
        $user->save();
    }
}
