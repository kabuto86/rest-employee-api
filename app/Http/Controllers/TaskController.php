<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //create
    function store(Request $request){
        $newTask = Task::create($request->all());
        //hubungkan task yg baru dicreate dgn tags
        $newTask->tags()->attach($request->tags);
        return response()->json(["status"=>"ok","message"=>"Successfully Create"]);
    }

    //get all data
    function index(){
        //$tasks = Task::all();
        $tasks = Task::where('user_id',Auth::user()->id)->get();
        return response()->json(["status"=>"ok","data"=>$tasks]);

    }

    //get data based on id
    function show($id){
        $task = Task::with('tags')->find($id);
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
        // if(empty($task)){
        //     return response()->json(["status"=>"KO", "data"=>"Id invalid"]);
        // }
        $task->delete();
        return response()->json(["status"=>"OK", "data"=>"Successfully Delete"]);
    }
}
