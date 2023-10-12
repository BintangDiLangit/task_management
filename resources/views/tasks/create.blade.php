@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Task</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="task_name">Task Name:</label>
                <input type="text" class="form-control" id="task_name" name="task_name" required>
            </div>
            <div class="form-group">
                <label for="priority">Priority:</label>
                <input type="number" class="form-control" id="priority" name="priority" required>
            </div>
            <div class="form-group">
                <label for="project">Select Project:</label>
                <select name="project_id" id="project" class="form-control">
                    <option value="">-- Select Project --</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
@endsection
