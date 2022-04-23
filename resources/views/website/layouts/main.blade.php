<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>El-Roof | @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/website/imgs/B-LOGO.png') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@300&family=Lobster+Two&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="{{ asset('assets/website/owl_carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/website/owl_carousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}" />
</head>

<body>
    <section>
        <img class="cover-img" src="{{ asset('assets/website/imgs/cover.jpg') }}" alt="" height="200" />
        <div class="container-fluid pt-3">
            {{-- static data of website --}}
            <div class="d-flex justify-content-between">
                <div class="dropdown">
                    <button class="btn btn-light drop-button dropdown-toggle" type="button" id="info_dropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="info_dropdown">
                        <li><a class="dropdown-item" href="#">Contact</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#">About Us</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Help</a>
                        </li>
                    </ul>
                </div>

                <a class="review" href="#">
                    <i class="far fa-smile-beam smile"></i>
                    <span>Reviews</span>
                </a>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-md-2">
                    <a class="btn btn-light menu-button" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                        <i class="fas fa-th-large"></i>
                    </a>
                </div>
                <div class="col-sm-12 col-md-10">

                    <div class="owl-carousel owl-loaded owl-drag" id="owl-two">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transition: all 0s ease 0s; width: 10911px; transform: translate3d(-2177px, 0px, 0px);">
                                @foreach ($categories as $category)
                                    <div class="owl-item cloned" style="width: auto;">
                                        <div class="item" style="width: 85.332px">
                                            <a href="#{{ $category->name_as_id }}">{{ ' ' . $category->name }}</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation"
                                class="owl-prev"><span aria-label="Previous">‹</span></button><button
                                type="button" role="presentation" class="owl-next"><span
                                    aria-label="Next">›</span></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                    aria-labelledby="offcanvasWithBothOptionsLabel">
                    <div class="offcanvas-header">
                        <h2 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
                            Menu Categories
                        </h2>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="category-menu">
                            <hr>
                            @foreach ($categories as $category)
                                <li class="menu-list" data-bs-dismiss="offcanvas" aria-label="Close">
                                    <a href="#{{ $category->name_as_id }}">{{ $category->name }}</a>
                                </li>
                                <hr>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($categories as $category)
        <section id="{{ $category->name_as_id }}" class="first-section">
            <div class="container">
                <div class="category-title text-center">
                    <h2>{{ $category->name }}</h2>
                </div>
                <div class="row pt-3">
                    @foreach ($category->items as $item)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">
                                                {{ $item->description->description ?? '' }}
                                            </p>
                                            <small class="text-muted item-price">{{ $item->price }} EGP</small>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <img src="{{ asset('/') . $item->image_url }}"
                                                class="item-img add_to_cart" type="button" data-bs-toggle="modal"
                                                data-item-collection='{!! $item !!}'
                                                data-bs-target="#add_to_cart" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

    {{-- add to cart modal --}}
    <div class="modal fade" id="add_to_cart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Product Description
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="card modal-card">
                        <div class="d-flex justify-content-center">
                            <img id="add_to_cart_image" src="" style="width: 50% !important">
                        </div>
                        <div class="card-body">
                            <div class="row pt-3 pb-3">
                                <div class="col-sm-12 col-md-6">
                                    <p class="card-text pro-name" id="add_to_cart_name"></p>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="d-flex justify-content-center">
                                        <input type="number" id="add_to_cart_number" value="1" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark footer-button" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-dark basket-button" id="add_to_cart_button">
                        Add to Cart
                        <span class="product-sum">EGP <span id="add_to_cart_price"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <a class="go-top" href="#"><i class="fas fa-arrow-up"></i></a>

    {{-- fire cart modal --}}
    <button type="button" class="btn btn-light go-to-cart" id="menu" data-bs-toggle="modal"
        data-bs-target="#cart_modal">
        <span class="side-word">My Cart</span>
        <i class="fas fa-cart-plus"></i>
    </button>

    {{-- cart modal --}}
    <form action="{{ route('website.order') }}" method="post">
        @csrf
        <div class="modal fade" id="cart_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="cart_modal_label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cart_modal_label">Make Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="cart_container">
                        {{-- items placed here by js --}}
                        <hr>
                        <div class="form-group">
                            <label for="notes">
                                <i class="far fa-sticky-note"></i>
                                Special Requests
                            </label>
                            <textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
                        </div>
                        <hr>
                        <div class="payment">
                            <div class="container">
                                <h3>Payment Summary</h3>
                                <p>Total <span>EGP <span id="cart_total_price">0.00</span></span></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="user_name">Your Name</label>
                                    <input type="text" name="user_name" id="user_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="user_mobile">You Mobile</label>
                                    <input type="text" name="user_mobile" id="user_mobile" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="user_address">Address</label>
                                    <textarea name="user_address" id="user_address" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-dark">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <script src="https://kit.fontawesome.com/b576baa534.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/website/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/website/owl_carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/script.js') }}"></script>

    <script>
        $(".add_to_cart").click(function() {
            let item = $(this).data("item-collection")
            $("#add_to_cart_image").attr('src', "{{ asset('/') }}" + item.image_url)
            $("#add_to_cart_name").text(item.name)
            $("#add_to_cart_price").text(item.price)
            $("#add_to_cart_button").attr('data-item', item.id)
        })

        $("#add_to_cart_button").click(function() {
            let cart_item = $(this).attr('data-item')
            let cart_name = $("#add_to_cart_name").text()
            let cart_price = $("#add_to_cart_price").text()
            let cart_number = $("#add_to_cart_number").val()
            let cart_image = $("#add_to_cart_image").attr('src')

            let total_price = (parseFloat($("#cart_total_price").text()) + (parseInt(cart_number) * parseFloat(
                cart_price))).toFixed(2)
            $("#cart_total_price").text(total_price)


            let item_div = `<div class="card item_on_cart mb-3">
                                <input type="hidden" value="${cart_item}" name="item_id[]">
                                <div class="row">
                                    <div class="col-sm-12 col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">${cart_name}</h5>
                                            <div class="form-group">
                                                <label for="cart_item_numer">
                                                    Number
                                                </label>
                                                <input type="number" name="number[]" id="cart_item_numer" value="${cart_number}" class="form-control">
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <small class="text-muted">${cart_price} EGP</small>
                                                <button class="btn btn-outline-danger btn-sm remove_item">
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <img src="${cart_image}"
                                            class="img-fluid rounded-start item-img">
                                    </div>
                                </div>
                            </div>`

            $("#cart_container").prepend(item_div)
            $("#add_to_cart").modal('toggle')
        })

        $("#cart_container").on("click", ".remove_item", function() {
            $(this).closest(".card").remove()
        })

        // $("#menu").click(function() {
        //     let total_price = 0

        // })
    </script>
</body>

</html>
