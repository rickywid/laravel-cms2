@extends('layouts.admin')

@section('content')

	<h1>Comments</h1>

	<hr>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Author</th>
				<th>Comment</th>
				<th>Created</th>
				<th>Updated</th>
				<th></th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>

			@foreach($comments as $comment)
	
			<tr>
				<td>{{$comment->id}}</td>
				<td>{{$comment->name}}</td>
				<td>{{$comment->body}}</td>
				<td>{{$comment->created_at}}</td>
				<td>{{$comment->updated_at}}</td>
				<td><a href="{{route('post.show', $comment->post->id)}}" class="btn btn-success">View Post</a></td>
				<td>
					
					@if($comment->is_active == 1)

						{!! Form::open(['method'=>'PATCH', 'action'=>['AdminCommentsController@update', $comment->id]]) !!}

							<input type="hidden" name="is_active" value="0">
		
							{!! Form::submit('Deactivate', ['class'=>'btn btn-warning']) !!}

						{!! Form::close() !!}

					@else

			
						{!! Form::open(['method'=>'PATCH', 'action'=>['AdminCommentsController@update', $comment->id]]) !!}
	
							<input type="hidden" name="is_active" value="1">
							
							{!! Form::submit('Activate', ['class'=>'btn btn-info']) !!}

						{!! Form::close() !!}

					@endif

				</td>
				<td>
					
					{!! Form::open(['method'=>'delete', 'action'=>['AdminCommentsController@destroy', $comment->id]]) !!}

						{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

					{!! Form::close() !!}

				</td>

			</tr>

			@endforeach
		</tbody>

	</table>

@endsection