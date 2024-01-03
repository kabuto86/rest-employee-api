<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function(){
    return 'Hellow World';
});

Route::get('/goodbye/{name}', function($name){
    return "Goodbye ".$name;
});

Route::post('/info', function(Request $request){
    return "Your name is ".$request['name']." your age is ".$request['age']." years old";
});

//create
Route::post('/tasks', [TaskController::class, 'store']);

//Real ALL
Route::get('/tasks', [TaskController::class, 'index']);

//get one employee
Route::get('/tasks/{id}',  [TaskController::class, 'show']);

//edit employee
Route::put('/tasks/{id}', [TaskController::class, 'update']);

//Delete employee
Route::delete('/tasks/{id}', [TaskController::class, 'delete']);
