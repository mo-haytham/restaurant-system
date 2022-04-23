@extends('dashboard.layouts.main')

@section('title', 'Orders')

@section('content')
    <h2 class="title text-center">Orders</h2>

    @if (count($orders))
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Address</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user_name }}</td>
                        <td>{{ $order->date_formatted }}</td>
                        <td>{{ $order->user_mobile }}</td>
                        <td>{{ $order->user_address }}</td>
                        <td>
                            <a href="{{ route('dashboard.order.view', ['order_id' => $order->id]) }}" target="_blank">
                                View Details
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.delete.order') }}" method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <button type="submit" class="btn ad-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No pending orders</p>
    @endif
@endsection
