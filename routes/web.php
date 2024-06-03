<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/tasks', function (){
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id){
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');


Route::post('/tasks', function (Request $request){
    dd($request->all());
})->name('tasks.store');

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::fallback(function () {
    return 'Still got somewhere!';
});
