<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>El-ROOF | @yield('title')</title>
    <!-- add icon link -->
    <link rel="icon" href="{{ asset('assets/dashboard/img/B-LOGO.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/main.css') }}">

</head>

<body class="sign-in">
    <section>
        <div class="image">
            <img src="{{ asset('assets/dashboard/img/B-LOGO.png') }}" width="120" height="120">
        </div>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="d-flex justify-content-center pb-2">
                        <img src="{{ asset('assets/dashboard/img/B-LOGO.png') }}" width="120" height="120">
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>


</html>
