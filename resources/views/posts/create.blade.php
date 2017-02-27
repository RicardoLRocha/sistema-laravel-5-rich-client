@extends("master")

@section('title')

	@lang('messages.add_post')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">

        @if (Session::has('post_created'))
            <div class="alert alert-success">{!! Session::get('post_created') !!}</div>
        @endif

        <h1 class="text-muted text-center">@lang('messages.add_post')</h1>

        @include('includes/errors')

        <div class="form-group">

            {!! Form::open(['url' => 'posts/create', 'class' => 'form']) !!}

                {!! Form::label('title', Lang::get('messages.title')) !!}

                {!! Form::text('title', old('title'), ["class" => "form-control"]) !!}<br>

                {!! Form::label('content', Lang::get('messages.content')) !!}

    	        {!! Form::textarea('content', old('content'), ["class" => "form-control"]) !!}

                <br />
    	        {!! Form::submit(Lang::get('messages.add_post'), ["class" => "btn btn-success btn-block"]) !!}

            {!! Form::close() !!}

        </div>
    </div>
@endsection
