<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InAuthRegistration extends Controller
{
    // public function store(Request $request, $registrationType)
    // {
    //     return $registrationType;
    // }

    public function render($type)
    {
        $countries = DB::table('countries')->get();
        if ($type == 'imo-registration')
            return view('front.registration-services.imo-registration', compact('countries'));
        else if ($type == 'agency-registration')
            return view('front.registration-services.agency-registration', compact('countries'));
        else if ($type == 'agent-registration')
            return view('front.registration-services.agent-registration', compact('countries'));

        abort(404, 'This kind of registration is not supported by our system !');
    }
}
