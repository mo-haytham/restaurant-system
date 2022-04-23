<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 0)->get();
        return view('dashboard.orders.index', compact('orders'));
    }

    public function view($order_id)
    {
        $order = Order::where('id', $order_id)->with('order_items', function ($order_item) {
            $order_item->with('item');
        })->first();

        // return $order;

        $total_cost = 0.00;

        foreach ($order->order_items as $item) {
            $total = $item->number * $item->item->price;
            $item->total = round($total, 2);
            $total_cost += $total;
        }

        $order->total_cost = round($total_cost, 2);

        return view('dashboard.orders.view', compact('order'));
    }

    public function confirm(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = 1;
        $order->save();

        $back_message = ['custom_success' => 'Order Confirmed'];
        return redirect()->back()->with($back_message);
    }

    public function delete(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = 9;
        $order->save();

        $back_message = ['custom_success' => 'Order Canceled'];
        return redirect()->back()->with($back_message);
    }
}
