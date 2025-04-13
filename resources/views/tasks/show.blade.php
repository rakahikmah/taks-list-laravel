@extends('layouts.app')

@section('title-header', 'Task List '.$task->title)

@section('title', $task->title)


@section('content')
    <p>{{ $task->title }}</p>
    <p>{{ $task->description }}</p>
    <p>{{ $task->long_description }}</p>
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>
@endsection
