@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    {!! Form::open(['method' => 'GET','action' => ['SysUserController@show',1]]) !!}
                    <div class='form-group'>
                        {!! Form::label('user_name','User Name:-') !!}
                        {!! Form::text('User_name',null,['class'=>'form-control']) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::label('Paswword','Password:-') !!}
                        {!! Form::text('Password',null,['class'=>'form-control']) !!}
                    </div>
                    <div class='form-group'>
                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                    @include('includes.form_error')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection