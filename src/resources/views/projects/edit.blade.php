@extends('main')

@section('content')

@if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
@endif

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Edit Project</h2>
            </div>
        </div>
    </div>

    <form action="{{ route('projects.update', [$project->id, $id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Name:</strong>
                    <input type="text" name="name" value="{{ $project->name }}" class="form-control"
                        placeholder="Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Type:</strong>
                    <input type="text" name="type" class="form-control" placeholder="Type"
                        value="{{ $project->type }}">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <a class="btn btn-primary" href="{{ route('projects.index', $id) }}" enctype="multipart/form-data">Back</a>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>

@endsection('content')