<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
		$user = Auth::user();
        if ($user->role->name == 'admin') {
            return redirect('/user-management')->with(['success'=>'You are logged in.']);
        } elseif ($user->role->name == 'teacher') {
            return redirect('/all_groups')->with(['success'=>'You are logged in.']);
        } elseif ($user->role->name == 'student') {
            return redirect('/schedule_management')->with(['success'=>'You are logged in.']);
        }
        else{
            return redirect('/schedule_management')->with(['success'=>'You are logged in.']);
        }
    }
}
