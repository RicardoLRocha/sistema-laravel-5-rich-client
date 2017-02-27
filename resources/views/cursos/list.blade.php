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

        <table class="table table-bordered table-striped">
        @if(!$cursos->isEmpty())

            <table class="table table-bordered table-striped">

                <thead>
	              <tr>
                    <th>@choice('messages.courses', 10)</th>
                    <th>@lang('messages.number_users')</th>
	                <th>@lang('messages.edit')</th>
	                <th>@lang('messages.delete')</th>
	              </tr>
			    </thead>

                <tbody>
	                 @foreach ($cursos as $curso)
                     <tr>
                         <td width="300">{{ $curso->curso }}</td>
                         <td width="300">
                            @if( sizeof($curso->users) > 0 )
                                {{ count($curso->users) }}
                            @else
                                @lang('messages.withoutusers')
                            @endif
                         </td>
                         <td width="60" align="center">
    	                      {!! Html::link(url('cursos/edit', $curso->id), \Lang::get('messages.edit'), array('class' => 'btn btn-success btn-xs')) !!}
    	                 </td>
                         <td width="60" align="center">
    	                      {!! Form::open(array('url' => array('cursos/destroy', $curso->id), 'method' => 'DELETE')) !!}
    	                          <button type="submit" class="btn btn-danger btn-xs">@lang('messages.delete')</button>
    	                      {!! Form::close() !!}
    	                 </td>
                     </tr>
                     @endforeach
                </tbody>
            </table>
			<?php echo $cursos->render(); ?>

        @else
 		   <div class="alert alert-info">@lang('messages.withoutcourses')</div>
        @endif

@endsection
