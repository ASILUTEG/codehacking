<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\sysUserRequest;
use App\Http\Resources\sysUsercollection;
use App\sysUser;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Str;

class SysUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return sysUser::all();
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

        $sysUser = new sysUser;
        $pass = Str::random(12);
        $user_name = str_replace(' ', '', GoogleTranslate::trans($request->yu, 'en', 'ar'));
        $sysUser->user_name = $user_name;
        $sysUser->password =  Hash::make($pass);
        $sysUser->esl_no = $request->ye;
        $sysUser->yearn = $request->yy;
        $sysUser->branch = $request->yb;
        $sysUser->report_id = 1;
        $sysUser->save();
        return response([
            'user_name' => $sysUser->user_name,
            'password' => $pass,
            'report_id' =>  $sysUser->id,
            'end_way' => 'lol'
        ]);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sysUser  $sysUser
     * @return \Illuminate\Http\Response
     */
    public function show(sysUser $sysUser)
    {

        return new sysUsercollection($sysUser);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sysUser  $sysUser
     * @return \Illuminate\Http\Response
     */
    public function edit(sysUser $sysUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sysUser  $sysUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sysUser $sysUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sysUser  $sysUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(sysUser $sysUser)
    {
        //
    }
}
