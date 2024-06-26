<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function index(){
        $foundUser = User::where('id', Auth::user()->id)->first();
        return view('profile', compact('foundUser'));
    }
    
    public function create()
    {
        return view('user-profile');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'avatar' => ['required', 'image'],
            'phone' => ['nullable'],
            'location' => ['nullable'],
            'about_me' => ['nullable'],
        ]);
        if ($request->hasFile('avatar')) {    
            $path = $request->file('avatar')->store('public/avatars');
            $filename = basename($path);
            User::where('id', Auth::user()->id)->update([
                'avatar' => $filename,
            ]);
        }
        
        return redirect('/user-profile')->with('success','Profile updated successfully');
    }
}
