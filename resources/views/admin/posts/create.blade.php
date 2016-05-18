@extends('layouts.admin')

@section('content')

	<h1>Create Post</h1>

@include('errors.announcement')
	

	@include('errors.error')


	{!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

		<div class="form-group">
			{!! Form::label('title', 'Title') !!}
			{!! Form::text('title', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('body', 'Body') !!}
			{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id', 'Category') !!}
			{!! Form::select('category_id', $category, '2' ) !!}
		</div>

		<div class="form-group">
			{!! Form:: label('filename', 'Upload Image') !!}
			{!! Form::file('filename') !!}
		</div>	

		<div class="form-group">
			{!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
		</div>

	{!! Form::close() !!}

@endsection