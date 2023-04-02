@extends('main')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="container mt-2">
    <div class="text-center">
        <h2>Projects</h2>
    </div>
    @auth
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('projects.create', $id) }}"> Create Project</a>
            </div>
        </div>
    </div>
    @endauth
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th width="280px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->type }}</td>
                    <td>
                        @auth
                        <form action="{{ route('projects.destroy', [$project->id, $id]) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('projects.edit', [$project->id, $id]) }}">Edit</a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endauth
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>

@endsection('content')