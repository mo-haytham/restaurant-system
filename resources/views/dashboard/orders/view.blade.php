@extends('dashboard.layouts.main')

@section('title', 'Orde Details')

@section('content')
    <h2 class="title text-center">Order Details</h2>

    <div class="row">
        <div class="col-sm-12 col-md-3">
            <u>Client Name</u>
            <h5>{{ $order->user_name }}</h5>
        </div>
        <div class="col-sm-12 col-md-3">
            <u>Client Mobile</u>
            <h5>{{ $order->user_mobile }}</h5>
        </div>
        <div class="col-sm-12 col-md-6">
            <u>Client Address</u>
            <h5>{{ $order->user_address }}</h5>
        </div>
        <div class="col-sm-12 col-md-6">
            <u>Additional Notes</u>
            <h5>{{ $order->notes }}</h3>
        </div>
    </div>

    <h4>Oder Details</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Number</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->order_items as $item)
                <tr>
                    <td>{{ $item->item->name }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->item->price }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td>Total Cost</td>
                <td>{{ $order->total_cost ?? '152.99' }}</td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <form class="d-inline" action="{{ route('dashboard.confirm.order') }}" method="post">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <button type="submit" class="btn ad-btn mx-2">Confirm</button>
        </form>
        <form class="d-inline" action="{{ route('dashboard.delete.order') }}" method="post">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <button type="submit" class="btn ad-btn mx-2">Cancel</button>
        </form>

    </div>


@endsection
