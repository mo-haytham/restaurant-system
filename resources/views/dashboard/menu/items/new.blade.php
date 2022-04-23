@extends('dashboard.layouts.main')

@section('title', 'New Item')

@section('content')

    <h2 class="title text-center">Add New Item</h2>

    <form class="info" method="post" action="{{ route('dashboard.save.item') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Item Name" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4">
                <label for="image">
                    Image <small>Not Required</small>
                </label>
                <input type="file" class="form-control" name="image" id="image">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-12">
                <label for="description">
                    Description <small>Not Required</small>
                </label>
                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-12">
                <div class="d-flex justify-content-center mt-2">
                    <button type="submit" class="btn btn-primary ad-btn m-1">
                        Save
                    </button>
                    <a href="{{ route('dashboard.items') }}" class="btn btn-primary ad-btn m-1">Discard</a>
                </div>
            </div>
        </div>
    </form>
@endsection
