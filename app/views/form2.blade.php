<div>
	{{ Form::open(array('url' => $url)) }}
		{{ Form::label('answer', 'Full Name'); }}
		{{ Form::text('answer'); }}
		{{ Form::submit('Next'); }}
	{{ Form::close() }}
	{{ link_to($restart, 'Restart') }}
</div>