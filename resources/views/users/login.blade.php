@extends("master")

@section('title')

	@lang('messages.login')

@endsection

@section('content')

    <div class="col-md-6 col-md-offset-3">

        <h1 class="text-muted text-center">@lang('messages.login')</h1>

        {{-- Incluimos el template que muestra errores --}}
		@include('includes/errors')

        <div class="form-group">

            {!! Form::open(['url' => 'users/login', 'class' => 'form']) !!}

                {!! Form::label('email', Lang::get('messages.email')) !!}

                {!! Form::text('email', old('email'), ["class" => "form-control"]) !!}<br>

                {!! Form::label('password', Lang::get('messages.password')) !!}

    	        {!! Form::password('password', ["class" => "form-control"]) !!}

                <br />
    	        {!! Form::submit(Lang::get('messages.login'), ["class" => "btn btn-success btn-block"]) !!}

            {!! Form::close() !!}

        </div>
    </div>

@endsection
