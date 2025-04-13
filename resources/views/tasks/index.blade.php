<h1>Task List</h1>



<div>
    @if (count($tasks) > 0)
        @foreach ($tasks as $task )
            <p>{{ $task->title }}</p>
            <p>{{ $task->description }}</p>
            <p>{{ $task->long_description }}</p>
            <p>{{ $task->created_at }}</p>
            <p>{{ $task->updated_at }}</p>
            <p> <a href="{{ route('task.show', ['id' => $task->id]) }}">View</a> </p>
            <br>
        @endforeach
    @else
        <p>No tasks available.</p>
    @endif
</div>


