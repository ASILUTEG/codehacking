@extends('layouts.admin')
@section('content')


@if(count($comments)>0)
<h1>COMMENTS PAGE</h1>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Author</th>
            <th scope="col">Email</th>
            <th scope="col">Comment</th>
            <th scope="col">post</th>
            <th scope="col">created date</th>
            <th scope="col">updated date</th>
        </tr>
    </thead>
    <tbody>

        @foreach($comments as $comment)
        <tr>
            <th scope="row">{{$comment->id}}</th>
            <td><img height="50" src="{{$comment->photo ? $comment->photo->path : '/images/no.jpg'}}"></td>
            <td>{{$comment->Author}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td><a href="/post/{{$comment->post->id}}">{{$comment->post->title}}</a></td>
            <td>{{$comment->created_at->diffForHumans()}}</td>
            <td>{{$comment->updated_at->diffForHumans()}}</td>
            <td>
                <!-- my approve comment -->
                {!! Form::model($comment,['method' => 'PATCH','action'=>['PostCommentsController@update',$comment->id],'enctype'=>'multipart/form-data']) !!}
                @if($comment->status == 1)
                <input type="hidden" name="status" value="0">
                <div class='form-group'>
                    {!! Form::submit('APPROVED',['class'=>'btn btn-info']) !!}
                </div>
                {!! Form::close() !!}
                @else
                <!-- delete comment -->
                <input type="hidden" name="status" value="1">
                <div class='form-group'>
                    {!! Form::submit('UNAPPROVED',['class'=>'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}

                @endif
            </td>

            <td>
                <!-- delete -->
                {!! Form::open(['method' => 'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
                <div class='form-group'>
                    {!! Form::submit('Delete Comment',['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach


        @else
        <h1>NO COMMENT</h1>
        @endif
    </tbody>
</table>

@stop