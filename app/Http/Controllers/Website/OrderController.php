<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        // return $request;
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_address' => 'required|string|max:255',
            'user_mobile' => 'required|string|max:255',
            'item_id' => 'required|array',
            'item_id.*' => 'required|exists:items,id',
            'number' => 'required|array',
            'number.*' => 'required|numeric',
            'notes' => 'nullable|string'
        ]);

        $order = Order::create([
            'user_name' => $request->user_name,
            'user_address' => $request->user_address,
            'user_mobile' => $request->user_mobile,
            'item_id' => $request->item_id,
            'item_id.*' => $request->item_id,
            'number' => $request->number,
            'number.*' => $request->number,
            'notes' => $request->notes
        ]);
        foreach ($request->item_id as $key => $item) {
            $order->order_items()->create([
                'item_id' => $item,
                'number' => $request->number[$key]
            ]);
        }

        return "Your order placed successfully";
    }
}
