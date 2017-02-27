@extends("master")

@section('title')

	@lang('messages.dashboard')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection

@section('content')

    @if (Session::has('success_register'))
        <div class="alert alert-success">{!! Session::get('success_register') !!}</div>
    @endif

@endsection
