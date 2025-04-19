@extends('layouts.app')

@section('title-header', 'Task List')


@section('title', 'Task List')


@section('content')
    <ul>
        @forelse ($tasks as $task)
            <li>
                <p>{{ $task->title }}</p>
                <p>{{ $task->description }}</p>
                <p>{{ $task->long_description }}</p>
                <p>{{ $task->created_at }}</p>
                <p>{{ $task->updated_at }}</p>
                <p>
                    <a href="{{ route('task.show', ['task' => $task->id]) }}">View</a>
                    <a href="{{ route('task.edit', ['task' => $task->id]) }}">Edit</a>
                    <a href="{{ route('task.delete', ['task' => $task->id]) }}" onclick="event.preventDefault();document.getElementById('delete-form-{{ $task->id }}').submit();">Delete</a>
                    <form id="delete-form-{{ $task->id }}" action="{{ route('task.delete', ['task' => $task->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </p>
            </li>
        @empty
            <li>No tasks available.</li>
        @endforelse
    </ul>


@if ($tasks->hasPages())
    <div style="display: flex; justify-content: center; margin-top: 20px;">
        {{ $tasks->links() }}
    </div>
@endif


@endsection

