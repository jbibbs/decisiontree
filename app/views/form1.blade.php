<h2>{{ $question }}</h2>
<div>
	{{ Form::open(array('url' => $url)) }}
		{{ Form::label('yes', 'Yes'); }}
		{{ Form::radio('answer', 'yes', true); }}
		{{ Form::label('no', 'No'); }}
		{{ Form::radio('answer', 'no'); }}
		{{ Form::hidden('q', $q); }}
		{{ Form::submit('Next'); }}
	{{ Form::close() }}
</div>