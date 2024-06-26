<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\Group;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_the_schedule = [];   
        if(auth()->user()->role->name == 'admin'){
            $all_the_schedule = Schedule::all();
        }
        if(auth()->user()->role->name == 'teacher'){
            $all_the_schedule = Schedule::where('teacher_id', auth()->user()->id)->get();
        }
        if(auth()->user()->role->name == 'student'){
            $all_the_schedule = Schedule::where('group_id', auth()->user()->group_id)->get();
        }
        
        $scheduledClasses = [];

        foreach ($all_the_schedule as $schedule) {
            $subjectName = Subject::find($schedule->subject_id)->name;
            $teacherName = User::find($schedule->teacher_id)->name;
            $groupName = Group::find($schedule->group_id)->name;
            $scheduledClasses[] = [
                'title' => $subjectName,
                'extendedProps' => [ 'group' => $groupName ],
                'start' => $schedule->startTime,
                'end' => $schedule->finishTime
            ];
        }
        $allgroups = Group::all();
        $allsubjects = Subject::all();
        $teacherId = Role::where('name', 'teacher')->first()->id;
        $allteachers = User::where('role_id', $teacherId)->get();
        return view('schedule_management')
        ->with('all_groups', $allgroups)
        ->with('all_subjects', $allsubjects)
        ->with('all_teachers', $allteachers)
        ->with('scheduledClasses', $scheduledClasses);
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
        $validatedData = $request->validate([
            'group' => 'required|exists:groups,id',
            'subject' => 'required|exists:subjects,id',
            'teacher' => 'required|exists:users,id',
            'conduction_date' => 'required|date',
            'begin_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:begin_time',
        ]);
        $startTime = Carbon::createFromFormat('Y-m-d H:i', $request->conduction_date . ' ' . $request->begin_time);
        $finishTime = Carbon::createFromFormat('Y-m-d H:i', $request->conduction_date . ' ' . $request->end_time);

        $existingSchedule = Schedule::where('group_id', $validatedData['group'])
                                    ->where('subject_id', $validatedData['subject'])
                                    ->where('teacher_id', $validatedData['teacher'])
                                    ->where(function ($query) use ($startTime, $finishTime) {
                                            $query->whereBetween('starttime', [$startTime, $finishTime])
                                                ->orWhereBetween('finishtime', [$startTime, $finishTime])
                                                ->orWhere(function ($query) use ($startTime, $finishTime) {
                                                        $query->where('starttime', '<=', $startTime)
                                                            ->where('finishtime', '>=', $finishTime);
                                                });
                                    })->exists();

        if(!$existingSchedule)
        {
            Schedule::create([
                'group_id' => $validatedData['group'],
                'subject_id' => $validatedData['subject'],
                'teacher_id' => $validatedData['teacher'],
                'starttime' => $startTime,
                'finishtime' => $finishTime,
            ]);
        }
        else{
            return redirect()->back()->with('error', 'Subject is already added.');
        }
        return redirect()->back()->with('success', 'Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    
        return view('schedule_management', compact('scheduledClasses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {        
        $group_id = $request->input('groupId');
        $subject_id = $request->input('subjectId');
        $teacher_id = $request->input('teacherId');
        $conduction_date = $request->input('conductionDate');
        $begin_time = $request->input('startTime');
        $end_time = $request->input('endTime');

        $startTime = date('Y-m-d H:i:s', strtotime($conduction_date . ' ' . $begin_time));
        $finishTime = date('Y-m-d H:i:s', strtotime($conduction_date . ' ' . $end_time));

        $schedule = Schedule::where('group_id', $group_id)
                            ->where('subject_id', $subject_id)
                            ->where('teacher_id', $teacher_id)
                            ->where('startTime', $startTime)
                            ->where('finishTime', $finishTime)
                            ->first();
        if ($schedule) {
            $schedule->delete();
            return redirect()->back()->with('success', 'Subject deleted successfully.');
        }

        return redirect()->back()->with('error', 'Subject not found.');
    }
}
