@extends('layouts.app')

@section('title-header',  isset($task) ? 'Edit Task' : 'Create Task List')

@section('title', 'Create Task List')


@section('content')
    <div>
        <form action="{{ isset($task) ? route('task.update', ['task' => $task->id]) : route('task.store') }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ isset($task) ? $task->title : old('title') }}" >
                @error('title')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="{{ isset($task) ? $task->description : old('description') }}" >
                @error('description')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="long_description">Long Description</label>
                <textarea name="long_description" id="long_description" required>{{ isset($task) ? $task->long_description : old('long_description') }}</textarea>
                @error('long_description')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="status">Status</label>
                @php
                    
                    $completed = isset($task) ? $task->completed : old('completed');
               
                @endphp

                <select name="completed" id="completed">
                    <option value="0" {{ $completed == 0 ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ $completed == 1 ? 'selected' : '' }}>Completed</option>
                </select>
                @error('completed')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">
                {{ isset($task) ? 'Update Task' : 'Create Task' }}
            </button>
        </form>
    </div>
@endsection

