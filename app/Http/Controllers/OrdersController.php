<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
            ->leftJoin('produces', 'produces.id', '=', 'orders.produce_id')
            ->leftJoin('locations', 'locations.id', '=', 'orders.delivery_location_id')
            ->select('orders.*',
                'produces.name as produce_name',
                'locations.country',
                'locations.region',
                'locations.address'
            )->get(); 


        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($produceId)
    {
        Log::info(Input::all());

        $order = new Order;
        $order->user_id = Input::get('user_id');
        $order->produce_id = $produceId;
        $order->quantity = Input::get('quantity');
        $order->delivery_location_id = Input::get('deliveryLocationId');
        $order->price = Input::get('price');
        $order->active = Input::get('active');

        $order->save();

        return response()->json($order);
    }


    public function activation(){
        $id = Input::get('id');
        $bool = Input::get('active');


        $order = Order::find($id);
        $order->id = $id;
        $order->save();

        return response()->json($order);
    }

    public function BidsByOrderIdGet($id) {
        $bids = DB::table('users')
            ->leftJoin('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
            ->leftJoin('bids', 'bids.user_id', '=', 'users.id')
            ->leftJoin('orders', 'orders.id', '=', 'bids.order_id')
            ->where('orders.id', $id)
            ->where('roles.id', 2)
            ->select('bids.*',
                'roles.name as role_name',
                'roles.id as role_id'
            )->get();

        return response()->json($bids);
    }
    
    public function BidsByUserIdGet($id) {
        $bids = DB::table('users')
            ->leftJoin('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
            ->leftJoin('bids', 'bids.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->where('roles.id', 1)
            ->select('bids.*',
                'roles.name as role_name',
                'roles.id as role_id'
            )->get();

        return response()->json($bids);
    }
    
    public function OrdersByUserIdGet($id) {
        $bids = DB::table('users')
            ->leftJoin('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
            ->leftJoin('orders', 'orders.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->where('roles.id', 2)
            ->select('orders.*',
                'roles.name as role_name',
                'roles.id as role_id'
            )->get();

        return response()->json($bids);
    }

    public function ByIdGet($id) {
        $order = DB::table('orders')
            ->leftJoin('produces', 'produces.id', '=', 'orders.produce_id')
            ->leftJoin('locations', 'locations.id', '=', 'orders.delivery_location_id')
            ->where('orders.id', $id)
            ->select('orders.*',
                'produces.name as produce_name',
                'locations.country',
                'locations.region',
                'locations.address'
            )->first(); 


        return response()->json($order);
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
