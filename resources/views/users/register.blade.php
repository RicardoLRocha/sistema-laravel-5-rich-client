
@extends("master")


@section('title')

	@lang('messages.register')

@endsection


@section('content')

	<div class="col-md-6 col-md-offset-3">

		<h1 class="text-muted text-center">@lang('messages.register')</h1>

		{{-- Incluimos el template que muestra errores --}}
		@include('includes/errors')

		<div class="form-group">

			{!! Form::open(['url' => 'users/register', 'class' => 'form']) !!}

				{!! Form::label('name', Lang::get('messages.name')) !!}
				{!! Form::text('name', old('name'), ["class" => "form-control"]) !!}<br>

				{!! Form::label('email', Lang::get('messages.email')) !!}
				{!! Form::text('email', old('email'), ["class" => "form-control"]) !!}<br>

				{!! Form::label('password', Lang::get('messages.password')) !!}
				{!! Form::password('password', ["class" => "form-control"]) !!}<br>

				{!! Form::label('password_confirmation', Lang::get('messages.passwordconf')) !!}
				{!! Form::password('password_confirmation', ["class" => "form-control"]) !!}

				<br />
				{!! Form::submit(Lang::get('messages.register'), ["class" => "btn btn-success btn-block"]) !!}

			{!! Form::close() !!}

		</div>

	</div>

@endsection
