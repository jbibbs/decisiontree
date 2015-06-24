<h2>{{ $question }}</h2>
<div>
	{{ Form::open(array('url' => $url)) }}
		{{ Form::label('name', 'Full Name'); }}
		{{ Form::text('name'); }}
		{{ Form::hidden('q', $q); }}
		{{ Form::submit('Next'); }}
	{{ Form::close() }}
</div>