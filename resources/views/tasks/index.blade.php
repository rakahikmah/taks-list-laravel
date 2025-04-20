@extends('layouts.app')

@section('title-header', 'Task List')


@section('title', 'Task List')


@section('content')
    <h2 class="text-2xl font-semibold mb-6">
        <a href="{{ route('task.create') }}" target="_blank" class="text-blue-600 hover:text-blue-800">Create New Task</a>
    </h2>
    
    <ul class="space-y-4">
        @forelse ($tasks as $task)
            <li class="bg-white shadow-lg rounded-lg p-6">
                <div class="space-y-2">
                    <p class="text-lg font-bold text-gray-800">{{ $task->title }}</p>
                    <p class="text-gray-600">{{ $task->description }}</p>
                    <p class="text-gray-500">{{ $task->long_description }}</p>
                    <p class="text-gray-400 text-sm">Created at: {{ $task->created_at }}</p>
                    <p class="text-gray-400 text-sm">Updated at: {{ $task->updated_at }}</p>
                </div>

                <div class="mt-4 space-x-4">
                    <a href="{{ route('task.show', ['task' => $task->id]) }}" class="text-blue-600 hover:text-blue-800">View</a>
                    <a href="{{ route('task.edit', ['task' => $task->id]) }}" class="text-yellow-600 hover:text-yellow-800">Edit</a>
                    <a href="{{ route('task.delete', ['task' => $task->id]) }}" 
                       onclick="event.preventDefault();document.getElementById('delete-form-{{ $task->id }}').submit();" 
                       class="text-red-600 hover:text-red-800">Delete</a>

                    <form id="delete-form-{{ $task->id }}" action="{{ route('task.delete', ['task' => $task->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </li>
        @empty
            <li class="text-center text-gray-500">No tasks available.</li>
        @endforelse
    </ul>

    @if ($tasks->hasPages())
        <div class="flex justify-center mt-6">
            {{ $tasks->links() }}
        </div>
    @endif
@endsection


