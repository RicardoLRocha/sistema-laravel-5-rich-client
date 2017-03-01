
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

			<!-- ========================================================= 
			SESION user_deleted, 
			cuando el usuario se haya borrado, salga mensaje en la misma vista
	 		========================================================= -->
			@if (Session::has('user_deleted'))
				<div class="alert alert-success"> {!! Session::get('user_deleted') !!} </div>
			@endif



			@if(!$users->isEmpty())

				<table class="table table-bordered table-striped">

					<thead>
					  <tr>
						<th>@lang('messages.name')</th>
						<th>@lang('messages.email')</th>
						<th>@lang('messages.courses')</th>
						<th>@lang('messages.edit')</th>
						<th>@lang('messages.delete')</th>
					  </tr>
				  </thead>

				  <tbody>

					  @foreach ($users as $user)
						  <tr>
								
								<td width="300">{{ $user->name }}</td>
								<td width="300">{{ $user->email }}</td>
								<td width="300">
								
								@if( sizeof($user->cursos) > 0 )
									
									@foreach($user->cursos as $curso)
										{{ $curso->curso }}
									@endforeach
								@else
									
									@lang('messages.without_courses')
								@endif
								
								</td>
								<td width="60" align="center">

									<!-- Es como un < a href > -->
								  {!! Html::link( url('users/edit', $user->id), 
								  	\Lang::get('messages.edit'), 
								  	array('class' => 'btn btn-success btn-xs') ) !!}
								</td>
								<td width="60" align="center">
								  {!! Form::open(array('url' => array('users/destroy', $user->id), 'method' => 'DELETE')) !!}
									  <button type="submit" class="btn btn-danger btn-xs">@lang('messages.delete')</button>
								  {!! Form::close() !!}
								</td>
							  
						  </tr>
					  @endforeach
				  </tbody>
				</table>
				
				<!-- ======================== 				
					Para la paginacion
 				======================== -->				
				<?php echo $users->render(); ?>

			@endif

		</div>
	</div>

@endsection


