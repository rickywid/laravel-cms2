@extends('layouts.admin')


@section('content')

@include('errors.announcement')

		<div class="col-sm-6">
			{!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

				<div class="form-group">
					{!! Form::label('name', 'Category Name') !!}
					{!! Form::text('name', null, ['class'=>'form-control']) !!}					
				</div>

				
				<div class="form-group">
					{!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}	
				</div>
				

			{!! Form::close() !!}
		</div>

	
		<div class="col-sm-6">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Category</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{$category->id}}</td>
							<td>{{$category->name}}</td>
							<td><a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-info">Edit</a>
							</td>
							
							<td>
								
								{!! Form::open(['method'=>'delete', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

									{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

								{!! Form::close() !!}

							</td>
						</tr>
					@endforeach
				</tbody>
			</table>			
		</div>

@endsection