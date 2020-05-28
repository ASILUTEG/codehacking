@extends('layouts.admin')
@section('content')
<h1>Create new user</h1>
<!-- form create user -->

<p>{{$roles}}</p>
{!! Form::open(['method' => 'post','action'=>'AdminUserController@store','enctype'=>'multipart/form-data']) !!}
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
{!! Form::select('role_id', Array('1'=>'Administrator','2'=>'subscriber')  ,1,['class'=>'form-control']) !!}
</div>
<div class='form-group'>
{!! Form::label('status','Status:-') !!}
{!! Form::select('status',Array('1'=>'Active','0'=>'Not Active') ,1,['class'=>'form-control']) !!}
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
