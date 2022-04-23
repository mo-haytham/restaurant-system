@extends('dashboard.layouts.main')

@section('title', 'New Category')

@section('content')

    <h2 class="title text-center">Add New Category</h2>

    <form class="info" method="post" action="{{ route('dashboard.save.category') }}">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-12">
                <div class="d-flex justify-content-center mt-2">
                    <button type="submit" class="btn btn-primary ad-btn m-1">
                        Save
                    </button>
                    <a href="{{ route('dashboard.categories') }}" class="btn btn-primary ad-btn m-1">Discard</a>
                </div>
            </div>
        </div>
    </form>
@endsection
