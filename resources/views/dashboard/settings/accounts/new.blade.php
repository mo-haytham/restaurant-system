@extends('dashboard.layouts.main')

@section('title', 'Accounts')

@section('content')
    <h2 class="title text-center">Add New Admin</h2>
    <form class="info" method="post" action="{{ route('dashboard.save.admin') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-sm-12 col-md-4">
                <label for="email">Role:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-sm-12 col-md-4">
                <label for="mobile">Role:</label>
                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" required>
                @error('mobile')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-sm-12 col-md-4">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-sm-12 col-md-4">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" id="password" placeholder="Type Password"
                    required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-sm-12">
                <div class="d-flex justify-content-center mt-2">
                    <button type="submit" class="btn btn-primary ad-btn m-1">
                        Save
                    </button>
                    <a href="{{ route('dashboard.management.accounts') }}" class="btn btn-primary ad-btn m-1">Discard</a>
                </div>
            </div>
        </div>

    </form>

@endsection
