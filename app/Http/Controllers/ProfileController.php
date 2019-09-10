<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use Image;
use \Input as Input;
class ProfileController extends Controller
{
    public function profile($username){
    	$user = User::whereUsername($username)->first();
    	return view('user.profile', compact('user'));
    }
    public function edit($username){
        $user = User::whereUsername($username)->first();
        return view('user.edit', compact('user'));
    }
    
}