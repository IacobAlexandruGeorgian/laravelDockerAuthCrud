@extends('main')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-primary">
{{ $message }}
</div>

@endif

<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Login</div>
			<div class="card-body">
				<form action="{{ route('valid') }}" method="post">
					@csrf
					<div class="form-group mb-3">
						<input type="text" name="email" class="form-control" placeholder="Email" />
					</div>
					<div class="form-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password" />
					</div>
					<div class="d-grid mx-auto">
						<button type="subit" class="btn btn-primary btn-block">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection('content')