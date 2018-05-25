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
                        <a style="color: blue; padding-left: 15px" href="{{ route('allAdministrators') }}">Administrators</a>
                        
                        <a style="color: red; padding-left: 40px" href="{{ route('topics') }}">Topics</a>
                        
                        <a style="color: green; padding-left: 40px" href="{{ route('withoutAnswer') }}">All questions without answers</a>
                        
            </div>
        </div>
    </div>
</div>

<div>
	@if(isset($data))

		<table style="border: 1px solid black; border-collapse: collapse; margin-top: 15px">

			<tr style="border: 1px solid black; border-collapse: collapse; padding: 5px">
				<!-- <td style="border: 1px solid black; border-collapse: collapse; padding: 5px">N</td> -->
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Name</td>
				<td style="border: 1px solid black; border-collapse: collapse; padding: 5px">Email</td>
			</tr>

	        @foreach($data as $admin)

	        	<tr>
	        		<!-- <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td> -->
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $admin['name'] }}</td>
	        		<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">{{ $admin['email'] }}</td>
	        	</tr>
	            
	        @endforeach

		</table>

	@endif

	<a style="display: block; font-size: 15px; font-weight: bold; color: black; margin-top: 20px;" href="{{ route('admin_index') }}">Back</a>

</div>


@endsection
   
