@extends('dashboard.layouts.main')

@section('title', 'Orders')

@section('content')
    <h2 class="title text-center">Orders</h2>
    <div class="form-group has-search">
        <span class="fa fa-search form-control-feedback"></span>
        <input type="text" class="form-control" placeholder="Search">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Table No</th>
                <th scope="col">Order</th>
                <th scope="col">Special request</th>
                <th scope="col">Total Cost</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>4</td>
                <td><a href="#" target="_blank">View Details</a></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a role="button"><i class="fas fa-check-square"></i></a>
                    <a type="discard" role="button"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
