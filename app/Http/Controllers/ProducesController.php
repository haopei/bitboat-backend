<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Produce;

class ProducesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produces = Produce::all();

        foreach($produces as $obj) {
            $split = explode('.', $obj->image_url);
            $obj->thumb_url = "$split[0]_thumb.jpg";
        }

        return response()->json($produces);
    }


    public function ByUserIdGet($id) {
        $produces = DB::table('users')
            ->leftJoin('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
            ->leftJoin('suppliers', 'suppliers.user_id', '=', 'users.id')
            ->leftJoin('produces', 'produces.id', '=', 'suppliers.produce_id')
            ->where('roles.id', 1)
            ->where('users.id', $id)
            ->select('users.id as userId',
                'roles.name as roleName',
                'roles.id as roleId',
                'produces.id as produceId',
                'produces.name as produceName',
                'produces.description as produceDescription',
                'produces.image_url as produceImageUrl', 
                'suppliers.availability as supplierAvailability',
                'suppliers.quantity as supplierQuantity'
            )
            ->get();


        return response()->json($produces);

    }

    public function ByIdGet($id) {
        $produce = DB::table('produces')
            ->where('id', $id)->first();

        return response()->json($produce);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produce = new Produce;
        $produce->name = Input::get('name');
        $produce->image_url = Input::get('imageUrl');
        $produce->description = Input::geT('description');
        $produce->save();

        return response()->json($produce);
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
