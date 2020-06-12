<?php

namespace App\Http\Controllers;

use App\catogery;
use App\replay;
use App\user;
use App\comment;
use App\role;
use App\photo;
use App\posts;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\postEditeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class commentreplaiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $users = user::findOrfail($user->id);
        $data = [
            'comment_id' => $request->comment_id,
            'body' => $request->body,
            'Author' => $users->name,
            'photo_id' => $users->photo->id,
            'email' => $users->email,
            'status' => $users->status,
        ];
        replay::create($data);
        // $replay = DB::select('select comment_id from replays ');
        // $replay = replay::where('comment_id', '2')->get();
        return $data;
        //return $data;
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requet
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        //
    }
}
