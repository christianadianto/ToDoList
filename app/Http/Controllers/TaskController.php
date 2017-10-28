<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){

        $users = User::all();
        return view('layouts.master_ab')->with(['users'=>$users]);
    }

    public function insert(Request $request){
        $initials = $request->input('initials');

        $task = new Task();
        $task->task_name = $request->task_name;
        $task->task_detail = $request->task_detail;

    }

}
