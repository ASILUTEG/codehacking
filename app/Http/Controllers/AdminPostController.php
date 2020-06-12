<?php

namespace App\Http\Controllers;

use App\catogery;
use App\user;
use App\role;
use App\comment;
use App\photo;
use App\posts;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\postEditeRequest;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = posts::all();
        return view('Admin.posts.index', compact('posts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $catogery = catogery::pluck('name', 'id');
        return view('Admin.posts.create', compact('catogery'));
    }


    public function post($id)
    {
        $catogerys = catogery::pluck('name');
        $post = posts::findOrfail($id);
        $comments = $post->comments;
        return view('post', compact('post', 'catogerys', 'comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $users = Auth::user();
        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $input['user_id'] = $users->id;
        // $users->posts()->create($input);
        posts::create($input);
        $posts = posts::all();
        return view('Admin.posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $catogery = catogery::pluck('name', 'id');
        $post = posts::findOrfail($id);
        return view('Admin.posts.edit', compact('post', 'catogery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(postEditeRequest $request, $id)
    {
        $post = posts::findOrfail($id);
        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }
        // $users->posts()->create($input);
        $post->update($input);
        $posts = posts::all();
        return view('Admin.posts.index', compact('posts'));
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = posts::findOrFail($id);
        unlink(public_path() . $post->photo->path);
        $post->delete();
        $posts = posts::all();
        return view('Admin.posts.index', compact('posts'));
        //
    }
}
