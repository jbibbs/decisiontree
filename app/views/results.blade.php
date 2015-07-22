@extends('templates.default')

@section('content')

    <div class="results">
    	<h2>{{ $heading }}</h2>
    	<p>{{ $outcome }}</p>

         <h3>Your responses:</h3>
        @foreach($responses as $key => $value)
    	   @if($key === 'name')
    		<p><strong>Name:</strong> {{{ $value }}}</p>
    	   @else
    		<p><strong>{{{ $key }}}</strong></p>
    		<p>{{{ $value }}}</p>
    	   @endif
         @endforeach
    </div>
    {{ link_to($restart, 'Restart') }}

@stop