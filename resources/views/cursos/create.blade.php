@extends("master")

@section('title')

	@lang('messages.add_course')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection

@section('content')

	<div class="col-md-10 col-md-offset-1">

		@if (Session::has('course_created'))
			<div class="alert alert-success">{!! Session::get('course_created') !!}</div>
		@endif

		<h1 class="text-muted text-center">@lang('messages.add_course')</h1>

		@include('includes/errors')

		<div class="form-group">

			{!! Form::open(['url' => 'cursos/create', 'class' => 'form']) !!}

				{!! Form::label('course', Lang::choice('messages.courses', 1)) !!}
				{!! Form::text('course', old('course'), ["class" => "form-control"]) !!}<br>

				<br />
				{!! Form::submit(Lang::get('messages.add_course'), ["class" => "btn btn-success btn-block"]) !!}

			{!! Form::close() !!}

		</div>

	</div>

@endsection
