@extends('layouts.site')
@section('nav')
@endsection

@section('content')
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<form method="POST" action="{{ route('store') }}">
		@csrf
		<label style="font-weight: bold">Name:<br>
			<input style="margin: 10px;" id="name" type="text" name="name" value="{{ old('name') }}">
		</label>
		<br>
		<label style="font-weight: bold">Email:<br>
			<input style="margin: 10px;" id="email" type="email" name="email" value="{{ old('email') }}">
		</label>
		<br>
		<label style="font-weight: bold">Topic:<br>
			@foreach($topics as $topic)
				<input id="topic" type="radio" name="topic" value="{{ $topic }}">{{ $topic }}<br>
			@endforeach
		</label>
		<br>
		<label style="font-weight: bold">Your question: <br>
			<textarea id="question" cols="50" rows="5" name="question">{{ old('question') }}</textarea>
		</label>
		<br>
		<input style="margin: 10px;" type="submit" name="save" value="Добавить вопрос">
		<br>
		<br>
		<a style="font-size: 20px; font-weight: bold; color: blue" href="{{ route('index') }}">Back</a>
	</form>
@endsection
