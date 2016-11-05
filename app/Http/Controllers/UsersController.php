<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = DB::table('users')->get();
        $users = User::all();

        return response()->json($users);
    }

    /**
     * Supplier Data
     */

    public function supplier()
    {
    }


    public function login()
    {
        return response()->json(array(
            "status" => "OK"
        ));
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


    public function BuyersAllGet() {
        $users = DB::table('users')
            ->leftJoin('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
            ->where('roles.id', 1)
            ->select('users.*',
                'roles.name as role_name',
                'roles.id as role_id')
            ->get();

        return response()->json($users);
    }
    
    public function ProducersAllGet() {
        $users = DB::table('users')
            ->leftJoin('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
            ->where('roles.id', 2)
            ->select('users.*',
                'roles.name as role_name',
                'roles.id as role_id')
            ->get();

        return response()->json($users);
    }

    public function apis() {
        \Artisan::call('route:list');
        return '<pre>' . \Artisan::output() . '</pre>';
    }


    public function UserByIdGet($id) {
        $user = DB::table('users')->where('id', $id)->first();

        return response()->json($user);
    }

}
