<h2>{{ $question }}</h2>
<div>
	{{ Form::open(array('url' => $url)) }}
		{{ Form::label('answer', 'Full Name'); }}
		{{ Form::text('answer'); }}
		{{ Form::hidden('q', $q); }}
		{{ Form::submit('Next'); }}
	{{ Form::close() }}
</div>