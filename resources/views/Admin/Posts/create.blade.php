@extends('layouts.admin')
@section('content')
<h1>Create new post</h1>



{!! Form::open(['method' => 'post','action'=>'AdminPostController@store','enctype'=>'multipart/form-data']) !!}
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
    {!! Form::submit('create user',['class'=>'btn btn-primary']) !!}
</div>


{!! Form::close() !!}






@include('includes.form_error')

@stop