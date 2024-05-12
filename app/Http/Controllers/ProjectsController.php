<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Priority;
use App\Models\Project;
use App\Models\ProjectEmployee;
use App\Models\ProjectStatus;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function index()
    {
        $managers = User::select('id', 'first_name', 'name', 'last_name')->whereHas('roles', function ($query) {
            $query->where('name', 'manager');
        })->get();
        $priorities = Priority::select('id', 'title')->get();
        $statuses = ProjectStatus::select('id', 'title')->get();
        if($managers->isEmpty()){
            $managers->prepend(new User(['first_name' => 'Ничего', 'name' => 'не', 'last_name' => 'найдено']));
        }
        if($priorities->isEmpty()){
            $priorities->prepend(new Priority(['title' => 'Ничего не найдено']));
        }
        $managers->prepend(new User(['first_name' => "Не выбрано"]));
        $priorities->prepend(new Priority(['title' => "Не выбрано"]));
        $statuses->prepend(new ProjectStatus(['title' => "Не выбрано"]));
        return view('crm.projects.view_projects', ['managers' => $managers, 'priorities' => $priorities, 'statuses' => $statuses]);
    }

    public function search()
    {
        $query = Project::query();
        unset($_POST['_token']);
        foreach ($_POST as $key => $value) {
            if (!empty($value)) {
                if((int) $value !== 0){
                    $query->where($key,  $value);
                }else{
                    $query->where($key,  'like', '%'. $value .'%');
                }
            }
        }
        $projects = $query->get();
        if($projects->isEmpty()){
            throw $this->getException("Ничего не найдено!", 404);
        }
        return view('vendor.crm.project_card', ['projects' => $projects]);
    }

    public function show($id)
    {
        $project = Project::find($id);
//        dd(Auth::user()->projects);
        foreach (Auth::user()->projects as $employee_project) {
            if($employee_project->id == $project->id){
                return view('crm.project.view_project', ['project' => $project, 'chat' => $this->getChatMessage($project), 'hours' => $this->getTotalHours($project)]);
            }
        }
        return redirect('/projects');
    }

    private function getChatMessage(Project $project)
    {
        $chat = collect();
        if(!empty($project->project_chat)) {
            foreach ($project->project_chat as $message) {
                if (Auth::user()->id === $message->employee_id) {
                    $chat->push(view('vendor.crm.project_message_my', ['message' => $message]));
                } else {
                    $chat->push(view('vendor.crm.project_message_other', ['message' => $message]));
                }
            }
        }
        return $chat;
    }

    private function getTotalHours(Project $project)
    {
        $tasks = Task::select(DB::raw('SUM(hours) as hours'))
            ->where('project_id', $project->id)
            ->groupBy('project_id')
            ->get();
        foreach ($tasks as $task){
            return $task->hours;
        }
    }
}
