@extends('layouts.app')

@section('title-header', 'Edit Task List')


@section('title', 'Edit Task List')


@section('content')
    @include('tasks.form', ['task' => $task])
@endsection

