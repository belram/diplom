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
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">N</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Topic</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Change TopicName</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Without Answer</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Published</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Hidden</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Total</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Delete Topic with all questions</td>
			</tr>
	        @foreach($data as $topic=>$item)
	        	<tr>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $item['i'] }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;"><a href="{{ route('category', ['id' => $item['id']]) }}">{{ $topic }}</a></td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;"><a href="{{ route('formChangeNameTopic', ['id' => $item['id'] ]) }}">Change</a></td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $item['wait'] }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $item['published'] }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $item['hidden'] }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $item['total'] }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
						<form method="POST" action="{{ route('deleteTopic', ['id' => $item['id'] ]) }}">
							@method('DELETE')
							@csrf
							<input type="submit" name="delete" value="Delete">
						</form>
	        		</td>
	        	</tr>
	        @endforeach
		</table>
	@endif
	<a style="display: block; font-size: 15px; font-weight: bold; color: purple; margin-top: 20px;" href="{{ route('formTopicAdd') }}">New topic</a>
	<a style="display: block; font-size: 15px; font-weight: bold; color: black; margin-top: 20px;" href="{{ route('admin_index') }}">Back</a>
</div>
@endsection
   
