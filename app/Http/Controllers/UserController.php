<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allUsers = User::with('role')->with('group')->get();
        return view('user-management', ['allusers' => $allUsers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allroles = Role::all();
        $allgroups = Group::all();
        return view('add_new_user', compact('allroles', 'allgroups'));
    }

    /**
     * Store a newly created resource in storage.
         */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'surname' => ['required', 'max:50'],
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:20'],
            'role_id' => ['required'],
            'group_id' => ['nullable']
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );        
        $user = User::create($attributes);
        return redirect('/user-management');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $studentRoleId = Role::where('name', 'student')->first()->id;
        $students = User::where('role_id', $studentRoleId)->with('role')->with('group')->get();
        return view('all_students', ['students' => $students]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $userToEdit = User::findOrFail($id);
        $allroles = Role::all();
        $allgroups = Group::all();
        return view('add_new_user', compact('allroles', 'userToEdit', 'allgroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validate(
        [
            'surname' => ['required', 'max:50'],
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'password' => ['required', 'min:3', 'max:20'],
            'role_id' => ['required', 'not_in:Оберіть роль'],
            'group_id' => ['nullable']
        ], 
        [ 
            'role_id.not_in' => 'Роль обов\'язкова'
        ]
        );
        $validatedData['password'] = bcrypt($validatedData['password'] );   
        $user->update($validatedData);
        return redirect()->action([UserController::class, 'index'])->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/user-management');
    }

    public function showStudentsByGroup($groupId)
    {
        $studentRoleId = Role::where('name', 'student')->first()->id;
        $students = User::where('role_id', $studentRoleId)->where('group_id', $groupId)->get();
        return view('all_students', ['students' => $students]);
    }
}
