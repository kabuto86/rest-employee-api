<?php

use App\Http\Controllers\PassportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TagController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('jwt.auth')->group(function () {
    //TASK//
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


    //TAG//
    Route::post('/tags', [TagController::class, 'create']);
    Route::get('/tags', [TagController::class, 'index']);
    Route::get('/tags/{id}', [TagController::class, 'show']);
    // Route::put('/tags/{id}', [TagController::class, 'update']);
    // Route::delete('/tags/{id}', [TagController::class, 'delete']);

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



//LOGIN
Route::post('/login', [PassportController::class,'login']);
Route::post('/register', [PassportController::class,'register']);
