@extends("master")

@section('title')

	@lang('messages.update_profile')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">

        @if (Session::has('success_profile'))
            <div class="alert alert-success">{!! Session::get('success_profile') !!}</div>
        @endif

        <h1 class="text-muted text-center">@lang('messages.update_profile')</h1>

        {{-- Incluimos el template que muestra errores --}}
        @include('includes/errors')

         <div class="form-group">

             {!! Form::open(['url' => 'users/profile', 'class' => 'form']) !!}

                 {!! Form::label('name', Lang::get('messages.name')) !!}

                 {!! Form::text('name', Auth::user()->name, ["class" => "form-control"]) !!}<br>

                 {!! Form::label('email', Lang::get('messages.email')) !!}

    	         {!! Form::text('email', Auth::user()->email, ["class" => "form-control"]) !!}<br>

                 {!! Form::submit(Lang::get('messages.update_profile'), ["class" => "btn btn-success btn-block"]) !!}

             {!! Form::close() !!}

         </div>

     </div>

@endsection
