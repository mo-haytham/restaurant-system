@extends('dashboard.layouts.main')

@section('title', 'Items')

@section('content')
    <div class="d-flex justify-content-between">
        <h2 class="title text-center">Items</h2>
        <div>
            <a href="{{ route('dashboard.new.item') }}" class="btn ad-btn">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
    @if (count($items) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>
                            @isset($item->image_url)
                                <img src="{{ asset('/') . $item->image_url }}" width="50"
                                    alt="{{ $item->name . ' image' }}">
                            @endisset
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->description->description ?? '' }}</td>
                        <td>
                            <a href="{{ route('dashboard.edit.item', ['item_id' => $item->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('dashboard.delete.item') }}" method="post" class="d-inline">

                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <button type="submit" class="ad-btn">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
