@extends('templates.default')

@section('content')

    <div class="results">
    	<h4>{{ $heading }}</h4>
    	<p id="outcome"><strong>{{ $outcome }}</strong></p>
    </div>
    <div class="responses">
         <h4>Your responses:</h4>
        @foreach($responses as $key => $value)
    	   @if($key === 'name')
    		<p><strong>Name:</strong> {{{ $value }}}</p>
    	   @else
    		<p><strong>{{{ $key }}}</strong></p>
    		<p>{{{ $value }}}</p>
    	   @endif
         @endforeach
    </div>
    {{ Form::open(array('url' => $restart, 'method' => 'get')) }}
        {{ Form::submit('Restart') }}
    {{ Form::close() }}

@stop