@extends("master")

@section('title')

	@lang('messages.update_profile')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">

        @if (Session::has('user_updated'))
            <div class="alert alert-success">{!! Session::get('user_updated') !!}</div>
        @endif

        <h1 class="text-muted text-center">@lang('messages.update_user')</h1>

        @include('includes/errors')

        {!! Form::open(['url' => array('users/edit', $user->id), 'class' => 'form']) !!}

        {!! Form::label('name', Lang::get('messages.name')) !!}

            {!! Form::text('name', $user->name, ["class" => "form-control"]) !!}<br>

            {!! Form::label('usuario', Lang::get('messages.email')) !!}

            {!! Form::text('email', $user->email, ["class" => "form-control"]) !!}<br>

            {!! Form::submit(Lang::get('messages.update_user'), ["class" => "btn btn-success btn-block"]) !!}

        {!! Form::close() !!}

    </div>

@endsection
