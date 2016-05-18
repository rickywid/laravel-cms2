@extends('layouts.admin')

@section('content')

	<h2>Users</h2>

	<hr>	

	@if(Session::has('user_created') || Session::has('user_deleted') || Session::has('user_updated'))
		<div class="alert alert-success">
			<p>{{Session('user_created')}}</p>
			<p>{{Session('user_deleted')}}</p>
			<p>{{Session('user_updated')}}</p>
		</div>
	@endif
	

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Status</th>				
				<th>Name</th>
				<th>Role</th>
				<th>Email</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach($users as $user)

				<tr>
					<td>{{$user->id}}</td>
					<td><img height="50" src="{{$user->photo ? $user->photo->filename: 'http://placehold.it/400x400'}}" alt=""></td>						
					<td>{{$user->is_active ? 'Active' : 'Not Active'}}</td>				
					<td>{{$user->name}}</td>
					<td>{{$user->role->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->created_at}}</td>
					<td>{{$user->updated_at}}</td>
					<td><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-info">Edit</a></td>
					<td>
						
						{!! Form::open(['method'=>'delete', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
							
							{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

						{!! Form::close() !!}

					</td>					
				</tr>



			@endforeach



		</tbody>
	</table>	


@endsection
