@extends('layouts.admin')
@section('content')
<h1>show all Posts</h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">User</th>
            <th scope="col">Catogery</th>
            <th scope="col">Photo</th>
            <th scope="col">created date</th>
            <th scope="col">updated date</th>
        </tr>
    </thead>
    <tbody>
        @if($posts)
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</a></td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->catogery_id}}</td>
            <td><img height="25" src="{{$post->photo ? $post->photo->path : '/images/no.jpg'}}"></td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
        @endif
        @include('includes.form_error')

        @stop