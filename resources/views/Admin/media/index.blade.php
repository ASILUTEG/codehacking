@extends('layouts.admin')
@section('content')
<h1>show all photos</h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Photo</th>
            <th scope="col">created date</th>
            <th scope="col">updated date</th>
            <th scope="col">DELETE Photo</th>
        </tr>
    </thead>
    <tbody>
        @if($photos)
        @foreach($photos as $photo)
        <tr>
            <th scope="row">{{$photo->id}}</th>
            <td><img height="25" src="{{$photo ? $photo->path : '/images/no.jpg'}}"></td>
            <td>{{$photo->created_at->diffForHumans()}}</td>
            <td>{{$photo->updated_at->diffForHumans()}}</td>
            <td>
                {!! Form::open(['method' => 'DELETE','action'=>['AdminMediaController@destroy',$photo->id]]) !!}
                <div class='form-group'>
                    {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-4']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        @endif
        @include('includes.form_error')

        @stop