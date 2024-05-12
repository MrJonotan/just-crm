<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::find(1);
        return view('crm.project.view_project', ['project' => $project]);
    }

    // Метод для отображения формы создания нового проекта
    public function create()
    {
        $managers = User::where('role', 'manager')->get();
        return view('projects.create', ['managers' => $managers]);
    }

    // Метод для сохранения нового проекта
    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->input('name');
        $project->manager_id = $request->input('manager_id');
        // Другие поля проекта

        $project->save();

        return redirect()->route('projects.index');
    }

    // Метод для отображения информации о конкретном проекте
        public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', ['project' => $project]);
    }

    // Метод для отображения формы редактирования проекта
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $managers = User::where('role', 'manager')->get();
        return view('projects.edit', ['project' => $project, 'managers' => $managers]);
    }

    // Метод для обновления информации о проекте
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->name = $request->input('name');
        $project->manager_id = $request->input('manager_id');
        // Обновление других полей проекта

        $project->save();

        return redirect()->route('projects.index');
    }

    // Метод для удаления проекта
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index');
    }
}
