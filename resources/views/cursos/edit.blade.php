@extends("master")

@section('title')

	@lang('messages.edit_course')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">
		@if (Session::has('course_updated'))
			<div class="alert alert-success">{!! Session::get('course_updated') !!}</div>
		@endif

        <h1 class="text-muted text-center">@lang('messages.edit_course')</h1>

		{{-- Incluimos el template que muestra errores --}}
		@include('includes/errors')

     	<div class="form-group">

    		{!! Form::open(['url' => array('cursos/edit', $curso->id), 'class' => 'form']) !!}

    	        {!! Form::label('curso', Lang::choice('messages.courses', 1)) !!}

    	        {!! Form::text('curso', old('curso') ? old('curso') : $curso->curso, ["class" => "form-control"]) !!}<br>

    	        <br />
    	        {!! Form::submit(Lang::get('messages.edit_course'), ["class" => "btn btn-success btn-block"]) !!}

    	    {!! Form::close() !!}

    	</div>

    </div>

@endsection
