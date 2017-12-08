<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(){
        $tasks = Task::all();
        return view('view_task')->with(['tasks'=>$tasks]);
    }

    public function index_manage(){
        $tasks = Task::all();
        $users = User::all()->sortBy('initial');
        return view('manage_task')->with(['tasks'=>$tasks, 'users'=>$users]);
    }

    public function view_insert(){

        $users = User::all()->sortBy('initial');
        return view('master_ab')->with(['users'=>$users]);
    }

    public function insert(Request $request){
        $initials = $request->input('initials');

        $task = new Task();
        $task->task_name = $request->task_name;
        $task->task_detail = $request->task_detail;
        $task->creator_id = 1;
        $task->task_status = "not done";
        $task->save();

        if($initials[0] == 0){
            $user = User::all();
        }
        else{
            $task->users()->attach($initials);
        }

        return redirect()->back();
    }

    public function delete(Request $request){

        $task = Task::find($request->id);
        $task->users()->detach();
        $task->delete();
        return response()->json(['status'=>true]);

    }

    public function update(Request $request){

        $task = Task::find($request->id);
        $task->task_status = "done";
        $task->save();
        return response()->json(['status'=>true]);
    }

    public function view_detail($id){
        $task = Task::find($id);
        $user = User::find($task->creator_id);
        return response()->json(['task'=>$task,'creator'=>$user,'pic'=>$task->users]);
    }

}
