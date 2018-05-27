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
                        <br>
                        <a style="color: blue" href="{{ route('admins') }}">Administrators</a>
                        </br>
                        <br>
                        <a style="color: red" href="{{ route('topics') }}">Topics</a>
                        </br>
                        <br>
                        <a style="color: green" href="{{ route('allQuestionsW') }}">All questions without answers</a>
                        </br>
            </div>
        </div>
    </div>
</div>
@endsection
