@extends('layouts.post')


@section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row">


			@foreach($posts as $post)

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                @if(!is_null($post->photo))

					<img class="img-responsive" src="{{$post->photo->filename}}" alt="">

					<hr>

                @endif
                
                <!-- Post Content -->
                <p>{{$post->body}}</p>

                <hr>

	@endforeach
@endsection