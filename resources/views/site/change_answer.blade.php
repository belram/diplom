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
                        <a style="color: blue; padding-left: 15px" href="{{ route('allAdminictrators') }}">Administrators</a>
                        
                        <a style="color: red; padding-left: 40px" href="{{ route('topics') }}">Topics</a>
                        
                        <a style="color: green; padding-left: 40px" href="{{ route('withoutAnswer') }}">All questions without answers</a>
                        
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

		<form style="margin-top: 20px;" method="POST" action="{{ route('changeAnswer', ['topic' => $answer['answer_id'] ]) }}">

			@csrf

			Change answer: <textarea id="answer" cols="120" rows="10" name="answer">{{ $answer['answer'] }}</textarea>

			<br>
			<input type="submit" name="save" value="Change answer">
			
		</form>

	@endif

	<a style="display: block; font-size: 15px; font-weight: bold; color: black; margin-top: 20px;" href="{{ route('topicsCategory', ['topic' => $lastTopic]) }}">Back</a>

</div>


@endsection
