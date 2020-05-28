@extends('layouts.admin')
@section('content')

<h1>welcome to admin page</h1>
<input type="button" value="go test your code">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">rol</th>
      <th scope="col">Active</th>
      <th scope="col">created date</th>
      <th scope="col">updated date</th>
    </tr>
  </thead>
  <tbody>
    @if($users)
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td><img height="50" src="{{$user->photo ? $user->photo->path : '/images/no.jpg'}}"></td>
      <td><a href="/Admin/user/{{$user->id}}/edit">{{$user->name}}</a></td>
      <td>{{$user->email}}</td>
      <td>{{$user->role->name}}</td>
      <td>{{$user->status == 1 ? 'Active' : 'Not Active'}}</td>
      <td>{{$user->created_at->diffForHumans()}}</td>
      <td>{{$user->updated_at->diffForHumans()}}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>

@stop