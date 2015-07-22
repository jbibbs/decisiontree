@extends('templates.default')

@section('content')

	<div class="survey">
		<h5>{{ $question }}</h5>

		{{ $form }}
		
	<!--	{{ Form::open(array('url' => $restart, 'method' => 'get')) }}
        	{{ Form::submit('Restart') }}
    	{{ Form::close() }} -->
	<span id="restart">
    	{{ link_to($restart, 'Restart', $attributes = array(), $secure = null) }}
    </span>

	</div>

@stop

