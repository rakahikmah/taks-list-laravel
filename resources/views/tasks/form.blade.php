@extends('layouts.app')

@section('title-header',  isset($task) ? 'Edit Task' : 'Create Task List')

@section('title', 'Create Task List')


@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
        <form action="{{ isset($task) ? route('task.update', ['task' => $task->id]) : route('task.store') }}" method="POST">
            @csrf
            @method(isset($task) ? 'PUT' : 'POST')

            <div class="mb-6">
                <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" 
                    value="{{ isset($task) ? $task->title : old('title') }}" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('title')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <input type="text" name="description" id="description" 
                    value="{{ isset($task) ? $task->description : old('description') }}" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('description')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="long_description" class="block text-lg font-medium text-gray-700">Long Description</label>
                <textarea name="long_description" id="long_description" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required rows="10">{{ isset($task) ? $task->long_description : old('long_description') }}</textarea>
                @error('long_description')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="completed" class="block text-lg font-medium text-gray-700">Status</label>
                @php
                    $completed = isset($task) ? $task->completed : old('completed');
                @endphp
                <select name="completed" id="completed" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="0" {{ $completed == 0 ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ $completed == 1 ? 'selected' : '' }}>Completed</option>
                </select>
                @error('completed')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-8">
                <button type="submit" 
                    class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-200">
                    {{ isset($task) ? 'Update Task' : 'Create Task' }}
                </button>
            </div>
        </form>
    </div>
@endsection


