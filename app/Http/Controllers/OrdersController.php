<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($produceId)
    {
        $input = Input::all();

        $order = new Order;
        $order->user_id = Input::get('user_id');
        $order->produce_id = $produceId;
        $order->quantity = Input::get('quantity');
        $order->delivery_location_id = Input::get('deliveryLocationId');
        $order->price = Input::get('price');
        $order->active = Input::get('active');

        $order->save();

        return resource()->json($order);
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
