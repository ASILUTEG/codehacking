@extends('layouts.post-blog')
@section('content')
<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user ? $post->user->name:'User Deleted'}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img height="300" class="img-responsive" src="{{$post->photo ? $post->photo->path : '/images/no.jpg'}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>
        <hr>
        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method' => 'POST','action'=>'PostCommentsController@store','enctype'=>'multipart/form-data']) !!}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class='form-group'>
                {!! Form::label('body','BODY:-') !!}
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('create Comment',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            @include('includes.form_error')
        </div>

        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->
        @if(count($comments)>0)
        @foreach($comments as $comment)
        </br>
        <div class="media">
            <a class="pull-left" href="#">
                <img height="100" src="{{$comment->photo ? $comment->photo->path : '/images/no.jpg'}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->Author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                <h3>comment is</h3>
                <h3>{{$comment->body}}</h3>
            </div>
        </div>
        @endforeach
        @endif
        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <!-- Nested Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <!-- End Nested Comment -->
            </div>
        </div>


        @stop




        @section('catogery')

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @foreach($catogerys as $gatogery)
                    <li><a href="#">{{$gatogery}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        @stop