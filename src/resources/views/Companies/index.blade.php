@extends('main')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="container mt-2">
    <div class="text-center">
        <h2>Companies</h2>
    </div>
    @auth
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('companies.create') }}"> Create Company</a>
            </div>
        </div>
    </div>
    @endauth
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th width="280px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->address }}</td>
                    <td>
                        @auth
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endauth
                        <a class="btn btn-primary" href="{{ route('projects.index', $company->id) }}">View Projects</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $companies->links() !!}
</div>

@endsection('content')