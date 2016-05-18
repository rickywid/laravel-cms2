@extends('layouts.admin')


@section('content')

	<h1>Manage Photos</h1>

	<hr>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Delete</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>

		@foreach($photo as $photo)

			<tr>
				<td>{{$photo->id}}</td>
				<td><img height="50" src="{{$photo->filename}}" alt=""></td>
				<td>
					
					{!! Form::open(['method'=>'delete', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
						
						{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

					{!! Form::close() !!}

				</td>
				<td>{{$photo->created_at}}</td>
				<td>{{$photo->updated_at}}</td>			
			</tr>


		@endforeach
		</tbody>
	</table>	

@endsection