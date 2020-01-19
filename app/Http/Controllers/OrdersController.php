<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Partners;
use App\Products;
use App\Http\Requests\UpdateOrders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::all();
        return view('orders', ['orders' => $orders]);
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
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Orders::find($id);
        $partners = Partners::all();

        return view('ordersEdit', [
            'order' => $order,
            'partners' => $partners,
            'orderProducts' => $order->products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrders  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrders $request, Orders $order)
    {
        //dd($request->status);

        $order->client_email = $request->client_email;
        $partner = Partners::find($request->partner);
        $order->partner()->associate($partner);//->associate($order);
        //$order->update([
            //'client_email' => $request->client_email,
            //'partner' => $partner,
            //'status' => $request->status,
        //]);
        //$order->partner()->save($partner);
        //dd($partner);
        //$order->partner($partner->toArray());// = $partner->toArray();
        //$order->partner()->associate($partner);
        $order->status = $request->status;

        //$order->update($request->all());
        //$partner->save();
        $order->save();
        //return $request->all();
        return redirect('/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
