@extends('dashboard.layouts.main')

@section('title', 'Accounts')

@section('content')
    <div class="d-flex justify-content-between">
        <h2 class="title text-center">Current Admin</h2>
        <div>
            <a href="{{ route('dashboard.new.admin') }}" class="btn ad-btn">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>

    <div class="row text-center">
        @foreach ($admins as $admin)
            <div class="col-sm-12 col-md-3">
                <div class="prof-img mb-1">
                    @if ($admin->image_url == null)
                        <img src="{{ asset('assets/dashboard/img/person1.jpg') }}" alt="Profile-pic" width="100"
                            height="100">
                    @else
                        <img src="{{ asset('/') . $admin->image_url }}" alt="Profile-pic" width="100" height="100">
                    @endif
                </div>
                <span class="admin-name d-block lead">{{ $admin->name }}</span>
                <span class="admin-name d-block">{{ $admin->email }}</span>
                <span class="admin-name d-block">{{ $admin->mobile }}</span>
                <div class="d-block">
                    <a href="{{ route('dashboard.edit.admin', ['admin_id' => $admin->id]) }}" class="btn ad-btn">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    <form action="{{ route('dashboard.delete.admin') }}" method="post" class="d-inline">
                        @csrf
                        <input type="hidden" name="admin_id" value="{{ $admin->id }}">
                        <button type="submit" class="btn ad-btn">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
