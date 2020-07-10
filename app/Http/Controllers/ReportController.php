<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use Illuminate\Support\Str;
use App\sysUser;
use App\report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return report::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Str::upper($request->file('file')->getClientOriginalExtension()) == "PDF") {

            $report = new report;
            if ($file = $request->file('file')) {
                $name = $request->file('file')->getClientOriginalName();
                $sys_id = str_replace('.pdf', '', $name);
                $sys_id = str_replace('.PDF', '', $name);
                $rp = report::where('sys_id', $sys_id)->delete();
                $file->move('PDF', $name);
                $report['file'] = $name;
                $report['sys_id'] = $sys_id;
                $report->save();
            }
            return response([
                'Succefull'
            ]);
        } else {
            return response([
                'error file type'
            ]);
        }



        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
}
