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

		.success, .failure {
			padding: 18px;
			margin-bottom: 20px;
			width: 98%;
			background: #cdf8ca;
			color: #000;
		}

		.failure { background: #ff8686; }

		.tweet {
			display: block;
			position: relative;
			width: 98%;
			padding: 16px;
			border: 1px solid #ddd;
			background: #fdfdfd;
			margin: 20px 0;
		}
			.x, .view{
				position: absolute;
				top: 5px; right: 15px;
				text-decoration: none;
				font-size: 1em;
				color: #aaa;
			}
			.view { top: 25px; }
		</style>
	</head>
	<body>
		<div class="container">
			<h1>Jenny's Twitter Clone</h1>

			@if (session('successStatus'))
				<div class="success" role="alert">
					{{session('successStatus')}}
				</div>
			@endif

			@if (count($errors) > 0) 
				<div class="failure" role="alert">
					@foreach ($errors->all() as $error)
						{{$error}}
					@endforeach
				</div>
			@endif

			<form action="/" method="post" style="margin-bottom: 80px">
				{{csrf_field()}}
				<textarea name="tweet" id="tweet">{{old('tweet')}}</textarea>
				<button type="submit">Tweet!</button>
			</form>
			
			@foreach ($tweets as $tweet)
			<div class="tweet">
				<a href="/tweets/{{$tweet->id}}/delete" class="x">X</a>
				<a href="/tweets/{{$tweet->id}}" class="view">View</a>
				{{$tweet->tweet}}
			</div>
			@endforeach
		</div>
	</body>
</html>
