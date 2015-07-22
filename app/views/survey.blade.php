@extends('templates.default')

@section('content')

	<div class="survey">
		<h5>{{ $question }}</h5>

		{{ $form }}
		
		{{ Form::open(array('url' => $restart, 'method' => 'get')) }}
        	{{ Form::submit('Restart') }}
    	{{ Form::close() }}

	</div>

@stop

