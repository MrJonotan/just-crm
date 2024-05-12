<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\UpdateProjectStatusRequest;
use App\Models\Client;
use App\Models\Holiday;
use App\Models\Priority;
use App\Models\Project;
use App\Models\ProjectChat;
use App\Models\ProjectEmployee;
use App\Models\ProjectStatus;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

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
        $task_statuses = TaskStatus::whereNot('id', 1)->get();
        $priorities = Priority::query()->get();
        if($project){
            if(Gate::allows('view', $project) || $project->manager_id == Auth::user()->id || $project->start_date_plan == '-'){
                return view('crm.project.view_project', [
                    'project' => $project,
                    'hours' => $this->getTotalHours($project),
                    'task_statuses' => $task_statuses,
                    'priorities' => $priorities
                ]);
            }else{
                throw $this->getException('Вы не имеете доступа к данному проекту!', 422);
//                return redirect('/projects');
            }
        }
    }

    public function create(){
        $managers = User::select('id', 'first_name', 'name', 'last_name', 'position_id')->whereHas('roles', function ($query) {
            $query->where('name', 'manager');
        })->get();
        $priorities = Priority::select('id', 'title')->get();
        $statuses = ProjectStatus::select('id', 'title')->get();
        $clients = Client::select('id', 'organization')->get();
        $employees = User::query()->get();
        if($managers->isEmpty()){
            $managers->prepend(new User(['first_name' => 'Ничего', 'name' => 'не', 'last_name' => 'найдено']));
        }
        if($priorities->isEmpty()){
            $priorities->prepend(new Priority(['title' => 'Ничего не найдено']));
        }
        $managers->prepend(new User(['first_name' => "Не выбрано"]));
        $priorities->prepend(new Priority(['title' => "Не выбрано"]));
        $statuses->prepend(new ProjectStatus(['title' => "Не выбрано"]));
        $clients->prepend(new Client(['organization' => "Не выбрано"]));
        if(Auth::user()->hasRole('manager')){
            return view('crm.project.create', ['title' => "Добавить проект", 'managers' => $managers, 'priorities' => $priorities, 'statuses' => $statuses, 'clients' => $clients, 'employees' => $employees]);
        }else{
            return redirect('/projects');
        }
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());
        if ($request->has('employees')) {
            foreach ($request->input('employees') as $employeeId) {
                ProjectEmployee::create([
                    'project_id' => $project->id,
                    'employee_id' => $employeeId,
                ]);
            }
        }
        return $this->show($project->id);
    }

    public function update($id, UpdateProjectRequest $request){
        $project = Project::find($id);
//        if ($request->has('employees')) {
//            $project->employees()->delete();
//            foreach ($request->input('employees') as $employeeId) {
//                ProjectEmployee::create([
//                    'project_id' => $project->id,
//                    'employee_id' => $employeeId,
//                ]);
//            }
//        }
//        $request->request->remove('employees');
//        $project->update($request->validated());
        return to_route('/projects/' . $project->id);
    }

    public function edit($project_id){
        $managers = User::select('id', 'first_name', 'name', 'last_name', 'position_id')->whereHas('roles', function ($query) {
            $query->where('name', 'manager');
        })->get();
        $project = Project::find($project_id);
        $priorities = Priority::select('id', 'title')->get();
        $statuses = ProjectStatus::select('id', 'title')->get();
        $employees = User::query()->get();
        if(Gate::allows('edit', $project)){
            return view('crm.project.create', ['title' => "Редактировать проект", 'managers' => $managers, 'project' => $project, 'priorities' => $priorities, 'statuses' => $statuses, 'employees' => $employees]);
        }else{
            return redirect("/projects/$project_id");
        }
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

    public function getEndDate()
    {
        $start = $_POST['start'];
        $hours = (empty($_POST['hours'])) ? null : $_POST['hours'];
        $end = (empty($_POST['end'])) ? null : $_POST['end'];

        if($end == null){
            $result = $this->getDate($start, $hours);
        }else{
            $result = $this->getHours($start, $end);
        }
        return $result;
    }

    private function getDate($start_date, int $hours){
        $full_days = intval($hours / 8);
        $remainding_hours = $hours % 8;
        $all_days = ($remainding_hours == 0) ? $full_days : $full_days + 1;
        $end_date = $start_date;
        $holidays = Holiday::select('date', 'hours')->get();
        $weekeng_hours = 0;
        for($i = 0; $i < $all_days; $i++){
            $holiday = $holidays->first(function ($holiday) use ($end_date) {
                return Carbon::parse($holiday['date'])->isSameDay($end_date);
            });
            if(Carbon::parse($end_date)->isWeekday() && $holiday){
                if($holiday['hours'] == 8){
                    $all_days++;
                }else{
                    $weekeng_hours += $holiday['hours'];
                }
            }elseif(Carbon::parse($end_date)->isWeekend() && !$holiday){
                $all_days++;
            }elseif(Carbon::parse($end_date)->isWeekend() && $holiday){
                $all_days--;
            }
            $end_date = Carbon::parse($end_date)->addDay();
        }
        return Carbon::parse($start_date)->addDays($all_days)->addHours($weekeng_hours)->format('Y-m-d');
    }

    private function getHours($start_date, $end_date){
        $all_days = Carbon::parse($start_date)->diffInDays(Carbon::parse($end_date));
        $holidays = Holiday::select('date', 'hours')->get();
        $working_days = $all_days;
        $weekeng_hours = 0;
        for($i = 0; $i < $all_days; $i++){
            $holiday = $holidays->first(function ($holiday) use ($start_date) {
                return Carbon::parse($holiday['date'])->isSameDay($start_date);
            });
            if(Carbon::parse($start_date)->isWeekday() && $holiday){
                if($holiday['hours'] == 8){
                    $working_days--;
                }else{
                    $weekeng_hours += $holiday['hours'];
                }
            }elseif(Carbon::parse($start_date)->isWeekend() && !$holiday){
                $working_days--;
            }elseif(Carbon::parse($start_date)->isWeekend() && $holiday){
                $working_days++;
            }
            $start_date = Carbon::parse($start_date)->addDay();

        }
        $working_hours = $working_days * 8 - $weekeng_hours;
        return $working_hours;
    }

    public function updateStatus($project_id){
        $project = Project::find($project_id);
        $project->update(['status_id' => (int)request()['status_id']]);
        return view('vendor.crm.project_header', ['project' => $project]);
    }

    public function addMessage($project_id){
        $project = Project::find($project_id);
        if($project->employees->contains('employee_id', Auth::user()->id)){
            $message = ProjectChat::create(['project_id' => $project_id, 'employee_id' => request()['employee_id'], 'text' => request()['text']]);
            return view('vendor.crm.project_message_my', ['message' => $message]);
        }else{
            return response()->json(['error' => 'У Вас не достаточно прав для отправки сообщения'], 422);
//            return $this->getException('У Вас не достаточно прав для отправки сообщения!', 422);
        }
    }

    public function destroy($id){
        $project = Project::find($id);
        if($project->has('employees')){
            $project->employees()->delete();
        }
            if($project->has('project_chat')){
            $project->project_chat()->delete();
        }
        $project->delete();
        return redirect('/projects');
    }
}
