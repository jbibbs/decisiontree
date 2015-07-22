@extends('templates.default')

@section('content')

	<div class="survey">
		<h4>{{ $question }}</h4>

		{{ $form }}

	</div>

@stop
