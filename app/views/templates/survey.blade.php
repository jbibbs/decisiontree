@extends('templates.default')

@section('content')

	<div class="survey">
		<h4>{{ $question }}</h4>

		{{ $form }}
		
		{{ Form::open(array('url' => $restart, 'method' => 'get')) }}
			{{ Form::submit('Noob') }}
		{{ Form::close() }}
	</div>

@stop
