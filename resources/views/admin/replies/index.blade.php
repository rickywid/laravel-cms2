@extends('layouts.admin')



@section('content')

	<h1>Replies</h1>

	<hr>

	@if(Session::has('reply_deleted'))
	
	<div class="alert alert-success">
		<p>{{session('reply_deleted')}}</p>	
	</div>
	
	@endif

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Author</th>
				<th>Email</th>
				<th>Reply</th>
				<th>Created</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>

		@foreach($replies as $reply)
			<tr>
				<td>{{$reply->id}}</td>
				<td>{{$reply->name}}</td>
				<td>{{$reply->email}}</td>
				<td>{{$reply->body}}</td>
				<td>{{$reply->created_at}}</td>
				<td>
					
					@if($reply->is_active == 1)

						{!! Form::open(['method'=>'PATCH', 'action'=>['RepliesController@update', $reply->id]]) !!}

							<input type="hidden" name="is_active" value="0">

							{!! Form::submit('Deactivate', ['class'=>'btn btn-warning']) !!}

						{!! Form::close() !!}

					@else


						{!! Form::open(['method'=>'PATCH', 'action'=>['RepliesController@update', $reply->id]]) !!}

							<input type="hidden" name="is_active" value="1">

							{!! Form::submit('Activate', ['class'=>'btn btn-info']) !!}

						{!! Form::close() !!}					

					@endif

				</td>
				<td>
					
					<td>
						
						{!! Form::open(['method'=>'delete', 'action'=>['RepliesController@destroy', $reply->id]]) !!}
							
							{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

						{!! Form::close() !!}

					</td>	

				</td>
				
			</tr>
		@endforeach

		</tbody>
	</table>

@endsection