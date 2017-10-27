<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){

        $users = User::all();
        return view('layouts.master_ab')->with(['users'=>$users]);
    }

    public function insert(Request $request){
        dd($request);
        echo('test');
    }

}
