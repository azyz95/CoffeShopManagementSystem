<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Comment;
use Illuminate\Http\Request;
use Cart;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {

        Cart::clear();

        return redirect()->back()->with('msg', 'You have successfuly removed orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $name, $price)
    {
        if($id != '' && $name != '' && $price != '') {

            Cart::add(array(
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => 1

            ));

            return redirect()->back()->with('msg', 'You have successfuly ordered ' . $name);

        } else {
            return redirect()->back()->with('msg', 'Error while ordering');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Orders;
        $order->firstname = $request->input('firstname');
        $order->lastname = $request->input('lastname');
        $order->street = $request->input('street');
        $order->city = $request->input('city');
        $order->type = $request->input('type');
        $order->table = $request->input('table');
        $order->price = Cart::getTotal();
        $order->quantity = Cart::getTotalQuantity();
        $order->status = 0;

        $cart = Cart::getContent();

        foreach($cart as $item){
            DB::table('items')->where('id', $item->id)->decrement('quantity', $item->quantity);
        }

        $cart = serialize($cart);
        $order->data = $cart;

        $order->save();

        Cart::clear();

        return view('ordered')->with('name', $request->input('firstname') . ' ' . $request->input('lastname'));
    }

    public function comment(Request $request)
    {
        $comment = new Comment;
        $comment->name = $request->input('name');
        $comment->comment = $request->input('comment');
        $comment->raiting = $request->input('raiting');

        $comment->save();

        return redirect()->route('index')->with('msg', 'Thank you for leaving comment.Hope you are enjoying your coffee by now.Have a nice day :D');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        return view('ordered');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
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
