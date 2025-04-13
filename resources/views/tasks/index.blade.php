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
                <p><a href="{{ route('task.show', ['id' => $task->id]) }}">View</a></p>
            </li>
        @empty
            <li>No tasks available.</li>
        @endforelse
    </ul>
@endsection

