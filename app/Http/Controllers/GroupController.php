<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_groups = Group::all();
        return view('group_management', compact('all_groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Group::create([ 'name' => $request->group ]);
        return redirect()->back()->with('success', 'Group created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $all_groups = Group::all();
        return view('all_groups', compact('all_groups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->back()->with('success', 'Group deleted successfully');
    }
}
