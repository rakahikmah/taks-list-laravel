<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/tasks', function () {
    return view('tasks.index', [
        'tasks' => \App\Models\Task::latest()->get(),
    ]);
})->name('tasks');

Route::get('/task/show/{id}', function ($id) {
    $task = \App\Models\Task::findOrFail($id);

    return view('tasks.show', [
        'task' => $task
    ]);
})->name('task.show');

Route::View('/task/create', 'tasks.create')->name('task.create');


Route::post('/task/store', function (Request $request) {

    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'long_description' => 'required|max:255',
        'completed' => 'boolean'
    ]);

    $task = new \App\Models\Task();
    $task->title = request('title');
    $task->description = request('description');
    $task->long_description = request('long_description');
    $task->completed = request('completed') ? 1 : 0;
    $task->save();

    return redirect()->route('task.show', [
        'id' => $task->id
    ]);
})->name('task.store');


// Route::get('/', function () {
//     return view('index',[

//         'name' => 'Home',
//         'safeText' => '<em>Ini aman</em>',
//         'unsafeText' => '<script>alert("XSS")</script>'
//     ]);
// });

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello', function () {
    return 'Hello World';
});


Route::get('/hellotest', function () {
    return 'Hello World test';
})->name('hellotest');

Route::get('/hellodirect', function () {
    return redirect()->route('hellotest');
});

Route::get('/hello/{name}/{umur}', function ($name, $umur) {
    return 'Hello ' . $name . ' umur ' . $umur;
});


// Ini adalah untuk menangkap semua route yang tidak ada
Route::fallback(function () {
    return 'fall back';
});
