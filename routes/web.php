<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'permission:view-employee']], function () {
    Route::resource('employees', EmployeeController::class);
    Route::post('employee_search', [EmployeeController::class, 'search']);
    Route::get('employee_position/{id}', [EmployeeController::class, 'getPosition']);
});

Route::group(['middleware' => ['auth', 'permission:view-project']], function () {
    Route::resource('projects', ProjectsController::class);
    Route::post('projects_search', [ProjectsController::class, 'search']);
});

Route::group(['middleware' => ['auth', 'permission:view-document']], function () {
    Route::resource('documents', DocumentController:: class);
    Route::post('document_search', [DocumentController::class, 'search']);
});

Route::group(['middleware' => ['auth', 'permission:view-system-setting']], function () {
    Route::resource('settings', SettingController::class);
    Route::post('get_table', [SettingController::class, 'getTable']);
});

Route::resource('tasks', TaskController::class);
Route::resource('dashboard', DashboardController::class);
Route::get('/statistics/employee', function () {
    return view('crm.statistics.employees_statistics');
});

Route::group(['middleware' => ['auth', 'permission:view-client']], function () {
    Route::resource('clients', ClientController::class);
    Route::post('clients_search', [ClientController::class, 'search']);
});

Route::get('/statistics/project', function () {
    return view('crm.statistics.projects_statistics');
});
