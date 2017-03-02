@extends("master")

@section('title')

	@lang('messages.posts')

@endsection

@section('sidebar')

	@include('includes/sidebar')

@endsection

@section('content')

	<div class="row">

		@if (Session::has('post_deleted'))
			<div class="alert alert-success">{!! Session::get('post_deleted') !!}</div>
		@endif
		
		@if (Session::has('not_autorizate_updated'))
			<div class="alert alert-success">{!! Session::get('not_autorizate_updated') !!}</div>
		@endif
		
		@if (Session::has('not_autorizate_delete'))
			<div class="alert alert-success">{!! Session::get('not_autorizate_delete') !!}</div>
		@endif

		<div class="col-md-12">

			@if(!$posts->isEmpty())
				<table class="table table-bordered table-striped">
					<thead>
						 <tr>
							<th>@lang('messages.title')</th>
							<th>@lang('messages.author')</th>
							<th>@lang('messages.detail')</th>
							<th>@lang('messages.edit')</th>
							<th>@lang('messages.delete')</th>
						  </tr>
					 </thead>
					 <tbody>
						  @foreach ($posts as $post)
							<tr>
								<td width="500">{{ $post->title }}</td>
								<td width="500">{{ $post->user->name }}</td>
								<td width="60" align="center">
								  {!! Html::link(url('posts/detail', $post->id), \Lang::get('messages.detail'),
								  	array('class' => 'btn btn-success btn-xs')) !!}
								</td>
								<td width="60" align="center">	
								@can('update', $post)
									{!! Html::link(url('posts/edit', $post->id), 
										\Lang::get('messages.edit'), array('class' => 'btn btn-success btn-xs')) !!}
								@endcan
								</td>
								<td width="60" align="center">
								@can('eliminar', $post)
									{!! Form::open(array('url' => array('posts/destroy', $post->id), 
										'method' => 'DELETE')) !!}
									  <button type="submit" class="btn btn-danger btn-xs">Delete</button>
								  {!! Form::close() !!}
								@endcan
								</td>

							</tr>
						  @endforeach
					 </tbody>
				</table>

				<!-- ======================== 				
					Para la paginacion
 				======================== -->		
				<?php echo $posts->render(); ?>
				
			@else
				<div class="alert alert-info">@lang('messages.withoutposts')</div>
			@endif

		</div>

	</div>

@endsection
