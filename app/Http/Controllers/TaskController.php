<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show($id)
    {
        $task = Task::find($id);
        if($task){
            return view('crm.task.view_task', ['task' => $task]);
        }else{
            return redirect('/projects');
        }
    }
}
