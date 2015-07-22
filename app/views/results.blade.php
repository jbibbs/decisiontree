@extends('templates.default')

@section('content')
<div id="outcome">
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
    
        <span id="restart">
            {{ link_to($restart, 'Restart', $attributes = array(), $secure = null) }}
        </span>
    </div>
</div>

@stop