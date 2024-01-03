<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //create
    function store(Request $request){
        Task::create($request->all());
        return response()->json(["status"=>"ok","message"=>"Successfully Create"]);
    }

    //get all data
    function index(){
        $tasks = Task::all();
        return response()->json(["status"=>"OK", "data"=>$tasks]);
    }

    //get data based on id
    function show($id){
        $task = Task::find($id);
        return response()->json(["status"=>"OK", "data"=>$task]);
    }

    //update data
    function update(Request $request, $id){
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json(["status"=>"OK", "data"=>$task]);
    }

    //delete data based on id
    function delete($id){
        $task = Task::find($id);
        if(empty($task)){
            return response()->json(["status"=>"KO", "data"=>"Id invalid"]); die();
        }
        $task->delete();
        return response()->json(["status"=>"OK", "data"=>"Successfully Delete"]);
    }
}
