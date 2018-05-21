<!DOCTYPE html>
<html lang="en">
<head>
	<title>Добавление материала</title>
	<meta charset="UTF-8">
</head>
<body>

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form method="POST" action="{{ route('add_question') }}">

		@csrf

		Name: <input id="name"  type="text" name="name" value="{{ old('name') }}">
		<br>
		Email: <input id="email" type="email" name="email" value="{{ old('email') }}">
		<br>
		<label>Topic:<br>
			@foreach($topics as $topic)
				<input id="topic" type="radio" name="topic" value="{{ $topic }}">{{ $topic }}<br>
			@endforeach
		</label>
		<br>
		Your question: <textarea id="question" cols="30" rows="5" name="question">{{ old('question') }}</textarea>
		<br>
		<br>
		<input type="submit" name="save">
		<br>
		<br>
		<a style="font-size: 20px; font-weight: bold; color: blue" href="{{ route('home') }}">Back</a>
		

	</form>

</body>
</html>
