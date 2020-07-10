<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\sysUserRequest;
use App\Http\Resources\sysUsercollection;
use App\sysUser;
use App\report;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Str;

class SysUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');;
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
    public function store(sysUserRequest $request)
    {
        $sysUser = new sysUser;
        $pass = Str::random(12);
        $user_name = str_replace(' ', '', GoogleTranslate::trans($request->yu, 'en', 'ar'));
        $user_name = $user_name . $request->yy . $request->yb . $request->ye;
        $ss = sysUser::where('user_name', $user_name)->get();
        if (count($ss) > 0) {
            $user_name = $user_name . Str::random(count($ss));
        }
        $sysUser->user_name = $user_name;
        $sysUser->password =  Hash::make($pass);
        $sysUser->esl_no = $request->ye;
        $sysUser->yearn = $request->yy;
        $sysUser->branch = $request->yb;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sysUser  $sysUser
     * @return \Illuminate\Http\Response
     */


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
