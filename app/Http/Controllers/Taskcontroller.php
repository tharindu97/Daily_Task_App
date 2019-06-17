<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class Taskcontroller extends Controller
{
    public function store(Request $request){
        
        $task = new Task;
        $this->validate($request,[
            'task'=>'required|max:100|min:5'
        ]);
        $task->task = $request->task;
        $task->save();
        $data = $task->all();
        return redirect()->back()->with('tasks',$data);
        //dd($request->all());
       
    }

    public function UpdateTaskCompleted($id){
            $task=Task::find($id);
            $task->iscompleted=1;
            $task->save();
            return redirect()->back();
    }

    public function UpdateTaskNotCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=0;
        $task->save();
        return redirect()->back();
    }

    public function DeleteTask($id){
        $task=Task::find($id);
        $task->delete();
        return redirect()->back();
    }

    public function UpdateTaskView($id){
        $task=Task::find($id);
        return view('updatetask')->with('taskdata',$task);
    }
    public function updatetask(Request $request){
        $id = $request->id;
        $task = $request->task;
        $data=Task::find($id);
        $data->task=$task;
        $data ->save();
        $datas = Task::all();
        return view('tasks')->with('tasks',$datas);

        
    }
}
