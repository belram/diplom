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
	@if(isset($questions))
		<table style="border: 1px solid black; border-collapse: collapse; margin-top: 15px">
			<tr style="border: 1px solid black; border-collapse: collapse; padding: 5px">
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">ID</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Topic Name</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Question</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Answer</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Answer Created</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Status</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Delete</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Change status</td>
			</tr>
	        @foreach($questions as $key => $item)
	        	<tr>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $item->id }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
	        			<a href="{{ route('category.edit', ['id' => $item->id ]) }}">{{ $topic }}</a>
	        		</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
	        			<a href="{{ route('question_answer.edit', ['id' => $item->id ]) }}">{{ $item->question }}</a>
	        		</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
	        			<a href="{{ route('question_answer.show', ['id' => $item->id ]) }}">{{ $item->answer }}</a>
	        		</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $item->answer_created_at }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $statuses[$key] }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
	        			<form method="POST" action="{{ route('category.destroy', ['id' => $item->id ]) }}">
	        				@method('DELETE')
							@csrf
							<input type="hidden" name="topic" value="{{ $item->topic_id }}">
							<input type="submit" name="action" value="Delete">
						</form>
	        		</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
	        			@if( $statuses[$key] == 'Published' || $statuses[$key] == 'Hidden' )
		        			<form method="POST" action="{{ route('category.update', ['id' => $item->id ]) }}">
		        				@method('PUT')
								@csrf
								<input type="hidden" name="topic" value="{{ $item->topic_id }}">
								<input type="submit" name="action" value="{{ ($statuses[$key] == 'Published') ? 'Hide' : 'Public' }}">
							</form>
						@elseif( $statuses[$key] == 'No answer' )
							<a style="color: green;" href="{{ route('answer.edit', ['id' => $item->id ]) }}">Answer</a>
						@endif
	        		</td>
	        	</tr>
	        @endforeach
		</table>
	@endif
	<a style="display: block; font-size: 15px; font-weight: bold; color: black; margin-top: 20px;" href="{{ route('changes.index') }}">Back</a>
</div>
@endsection
   