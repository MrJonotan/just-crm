<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $task_statuses = TaskStatus::select()->get();
        return view('crm.user.dashboard', ['task_statuses' => $task_statuses]);
    }

    public function getTasks(){
        $tasks = Task::select()->where('employee_id', Auth::user()->id)->orderBy('updated_at', 'DESC')->orderBy('status_id', 'ASC')->get();
        return view('vendor.crm.task_card_min', ['tasks' => $tasks]);
    }
}
