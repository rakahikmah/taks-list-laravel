<?php

use Illuminate\Support\Facades\Route;
use App\Http\Requests\TaskRequest;
use App\Models\Task;


Route::get('/tasks', function (Task $task) {
    return view('tasks.index', [
        'tasks' => Task::latest()->paginate(10),
    ]);
})->name('tasks');

Route::get('/task/show/{task}', function (Task $task) {
    return view('tasks.show', [
        'task' => $task
    ]);
})->name('task.show');


Route::View('/task/create', 'tasks.create')->name('task.create');


Route::post('/task', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('task.show', [
        'task' => $task->id
    ])->with('success', 'Task created successfully');
})->name('task.store');


Route::get('/task/{task}/edit', function (Task $task) {
    return view('tasks.edit', [
        'task' => $task
    ]);
})->name('task.edit');


Route::put('/task/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('task.show', [
        'task' => $task->id
    ])->with('success', 'Task updated successfully');
})->name('task.update');

Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks')->with('success', 'Task deleted successfully');
})->name('task.delete');

Route::put('tasks/{task}/toggle-completed', function (Task $task) {
    $task->toogleCompleted();

    return redirect()->back()->with('success', 'Task updated successfully');
})->name('task.toggle-complete');


// Route::get('/', function () {
//     return view('index',[

//         'name' => 'Home',
//         'safeText' => '<em>Ini aman</em>',
//         'unsafeText' => '<script>alert("XSS")</script>'
//     ]);
// });

Route::get('/', function () {
    return view('welcome');
});

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
