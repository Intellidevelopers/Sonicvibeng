<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        $data = [];
        $data['title'] = "User Dashboard";
        $user = Auth::guard('user')->user();
        $id = $user->id;
        $data['user'] = User::where('id',$id)->first();
        return view('user.dashboard')->with($data);
    }
}