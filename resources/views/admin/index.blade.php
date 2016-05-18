@extends('layouts.admin')


@section('content')

	<h1>ADMIN AREA</h1>

	<hr>

	<div class="alert alert-warning">
		<p>

		This area is restricted to Administrators only. If you are not an Administrator, please leave immediately or face the consequences. 

		</p>
	</div>

@include('errors.announcement')


	<h4>OVERVIEW OF APPLICATION</h4>

	<p>
		A CMS application built with PHP's Laravel framework. 
	</p>

	<hr>

	<h4>FEATURES</h4>
	<ul>
		<li>CRUD actions for Users, Posts, Comments, Nested Comments, Media</li>
		<li>User login and registration</li>
		<li>Confirmation of comments before displaying on post page</li>
		<li>Allow only logged in users to leave comments on blog posts</li>
		<li>Form Validations</li>
		<li>Restrict admin area to Administrators and Active users only</li>
		<li>Password resets</li>
	</ul>

@endsection 