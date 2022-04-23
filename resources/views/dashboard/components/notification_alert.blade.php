@if (Session::has('custom_error'))
    <div class="alert alert-danger text-center">
        {{ Session::get('custom_error') }}
    </div>
@endif

@if (Session::has('custom_success'))
    <div class="alert alert-success text-center">
        {{ Session::get('custom_success') }}
    </div>
@endif
