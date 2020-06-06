@extends('layouts.admin')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/min/dropzone.min.css">
@stop
@section('content')
<h1>Create Photo</h1>


{!! Form::open(['method' => 'post','action'=>'AdminMediaController@store','class'=>'dropzone']) !!}

{!! Form::close() !!}



@include('includes.form_error')

@stop


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/min/dropzone.min.js"></script>
@stop