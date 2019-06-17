<?php
use App\Task;

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
    return view('welcome');
});

Route::get('/tasks', function () {
    $task = new Task;
    $data = $task->all();
    return view('tasks')->with('tasks',$data);
});

Route::post('saveTask','Taskcontroller@store');

Route::get('/markscompleted/{id}','Taskcontroller@UpdateTaskCompleted');
Route::get('/marksnotcompleted/{id}','Taskcontroller@UpdateTaskNotCompleted');
Route::get('/deletedtask/{id}','Taskcontroller@DeleteTask');
Route::get('/updatetask/{id}','Taskcontroller@UpdateTaskView');
Route::post('/updatetasks','Taskcontroller@updatetask');