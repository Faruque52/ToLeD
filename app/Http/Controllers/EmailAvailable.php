<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailAvailable extends Controller
{
    function index(){
        return view('email_available');
    }

    public function checkEmailAvailability(Request $request){
        $email = $request->input('email');
        $isExists = \App\User::where('email',$email)->first();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }
}
