<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    //
    //create
    function create(Request $request){
        Tag::create($request->all());
        return response()->json(["status"=>"ok","message"=>"Successfully Create"]);
    }

    //get all data
    function index(){
        $tags = Tag::all();
        return response()->json(["status"=>"OK", "data"=>$tags]);
    }

    //get data based on id
    function show($id){
        $tags = Tag::find($id);
        return response()->json(["status"=>"OK", "data"=>$tags]);
    }
}
