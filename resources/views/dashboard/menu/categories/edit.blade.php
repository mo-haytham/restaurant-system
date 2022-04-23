@extends('dashboard.layouts.main')

@section('title', 'Edit Category')

@section('content')

    <h2 class="title text-center">Edit {{ ucfirst($category->name) }} Category</h2>
    <form class="info" method="post"
        action="{{ route('dashboard.update.category', ['category_id' => $category->id]) }}">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-12">
                <div class="d-flex justify-content-center mt-2">
                    <button type="submit" class="btn btn-primary ad-btn m-1">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
