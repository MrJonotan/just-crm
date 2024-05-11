<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirectoryName;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $tabs = DirectoryName::select()->get();
        return view('crm.settings.view_settings', ['tabs' => $tabs]);
    }

    public function create() {
        $table = request('table');
        $values = request('values');
        $model = $this->getModel($table);
        $instance = new $model();
        $instance::create($values);
        return response()->json(['message' => 'Запись успешно создана'], 200);
    }

    public function edit(?string $id)
    {
        $table = request('table');
        $model = $this->getModel($table);
        $instance = new $model();
        $item = $instance::find($id);
        return response()->json($item);
    }

    public function update($id) {
        $table = request('table');
        $values = request('values');
        $model = $this->getModel($table);
        $instance = new $model();
        $item = $instance::find($id);
        if($item){
            foreach($values as $key => $value){
                $item->$key = $value;
            }
            $item->save();
        }else{
            response()->json(['message' => 'Изменения не внесены!'], 500);
        }
        return response()->json(['message' => 'Запись успешно обновлена'], 200);
    }

    public function destroy($id) {
        $table = request('table');
        $model = $this->getModel($table);
        $instance = new $model();
        $item = $instance::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Запись успешно удалена'], 200);
    }

    protected function getModel(?string $table_name)
    {
        $model_name = "";
        $words_array = explode('_', $table_name);
        foreach($words_array as $item){
            $model_name .=  \ucfirst(Str::singular($item));
        }
        $model = '\App\Models\\'. $model_name;

        if (!class_exists($model)) {
            return response()->json(['message' => 'Таблица для записи не найдена!'], 404);
        }

        return $model;
    }

    public function show(?string $table_name)
    {
        $model = $this->getModel($table_name);
        $columns = $this->getTableColumns($table_name);
        $instance = new $model();
        $table = $instance::select()->get()->toArray();
        return view('vendor.crm.setting_tab', ['table' => $table, 'columns' => $columns]);
    }

    private function getTableColumns(?string $table_name)
    {
        $columns = Schema::getColumnListing($table_name);
        foreach($columns as $key => $value){
            $words = explode("_", $value);
            if(!empty($words[1]) && $words[1] == 'at'){
                unset($columns[$key]);
            }
        }
        return $columns;
    }

}
