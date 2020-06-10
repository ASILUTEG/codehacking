<?php



namespace App\Http\Controllers;

use App\catogery;
use App\user;
use App\comment;
use App\role;
use App\photo;
use App\posts;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\postEditeRequest;
use Illuminate\Support\Facades\Auth;


class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = comment::all();
        return view('Admin.comments.index', compact('comments'));
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
            'post_id' => $request->post_id,
            'body' => $request->body,
            'Author' => $users->name,
            'photo_id' => $users->photo->id,
            'email' => $users->email,
            'status' => $users->status,
        ];
        comment::create($data);
        $comments = comment::all();
        return view('Admin.comments.index', compact('comments'));
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
        $post = posts::findOrfail($id);
        $comments = $post->comments;
        return view('Admin.comments.show', compact('comments'));

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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        comment::findOrFail($id)->update($request->all());

        $comments = comment::all();
        return view('Admin.comments.index', compact('comments'));
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
        comment::findOrFail($id)->delete();
        $comments = comment::all();
        return view('Admin.comments.index', compact('comments'));
        //
    }
}
