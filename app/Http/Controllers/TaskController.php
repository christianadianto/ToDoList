<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function insert(Request $request){
        dd($request);
        echo('test');
    }

}
