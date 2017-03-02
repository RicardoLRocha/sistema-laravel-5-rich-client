@extends("master")

@section('title')

	@lang('messages.login')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection


@section('content')

	<div class="row">
		<div class="col-md-12">

		@if (Session::has('course_deleted'))
			<div class="alert alert-success">{!! Session::get('course_deleted') !!}</div>
		@endif

		@if (Session::has('course_related'))
			<div class="alert alert-success">{!! Session::get('course_related') !!}</div>
		@endif


		@if( sizeof($cursos > 0 ))
			<table class="table table-bordered table-striped">

				<thead>
				  <tr>
					<th>@choice('messages.courses', 10)</th>
					<th>@lang('messages.subscribe')</th>
				  </tr>
			  </thead>
			  <tbody>	

					
					<!-- ============================================= 					
						Al seleccionar se quita el curso de la vista
 					============================================= -->
				  @foreach ($cursos as $curso)
					  <tr>
						<td width="300">{{ $curso->course }}</td>
						<td width="300">
							{!! Html::link(url("cursos/subscribe", $curso->id), 
								\Lang::get('messages.subscribe'), array('class' => 'btn btn-info btn-xs')) !!}
						</td>
					  </tr>
				  @endforeach
			  </tbody>

			</table>
		@else
		 <div class="alert alert-info">@lang('messages.withoutcourses')</div>
		@endif

	</div>
@endsection
