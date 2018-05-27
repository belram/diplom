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
	@if(isset($alias))
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<form style="margin-top: 20px" method="POST" action="{{ route('saveNewNameTopic', ['alias' => $alias]) }}">
				@method('PUT')
				@csrf
				<h4>Old Name: {{ ucwords($alias) }}</h4>
				New name topic: <input id="topic"  type="text" name="topic" value="{{ old('topic') }}">
				<br>
				<br>
				<input type="submit" name="save" value="Save">
			</form>
			<a style="display: block; font-size: 15px; font-weight: bold; color: black; margin-top: 20px;" href="{{ route('topics') }}">Back</a>
	@endif
</div>
@endsection
   
