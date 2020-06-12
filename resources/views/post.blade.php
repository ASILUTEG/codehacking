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
                <h4>{{$comment->body}}</h4>
                </br>
                <div class="well">
                    <!-- replay section -->

                    @if(count($comment->replays)>0)
                    @foreach($comment->replays as $replay)
                    <h4 class="media-heading">{{$replay->Author}}
                        <small>{{$replay->created_at->diffForHumans()}}</small>
                    </h4>
                    <a>
                        <img height="100" src="{{$replay->photo ? $comment->photo->path : '/images/no.jpg'}}" alt="">
                    </a>
                    <h4>{{$replay->body}}</h4>
                    @endforeach
                    @endif
                    {!! Form::open(['method' => 'POST','action'=>'commentreplaiesController@store','enctype'=>'multipart/form-data']) !!}
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    <div class='form-group'>
                        {!! Form::label('body','Reply:-') !!}
                        {!! Form::text('body',null,['class'=>'form-control']) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                    @include('includes.form_error')
                    <!-- end replay -->
                </div>

            </div>
            @endforeach
            @endif
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