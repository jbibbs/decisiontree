@extends('templates.default')

@section('content')

	<div>
       <h2>Uh oh!</h2>
       <p>There is a problem with the survey. Please {{ link_to('/', 'restart') }} 
       the survey or contact a staff member who may be able to assist you</p>
	</div>

@stop