@extends("master")

@section('title')

	@lang('messages.edit_post')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection

@section('content')

	<div class="col-md-10 col-md-offset-1">
		@if (Session::has('post_updated'))
			<div class="alert alert-success">{!! Session::get('post_updated') !!}</div>
		@endif

		<h1 class="text-muted text-center">@lang('messages.edit_post')</h1>

		{{-- Incluimos el template que muestra errores --}}
		@include('includes/errors')

		<div class="form-group">

			{!! Form::open(['url' => array('posts/edit', $post->id), 'class' => 'form']) !!}

				{!! Form::hidden('user_id', $post->user_id) !!}

				{!! Form::label('title', Lang::get('messages.title')) !!}
				{!! Form::text('title', old('title') ? old('title') : $post->title, ["class" => "form-control"]) !!}<br>

				{!! Form::label('foto', Lang::get('messages.photo')) !!}
				{!! Form::text('foto', old('foto') ? old('foto') : $post->foto, ["class" => "form-control"]) !!}

				{!! Form::label('content', Lang::get('messages.content')) !!}
				{!! Form::textarea('content', old('content') ? old('content') : $post->content, ["class" => "form-control"]) !!}

				<br />
				{!! Form::submit(Lang::get('messages.edit_post'), ["class" => "btn btn-success btn-block"]) !!}

			{!! Form::close() !!}

		</div>

	</div>

@endsection
