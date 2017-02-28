
@extends("master")

@section('title')

	@lang('messages.dashboard')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection


@section('content')
	
	<!-- ===================================================== 
		En controller creamos en function postRegister
		\Session::flash('success_register', \Lang::get("messages.success_register"));
 	===================================================== -->
    @if (Session::has('success_register'))
    	
    	<p> Valor de Session::get('success_register')  </p>

        <div class="alert alert-success">
        	{!! Session::get('success_register') !!}
        </div>
    @endif

@endsection
