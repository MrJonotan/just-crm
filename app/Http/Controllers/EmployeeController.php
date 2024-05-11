<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequrst;
use App\Models\Department;
use App\Models\User;
use App\Models\JobStatus;
use App\Models\Position;

class EmployeeController extends Controller
{

    public function store(StoreEmployeeRequest $request)
    {
        return $this->index();
    }

    public function index()
    {
        return view('crm.employee.view_employee', $this->getSelectData());
    }

    private function getSelectData()
    {
        $departments = Department::select()->get();
        $positions = Position::select()->get();
        $statuses = JobStatus::select()->get();
        if($statuses->isEmpty()){
            return redirect('/settings');
        }
        $departments->prepend(new Department(['title' => "Не выбрано"]));
        $positions->prepend(new Position(['title' => "Не выбрано"]));
        $statuses->prepend(new JobStatus(['title' => "Не выбрано"]));
        return ['departments' => $departments, 'positions' => $positions, 'statuses' => $statuses];
    }

    public function search()
    {
        $query = User::query();
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
        $employees = $query->get();
        if($employees->isEmpty()){
            throw $this->getException("Ничего не найдено!", 404);
        }
        return view('vendor.crm.employee_card', ['employees' => $employees]);
    }

    public function edit(int $id)
    {
        $employee = User::find($id);
        return $employee;
    }

    public function create(StoreEmployeeRequest $request)
    {
        User::create($request->validated());
        return response()->json(['message' => 'Учетная запись создана'], 200);
    }

    public function update(UpdateEmployeeRequrst $request, int $id){


        $employee = User::find($id);
        foreach ($request->validated() as $key => $value){
            if($key !== 'password_confirmation'){
                if($employee->$key !== $value){
                    $employee->$key = $value;
                }
            }
        }
        $employee->save();
        return response()->json(['message' => "Данные сотрудника $employee->first_name $employee->name $employee->last_name обновлены"], 200);
    }

    public function getPosition(?string $department_id){
        return Position::select()->where('department_id', $department_id)->get();
    }

}
