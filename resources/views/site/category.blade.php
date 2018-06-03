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
                        <a style="color: blue; padding-left: 15px" href="{{ route('admins') }}">Administrators</a>
                        <a style="color: red; padding-left: 40px" href="{{ route('topics') }}">Topics</a>
                        <a style="color: green; padding-left: 40px" href="{{ route('allQuestionsW') }}">All questions without answers</a>
                        
            </div>
        </div>
    </div>
</div>
<div>
	@if(isset($data))
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
	        @foreach($data as $item)
	        	<tr>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $item['id'] }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
	        			<a href="{{ route('formChangeTopic', ['id' => $item['id'] ]) }}">{{ $item['topic'] }}</a>
	        		</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
	        			<a href="{{ route('formChangeQuestion', ['id' => $item['id'] ]) }}">{{ $item['question'] }}</a>
	        		</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
	        			<a href="{{ route('formChangeAnswer', ['id' => $item['id'] ]) }}">{{ $item['answer'] }}</a>
	        		</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $item['answer_created_at'] }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $item['status'] }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
	        			<form method="POST" action="{{ route('deleteQuestion', ['id' => $item['id'] ]) }}">
	        				@method('DELETE')
							@csrf
							<input type="hidden" name="topic" value="{{ $item['topic_id'] }}">
							<input type="submit" name="action" value="Delete">
						</form>
	        		</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
	        			@if( $item['change_status'] == 'Hide' || $item['change_status'] == 'Public' )
		        			<form method="POST" action="{{ route('changeStatus', ['id' => $item['id'] ]) }}">
		        				@method('PUT')
								@csrf
								<input type="hidden" name="topic" value="{{ $item['topic_id'] }}">
								<input type="submit" name="action" value="{{ $item['change_status'] }}">
							</form>
						@elseif( $item['change_status'] == 'Answer' )
							<a style="color: green;" href="{{ route('formAnswer', ['id' => $item['id'] ]) }}">{{ $item['change_status'] }}</a>
						@endif
	        		</td>
	        	</tr>
	        @endforeach
		</table>
	@endif
	<a style="display: block; font-size: 15px; font-weight: bold; color: black; margin-top: 20px;" href="{{ route('topics') }}">Back</a>
</div>
@endsection
   
