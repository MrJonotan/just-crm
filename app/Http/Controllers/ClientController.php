<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\UpdateEmployeeRequrst;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Project;

class ClientController extends Controller
{
    public function index()
    {
        $projects = Project::select('id', 'title')->get();
        if($projects->isEmpty()){
            $projects->prepend(new Project(['title' => 'Ничего не найдено']));
        }
        $projects->prepend(new Project(['title' => "Не выбрано"]));
        return view('crm.clients.view_clients', ['projects' => $projects]);
    }

    public function show($id)
    {
        $client = Client::find($id);
        return view('crm.client.index', ['client' => $client]);

    }

    public function store(StoreClientRequest $request){

    }

    public function update(UpdateClientRequest $request, $id){
        dd($request);
        $client = Client::find($id);
        $client->update($request->validated());
        $client->save();
        return $client;
    }

    public function search()
    {
        $query = Client::query();
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
        $clients = $query->get();
        if($clients->isEmpty()){
            throw $this->getException("Ничего не найдено!", 404);
        }
        return view('vendor.crm.client_card', ['clients' => $clients]);
    }
}
