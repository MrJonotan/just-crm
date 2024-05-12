<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $tasks = Task::select()->where('employee_id', Auth::user()->id)->get();
        $task_statuses = TaskStatus::select()->get();
        return view('crm.user.dashboard', ['tasks' => $tasks, 'task_statuses' => $task_statuses]);
    }
}
