<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('task')->group(function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::get('/create', [TaskController::class, 'createForm']);
    Route::post('/create', [TaskController::class, 'create']);
    Route::put('/update', [TaskController::class, 'update']);
    Route::delete('/delete/{id}', [TaskController::class, 'deleteTask']);
});

Route::get('/projects', function () {

//    $project = Project::create([
//        'title' => '2cents'
//    ]);
//
//    $user_1 = User::create([
//        'name' => 'Oleg',
//        'email' => 'user3@example.com',
//        'password' => '1111',
//        'project_id' => $project->id
//    ]);
//
//    $user_2 = User::create([
//        'name' => 'Maria',
//        'email' => 'user4@example.com',
//        'password' => '1111',
//        'project_id' => $project->id
//    ]);

    //$project = (new Project)->where('title', '=', 'Utilitium')->get();
    $project = (new Project)->find(3);
    dump($project->tasks->toArray());
//    $userPetia = (new User)->where('name', '=', 'Petia')->first();
//    $userVasia = (new User)->where('name', '=', 'Vasia')->first();


//    dump($userPetia->name);
////    dump($userVasia->id);
//
//    $task_1 = Task::create([
//        'title' => 'Task_1 for Utilitium Petia',
//        'user_id' => $userPetia->id
//    ]);
//    $task_2 = Task::create([
//        'title' => 'Task_2 for Utilitium Petia',
//        'user_id' => $userPetia->id
//    ]);
//    $task_3 = Task::create([
//        'title' => 'Task_1 for Utilitium Vasia',
//        'user_id' => $userVasia->id
//    ]);
});
