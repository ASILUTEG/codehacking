@extends('layouts.admin')
@section('content')

<h1>Update user {{$user->name}} Information</h1>

<div class="col-sm-3">

    <img src="{{$user->photo ? $user->photo->path : '/images/co.jpg'}}" alt="" class="img-responsive img-rounded">

</div>
<div class="row">
    <div class="col-sm-9 right">
        {!! Form::model($user,['method' => 'PATCH','action'=>['AdminUserController@update',$user->id],'enctype'=>'multipart/form-data']) !!}
        <div class='form-group'>
            {!! Form::label('name','Name:-') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('email','Email:-') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('password','Password:-') !!}
            {!! Form::password('password',null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('role_id','Role:-') !!}
            {!! Form::select('role_id', Array('1'=>'Administrator','2'=>'subscriber') ,null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('status','Status:-') !!}
            {!! Form::select('status',Array('1'=>'Active','0'=>'Not Active') ,null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('photo_id','Image:-') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>

        <div class='form-group'>
            {!! Form::submit('Update user',['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>
</div>
@include('includes.form_error')

@stop