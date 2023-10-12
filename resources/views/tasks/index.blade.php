@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Task Management</h1>
        <form action="{{ route('tasks.index') }}" method="GET" class="mb-3">
            <div class="form-group">
                <label for="project">Select Project:</label>
                <select name="project_id" id="project" class="form-control">
                    <option value="">All Projects</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->project_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('tasks.create') }}" class="btn btn-success">Add Task</a>
            </div>
        </form>

        <ul class="list-group" id="sortable">
            @foreach ($tasks as $task)
                <li class="list-group-item" data-task-id="{{ $task->id }}" data-order="{{ $task->priority }}">
                    <span class="priority badge badge-secondary mr-2">{{ $task->priority }}</span>
                    {{ $task->task_name }}
                    <div class="float-right">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $(function() {
            $("#sortable").sortable({
                update: function(event, ui) {
                    $('#sortable li').each(function(index) {
                        $(this).find('.priority').text(index + 1);
                        $(this).attr('data-order', index + 1);
                    });

                    var taskOrder = $('#sortable li').map(function() {
                        return $(this).data('task-id');
                    }).get();

                    $.ajax({
                        url: "{{ route('tasks.updatePriorities') }}",
                        type: "POST",
                        data: {
                            taskOrder: taskOrder,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            console.log('Priorities updated successfully');
                        }
                    });
                }
            });
            $("#sortable").disableSelection();
        });
    </script>
@endsection
