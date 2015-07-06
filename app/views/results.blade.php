<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Decision Making Tree</title>
</head>
<body>
	<div class="results">
		<h2>{{ $heading }}</h2>
		<p>{{ $outcome }}</p>
        <h3>Your responses:</h3>
        @foreach($responses as $response)
            <p>{{ gettype($response) }}</p>
        @endforeach
	</div>
</body>
</html>