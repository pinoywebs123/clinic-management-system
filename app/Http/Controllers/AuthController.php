<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function login(){
    	return view('welcome');
    }

    public function login_check(Request $request){
    	if(Auth::attempt(['username'=> $request['username'], 'password'=> $request['password']])){
    		
            if(Auth::user()->role_id == 2){
                return redirect()->route('nurse_main');
            }else{
                return redirect()->route('admin_main');
            }
    	}else{
    		return redirect()->back()->with('err', 'no no');
    	}
    }
}
