<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admincheck');
    }
    public function admin_main(){
    	$users = User::where('role_id',2)->get();
    	return view('admin.main', compact('users'));
    }

    public function admin_logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }

    public function admin_new_staff(){
    	return view('admin.new_staff');
    }

    public function admin_new_staff_check(Request $request){
    	$user = new User;
    	$user->fname = $request['fname'];
    	$user->lname = $request['lname'];
    	$user->dob = $request['dob'];
    	$user->contact = $request['contact'];
    	$user->role_id = 2;
    	$user->username = $request['username'];
    	$user->password = bcrypt($request['password']);
    	$user->save();

    	return redirect()->back()->with('suc','New Staff added successfully!');
    }
}
