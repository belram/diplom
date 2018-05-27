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
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<h3>New password for: {{ $data['login'] }}</h3>
		<form style="margin-top: 20px;" method="POST" action="{{ route('saveNewPassword', ['id' => $data['id']]) }}">
			@method('PUT')
			@csrf
			<label>New Password:<br>
				<input type="text" name="password">
			</label>
			<br>
			<input type="submit" name="save" value="Change password">
		</form>
	@endif
	<a style="display: block; font-size: 15px; font-weight: bold; color: black; margin-top: 20px;" href="{{ route('admins') }}">Back</a>
</div>
@endsection
