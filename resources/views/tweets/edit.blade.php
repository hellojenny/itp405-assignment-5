<!DOCTYPE html>
<html>
	<head>
		<title>Tweets</title>
		<link href="https://fonts.googleapis.com/css?family=Mallanna" rel="stylesheet">
		<style>
		body {
			font-family: 'Mallanna';
		}

		.container {
			width: 700px;
			padding: 20px;
			margin: auto;
		}

		textarea, button {
			width: 100%;
			min-height: 100px;
			padding: 10px;
			font: normal 1.2em/1em 'Mallanna', sans-serif;
		}

		button {
			width: 103%;
		}

		.failure {
			padding: 18px;
			margin-bottom: 20px;
			width: 98%;
			background: #ff8686;
			color: #000;
		}

		.tweet {
			display: block;
			position: relative;
			width: 98%;
			padding: 16px;
			border: 1px solid #ddd;
			background: #fdfdfd;
			margin: 20px 0;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<h1>Jenny's Twitter Clone</h1>

			@if (count($errors) > 0) 
				<div class="failure" role="alert">
					@foreach ($errors->all() as $error)
						{{$error}}
					@endforeach
				</div>
			@endif

			<form action="/tweets/{{$tweet->id}}/edit" method="post" style="margin-bottom: 80px">
				{{csrf_field()}}
				<textarea name="tweet" id="tweet">@if (count($errors) > 0){{old('tweet')}}@else{{$tweet->tweet}}@endif</textarea>
				<button type="submit">Save!</button>
			</form>
		</div>
	</body>
</html>
