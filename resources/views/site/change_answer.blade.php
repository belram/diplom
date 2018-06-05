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
	@if(isset($answer))
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form style="margin-top: 20px;" method="POST" action="{{ route('question_answer.store') }}">
			@csrf
			<input type="hidden" name="id" value="{{ $answer->id }}">
			<label>Change answer: <br>
				<textarea id="answer" cols="120" rows="10" name="answer">{{ $answer->answer }}</textarea>
			</label>
			<br>
			<input type="submit" name="save" value="Change answer">
		</form>
	@endif
	<a style="display: block; font-size: 15px; font-weight: bold; color: black; margin-top: 20px;" href="{{ route('category.show', ['topic' => $answer->topic_id]) }}">Back</a>
</div>
@endsection
