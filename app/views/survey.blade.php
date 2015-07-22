@extends('templates.default')

@section('content')

	<div class="survey">
		<h4>{{ $question }}</h4>

		{{ $form }}
		
		<button>{{ link_to($restart, 'Restart') }}</button>
	</div>

@stop
