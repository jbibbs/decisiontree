<h2>{{ $question }}</h2>
<div>
	{{ Form::open(array('url' => $url)) }}
		{{ Form::label('yes', 'Yes'); }}
		{{ Form::radio('answer', 'yes', array('id' => 'yes')); }}
		{{ Form::label('no', 'No'); }}
		{{ Form::radio('answer', 'no', array('id' => 'no')); }}
		{{ Form::hidden('q', $q); }}
		{{ Form::submit('Next'); }}
	{{ Form::close() }}
</div>