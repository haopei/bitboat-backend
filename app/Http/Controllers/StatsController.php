<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = DB::table('stats')
            ->leftJoin('produces', 'produces.id', '=', 'stats.produce_id')
            ->select(
                'stats.*',
                'produces.name as produce_name',
                'produces.id as produce_id'
            )->get();

        return response()->json($stats);
    }

    public function ByIdGet($id)
    {
        $stats = DB::table('stats')
            ->leftJoin('produces', 'produces.id', '=', 'stats.produce_id')
            ->where('produces.id', $id)
            ->select(
                'stats.*',
                'produces.name as produce_name',
                'produces.id as produce_id'
            )->get();

        return response()->json($stats);
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
        //
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
     * @param  \Illuminate\Http\Request  $request
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
