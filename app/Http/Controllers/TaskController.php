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

        $task->users()->attach($initials);

        $email_list = [];
        foreach ($task->users as $user){
            if($user->email != '')
                $email_list []= $user->email;
        }

        $url = 'http://api.na.slc/send-mail';
        $fields = array(
            'from' => "ToDoList Task",
            'to' => $email_list,
            'subject' => "New ToDoList Come For You",
            'content' => "Dear rekans, Ada ToDoList baru untuk anda. mohon segera di cek"
        );

        $fields_string = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        $result = curl_exec($ch);

        curl_close($ch);

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
