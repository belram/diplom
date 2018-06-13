@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Разделы админки</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a style="color: blue; padding-left: 15px" href="{{ route('administrators.index') }}">Administrators</a>
                        <a style="color: red; padding-left: 40px" href="{{ route('changes.index') }}">Topics</a>
                        <a style="color: green; padding-left: 40px" href="{{ route('withoutAnswer.index') }}">All questions without answers</a>  
            </div>
        </div>
    </div>
</div>
<div>
	@if(isset($question))
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form style="margin-top: 20px;" method="POST" action="{{ route('question_answer.update', ['id' => $question->id ]) }}">
			@method('PUT')
			@csrf
			<label>Change author question:<br>
				<textarea id="author_name" cols="8" rows="2" name="author_question">{{ $question->author_question }}</textarea>
			</label>
			<br>
			<label>Change question:<br>
				<textarea id="question" cols="100" rows="5" name="question">{{ $question->question }}</textarea>
			</label>
			<br>
			<input type="submit" name="save" value="Change question">
		</form>
	@endif
	<a style="display: block; font-size: 15px; font-weight: bold; color: black; margin-top: 20px;" href="{{ route('category.show', ['id' => $question->topic_id]) }}">Back</a>
</div>
@endsection
