<?php

use Illuminate\Support\Facades\Route;


class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {}
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];

Route::get('/tasks', function () use ($tasks) {
    return view('tasks.index', [
        'tasks' => $tasks
    ]);
})->name('tasks');

Route::get('/task/show/{id}', function ($id) use($tasks) {
   $task = collect($tasks)->firstWhere('id', $id);
   if (!$task) {
       abort(404);
   }
    return view('tasks.show', [
         'task' => $task
    ]);
})->name('task.show');

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
