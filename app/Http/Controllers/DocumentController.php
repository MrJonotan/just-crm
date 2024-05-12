<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentRequest;
use App\Models\Document;
use App\Models\Project;
use App\Models\Task;
use App\Models\Client;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public string $title;
    public int $project_id;


    public function index ()
    {
        $projects = Project::select(['id', 'title'])->get();
        $tasks = Task::select(['id', 'title'])->get();
        $clients = Client::select('id', 'first_name', 'name')->get();
        if($projects->isEmpty()){
            return redirect('projects');
        }
        $projects->prepend(new Project(['title' => "Не выбрано"]));
        return view('crm.documents.view_documents', ['projects' => $projects, 'tasks' => $tasks, ]);
    }

    public function search()
    {
        $query = Document::query();
        if (array_key_exists('values', $_POST)) {
            foreach ($_POST['values'] as $key => $value) {
                if(!empty($value)){
                    $query->where($key, 'like', $value.'%');
                }
            }
        }else{
            $query->select();
        }
        $documents = $query->get();
        if($documents->isEmpty()){
            throw $this->getException("Ничего не найдено!", 404);
        }
        return view('vendor.crm.document_table', ['documents' => $documents]);
    }

    public function create(StoreDocumentRequest $request) {

//        Document::create($values);
        return response()->json(['message' => 'Документ добавлен'], 200);
    }

    private function upload(StoreDocumentRequest $request)
    {
        $request->validate([

            'title' => 'required|file|mimes:jpeg,png,pdf,rar,zip|max:2048',
        ]);

    }

}
