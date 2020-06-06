<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCatogeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catogerys = \App\catogery::all();
        return view('Admin.catogeries.index', compact('catogerys'));
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
        $input = $request->all();
        \App\catogery::create($input);
        $catogerys = \App\catogery::all();
        return view('Admin.catogeries.index', compact('catogerys'));
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
        $catogery = \App\catogery::findOrfail($id);
        return view('Admin.catogeries.edit', compact('catogery'));
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
        $catogery = \App\catogery::findOrfail($id);
        $input = $request->all();
        $catogery->update($input);
        $catogerys = \App\catogery::all();
        return view('Admin.catogeries.index', compact('catogerys'));
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
        $catogery = \App\catogery::findOrfail($id);
        $catogery->delete();
        $catogerys = \App\catogery::all();
        return view('Admin.catogeries.index', compact('catogerys'));
        //
    }
}
