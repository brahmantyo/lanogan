@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home of {{ strtoupper($credential->name) }}</div>

				<div class="panel-body">
					Anda berhasil masuk ke ONLINE Back Office
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
