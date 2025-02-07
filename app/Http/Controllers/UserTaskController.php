<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTask;

class UserTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tasks'] = $user = UserTask::paginate(20);
        return view('user_task.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_tasks');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_task = new UserTask();
        $request->validate([
            'task_name'=>'required',
            'status'=>'required',
            'description'=>'required',
            'deadline'=>'required|date',        
        ]);
         $user_task ->task_name   = $request['task_name'];
         $user_task ->status      = $request['status'];
         $user_task ->description = $request['description'];
         $user_task ->deadline    = $request['deadline'];
         $user_task ->save();

        return back()->with('success', 'Data saved successfuly!.');        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
