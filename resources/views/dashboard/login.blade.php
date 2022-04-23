@extends('dashboard.layouts.auth')

@section('title', 'Login')

@section('content')
    <h2 class="text-center">Login</h2>
    <div class="card-body">
        <form method="post" action="{{ route('dashboard.login') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group remember">
                <input type="checkbox" id="remember_me" name="remember_me">
                <label for="remember_me">Remember Me</label>
            </div>
            <div class="d-flex justify-content-center pt-3">
                <input type="submit" value="Login" class="btn float-right login_btn">
            </div>
        </form>
    </div>
@endsection
