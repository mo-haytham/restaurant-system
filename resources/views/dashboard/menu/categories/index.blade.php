@extends('dashboard.layouts.main')

@section('title', 'Categories')

@section('content')
    <div class="d-flex justify-content-between">
        <h2 class="title text-center">Categories</h2>
        <div>
            <a href="{{ route('dashboard.new.category') }}" class="btn ad-btn">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
    @if (count($categories) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.edit.category', ['category_id' => $category->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('dashboard.delete.category') }}" method="post" class="d-inline">

                                @csrf
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
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
