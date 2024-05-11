<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmantController extends SettingController
{
    public string $title;
    
    public function show()
    {
        $columns = $this->getTableColumns('departments');
        $table = Department::select()->get()->toArray();
        return view('vendor.crm.setting_tab', ['table' => $table, 'columns' => $columns]);
    }
}
