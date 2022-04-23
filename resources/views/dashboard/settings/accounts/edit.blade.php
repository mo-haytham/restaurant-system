@extends('dashboard.layouts.main')

@section('title', 'Accounts')

@section('content')
    <h2 class="title text-center">Update Admin</h2>
    <form class="info" method="post" action="{{ route('dashboard.update.admin', ['admin_id' => $admin->id]) }}"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $admin->name }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-sm-12 col-md-4">
                <label for="email">Role:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $admin->email }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-sm-12 col-md-4">
                <label for="mobile">Role:</label>
                <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $admin->mobile }}" required>
                @error('mobile')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-sm-12 col-md-4">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4">
                <img src="{{ asset('/') . $admin->image_url }}" width="50%" alt="No Image">
            </div>

            <div class="col-sm-12 col-md-4">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" id="password" placeholder="Type New Password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-sm-12">
                <div class="d-flex justify-content-center mt-2">
                    <button type="submit" class="btn btn-primary ad-btn m-1">
                        Update
                    </button>
                    <a href="{{ route('dashboard.management.accounts') }}" class="btn btn-primary ad-btn m-1">Discard</a>
                </div>
            </div>
        </div>

    </form>

@endsection
