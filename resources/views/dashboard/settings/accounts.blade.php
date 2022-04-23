@extends('dashboard.layouts.main')

@section('title', 'Account Management')

@section('content')
    <h2 class="title text-center">Order Details</h2>
    <div class="admins">
        <h3 class="mb-5 header-section">Current Admins</h3>
        <div class="row text-center pb-5">
            <div class="col-sm-12 col-md-3">
                <div class="prof-img mb-1">
                    <img src="{{ asset('assets/dashboard/img/person1.jpg') }}" alt="Profile-pic" width="100" height="100">
                </div>
                <h5 class="admin-name ">Name</h5>
                <span><a href="#"><i class="fas fa-user-edit" alt="Edit"></i></a> <a href="#"><i class="far fa-trash-alt"
                            alt="Delete"></i></a></span>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="prof-img mb-1">
                    <img src="{{ asset('assets/dashboard/img/person1.jpg') }}" alt="Profile-pic" width="100" height="100">
                </div>
                <h5 class="admin-name">Name</h5>
                <span><a href="#"><i class="fas fa-user-edit" alt="Edit"></i></a> <a href="#"><i class="far fa-trash-alt"
                            alt="Delete"></i></a></span>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="prof-img mb-1">
                    <img src="{{ asset('assets/dashboard/img/person1.jpg') }}" alt="Profile-pic" width="100" height="100">
                </div>
                <h5 class="admin-name">Name</h5>
                <span><a href="#"><i class="fas fa-user-edit" alt="Edit"></i></a> <a href="#"><i class="far fa-trash-alt"
                            alt="Delete"></i></a></span>
            </div>
        </div>
    </div>

    <hr>


    <div>
        <h3 class="mb-5 header-section">Add New Admin</h3>
        <form class="info">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <label for="user-name">User Name:</label>
                    <input type="text" class="form-cell" id="user-name" placeholder="User Name" value="" required>
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="role">Role:</label>
                    <input type="text" class="form-cell" id="role" placeholder="Role" value="" required>
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="password">Password:</label>
                    <input type="password" class="form-cell" id="password" placeholder="Type Password" value=""
                        required>
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="password">Password: </label>
                    <input type="password" class="form-cell" id="password" placeholder="Type Password again" value=""
                        required>
                </div>
                <div class="col-sm-12 col-md-4">
                    <label for="profile-img">Image</label>
                    <input type="file" class="" id="profile-img" name="profile-image" placeholder="" value=""
                        required>
                </div>
                <div class="col-sm-12">
                    <div class="header-section d-flex justify-content-between mt-5">

                        <a type="submit" role="button" class="ad-btn btn mr-1 pb-2">Add</a>
                        <a type="discard" role="button" class="ad-btn btn  pb-2">Discard</a>

                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
