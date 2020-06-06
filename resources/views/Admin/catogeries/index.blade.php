@extends('layouts.admin')


@section('content')
<h1>welcome to catogery</h1>

<div class="row">
    <div class="col-sm-6">
        {!! Form::open(['method' => 'catogery','action'=>'AdminCatogeryController@store','enctype'=>'multipart/form-data']) !!}
        <div class='form-group'>
            {!! Form::label('name','Name:-') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::submit('create Catogery',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
        @include('includes.form_error')
    </div>
    <div class="col-sm-6">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">created date</th>
                    <th scope="col">updated date</th>
                </tr>
            </thead>
            <tbody>
                @if($catogerys)
                @foreach($catogerys as $catogery)
                <tr>
                    <th scope="row">{{$catogery->id}}</th>
                    <td><a href="/admin/catogery/{{$catogery->id}}/edit">{{$catogery->name}}</a></td>
                    <td>{{$catogery->created_at->diffForHumans()}}</td>
                    <td>{{$catogery->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>


</div>



@stop