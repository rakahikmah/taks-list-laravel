@extends('layouts.app')

@section('title-header', 'CreateTask List')


@section('title', 'Create Task List')


@section('content')
  
    <div>
        <form action="{{ route('task.store') }}" method="post">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" >
                @error('title')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="{{ old('description') }}">
                @error('description')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="long_description">Long Description</label>
                <textarea name="long_description" id="long_description" required>{{ old('long_description') }}</textarea>
                @error('long_description')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Create Task</button>   
        </form>
    </div>
@endsection

