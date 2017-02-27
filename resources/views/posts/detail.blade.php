@extends("master")

@section('title')

	@lang('messages.login')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection

@section('content')

    <div class="row">

        @if (Session::has('comment_saved'))
            <div class="alert alert-success">{!! Session::get('comment_saved') !!}</div>
        @endif

        <div class="col-md-12">

            <h2 class="text-muted">{{ $post->title }}</h2><hr>
            <p>{{ $post->content }}</p>

            <hr><br>
            @if($comments)
                <ul>
                @foreach($comments as $comment)
                    <li>
                        <h3>@lang('messages.subject'): {{ $comment->subject }}</h3>
                        <h5>@lang('messages.author'): {{ $comment->user->name }}</h5>
                        <h6>@lang('messages.comment'): {{ $comment->comment }}</h6>
                    </li>
                @endforeach
                </ul>
            @endif
        </div>
        <hr><br>

        <div class="form-group col-md-8">

            @include('includes/errors')
            <h2>@lang('messages.add_comment')</h2><hr>

            {!! Form::open(['url' => array('posts/comment', $post->id), 'class' => 'form']) !!}

                {!! Form::label('subject', Lang::get('messages.subject')) !!}

                {!! Form::text('subject', old('subject'), ["class" => "form-control"]) !!}<br>

                {!! Form::label('comment', Lang::get('messages.comment')) !!}

                {!! Form::textarea('comment', old('comment'), ["class" => "form-control"]) !!}

                <br />
    	        {!! Form::submit(Lang::get('messages.add_comment'), ["class" => "btn btn-success btn-block"]) !!}

            {!! Form::close() !!}

        </div>
    </div>

@endsection
