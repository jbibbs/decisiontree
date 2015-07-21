<h2>{{ $question }}</h2>
<div>
	{{ Form::open(array('url' => $url)) }}
		{{ Form::label(1, 'Yes'); }}
		{{ Form::radio('answer', 1, true); }}
		{{ Form::label(0, 'No'); }}
		{{ Form::radio('answer', 0); }}
		{{ Form::submit('Next'); }}
	{{ Form::close() }}
	{{ link_to($restart, 'Restart') }}
</div>