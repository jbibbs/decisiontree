<div id="form1">
{{ Form::open(array('url' => $url)) }}
	{{ Form::label(1, 'Yes'); }}
	{{ Form::radio('answer', 1, true); }}
<span id="radioNo">
	{{ Form::label(0, 'No'); }}
	{{ Form::radio('answer', 0); }}
</span>
	{{ Form::submit('Next'); }}
{{ Form::close() }}
</div>
