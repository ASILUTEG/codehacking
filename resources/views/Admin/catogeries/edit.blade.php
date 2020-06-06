@extends('layouts.admin')


@section('content')
<h1>welcome to catogery</h1>

<div class="row">
    <div class="col-sm-6">
        {!! Form::model($catogery,['method' => 'PATCH','action'=>['AdminCatogeryController@update',$catogery->id],'enctype'=>'multipart/form-data']) !!}
        <div class='form-group'>
            {!! Form::label('name','Name:-') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="row">

            <div class='form-group'>
                {!! Form::submit('update Catogery',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            <!-- delete -->
            {!! Form::open(['method' => 'DELETE','action'=>['AdminCatogeryController@destroy',$catogery->id]]) !!}
            <div class='form-group'>
                {!! Form::submit('Delete Catogery',['class'=>'btn btn-danger']) !!}
            </div>
        </div>

        {!! Form::close() !!}
        @include('includes.form_error')

    </div>
</div>

@stop