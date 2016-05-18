@extends('layouts.admin')

@section('styles')

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@endsection

@section('content')

	<h1>Upload Photos</h1>

@include('errors.announcement')

		
	{!! Form::open(['method'=>'post', 'action'=>'AdminMediasController@store', 'class'=>'dropzone']) !!}

	{!! Form::close() !!}

@endsection

@section('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@endsection