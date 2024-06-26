<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allsubjects = Subject::all();
        $teacherId = Role::where('name', 'teacher')->first()->id;
        $allteachers = User::where('role_id', $teacherId)->get();
        return view('subject_management')->with('all_subjects', $allsubjects)->with( 'all_teachers', $allteachers);
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
        $ValidatedData = $request->validate([
            'subject' => 'required',
        ]);
        Subject::create(['name' => $ValidatedData['subject']]);
        return redirect()->back()->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject_to_delete = Subject::find($id);
        $subject_to_delete->delete();
        return redirect()->back()->with('success', 'Subject deleted successfully.');
    }
}
