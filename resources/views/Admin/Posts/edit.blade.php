@extends('layouts.admin')
@section('content')
<h1>Edit Post {{$post->title}}</h1>
<div class="row">
    <div class="col-sm-3">
        <img src="{{$post->photo ? $post->photo->path : '/images/co.jpg'}}" alt="" class="img-responsive img-rounded">
    </div>
</div>

<div class="row">
    <div class="col-sm-9">
        {!! Form::model($post,['method' => 'PATCH','action'=>['AdminPostController@update',$post->id],'enctype'=>'multipart/form-data']) !!}
        <div class='form-group'>
            {!! Form::label('title','Title:-') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('body','Body:-') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('catogery_id','catogery:-') !!}
            {!! Form::select('catogery_id',$catogery,null,['class'=>'form-control']) !!}
        </div>

        <div class='form-group'>
            {!! Form::label('photo_id','Image:-') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>

            {!! Form::submit('Edit post' ,['class'=>'btn btn-primary col-sm-4']) !!}
        </div>

        {!! Form::close() !!}

        <!-- delete -->
        {!! Form::open(['method' => 'DELETE','action'=>['AdminPostController@destroy',$post->id]]) !!}
        <div class='form-group'>
            {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-4']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>


@include('includes.form_error')

@stop