@extends('layouts.app')

@section('title-header', 'Task List '.$task->title)

@section('title', $task->title)


@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
        <div class="space-y-4">
           
            <p class="text-gray-700">{{ $task->description }}</p>
            <p class="text-gray-600">{{ $task->long_description }}</p>
            <p class="text-gray-500 text-sm">Created at: {{ $task->created_at }}</p>
            <p class="text-gray-500 text-sm">Updated at: {{ $task->updated_at }}</p>
            <p class="text-xl font-semibold {{ $task->completed ? 'text-green-600' : 'text-yellow-600' }}">
                {{ $task->completed ? 'Completed' : 'Pending' }}
            </p>
        </div>

        <div class="mt-6 flex justify-center">
            <form method="POST" action="{{ route('task.toggle-complete', ['task' => $task->id]) }}">
                @csrf
                @method('PUT')
                <button 
                    type="submit" 
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                    Mark As {{ !$task->completed ? 'Completed' : 'Not Completed' }}
                </button>
            </form>
        </div>
    </div>
@endsection

