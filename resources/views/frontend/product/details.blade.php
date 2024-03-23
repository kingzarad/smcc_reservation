@extends('layouts.user.index')

@section('content')
    <div>
        <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3>Autem Repudiandae Accusantium Blanditiis</h3>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="../index.htm">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Autem Repudiandae Accusantium
                                    Blanditiis</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section> <!-- Shop Section start -->

        <section>
            <div class="container">
                <div class="row gx-4 gy-5">
                    <div class="col-lg-12 col-12">
                        <div class="details-items">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="details-image-vertical black-slide rounded">
                                                <div>
                                                    <img src="../assets/images/fashion/product/front/1.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                                <div>
                                                    <img src="../assets/images/fashion/2.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                                <div>
                                                    <img src="../assets/images/fashion/3.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                                <div>
                                                    <img src="../assets/images/fashion/4.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="details-image-1 ratio_asos">
                                                <div>
                                                    <img src="../assets/images/fashion/product/front/1.jpg" id="zoom_01"
                                                        data-zoom-image="assets/images/fashion/1.jpg"
                                                        class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload"
                                                        alt="">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="cloth-details-size">


                                        <div class="details-image-concept">
                                            <h2>Autem Repudiandae Accusantium Blanditiis</h2>
                                        </div>

                                        <div class="label-section">
                                            <span class="badge badge-grey-color">Available</span>

                                        </div>

                                        <h3 class="price-detail">13 <span>Quantity</span></h3>

                                        <div class="product-buttons">
                                            <a href="javascript:void(0)" class="btn btn-solid">
                                                <i class="fa fa-bookmark fz-16 me-2"></i>
                                                <span>Wishlist</span>
                                            </a>
                                            <a href="javascript:void(0)" id="cartEffect"
                                                class="btn btn-solid hover-solid btn-animation">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Reserve</span>
                                                <form id="addtocart" method="post"
                                                    action="http://localhost:8000/cart/store">
                                                    <input type="hidden" name="_token"
                                                        value="MkRqEzTGuoSx6LqJUm0OAKxSgNUYt26wTT7RMUZY"> <input
                                                        type="hidden" name="id" value="1">
                                                    <input type="hidden" name="name"
                                                        value="Autem Repudiandae Accusantium Blanditiis">
                                                    <input type="hidden" name="price" value="13">
                                                    <input type="hidden" name="quantity" id="qty" value="1">
                                                </form>
                                            </a>



                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="cloth-review">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#desc"
                                        type="button">Description</button>

                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="desc">
                                    <div class="shipping-chart">
                                        <div class="part">
                                            <h4 class="inner-title mb-2">Give you a complete account of the system</h4>
                                            <p class="font-light">Nor again is there anyone who loves or pursues or desires
                                                to
                                                obtain pain of itself, because it is pain, but because occasionally
                                                circumstances occur in which toil and pain can procure him some great
                                                pleasure.
                                                To take a trivial example, which of us ever undertakes laborious physical
                                                exercise, except to obtain some advantage from it? But who has any right to
                                                find
                                                fault with a man who chooses to enjoy a pleasure that has no annoying
                                                consequences, or one who avoids a pain that produces no resultant pleasure.
                                            </p>
                                        </div>


                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Section end -->

        <!-- product section start -->
        <section class="ratio_asos section-b-space overflow-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-lg-4 mb-3">Available For Reservation</h2>
                        <div class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space">
                            <div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="front">
                                            <a href="details.html">
                                                <img src="../assets/images/fashion/product/front/23.jpg"
                                                    class="bg-img blur-up lazyload" alt="">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="details.html">
                                                <img src="http://localhost:8000/assets/images/fashion/product/back/23.jpg"
                                                    class="bg-img blur-up lazyload" alt="">
                                            </a>
                                        </div>
                                        <div class="cart-wrap">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="addtocart-btn"
                                                        data-bs-toggle="modal" data-bs-target="#addtocart">
                                                        <i data-feather="shopping-bag"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)" class="wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="rating-details">
                                            <span class="font-light grid-content">Cupiditate Minus</span>
                                            <ul class="rating mt-0">
                                                <li>
                                                    <i class="fas fa-star theme-color"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star theme-color"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="main-price">
                                            <a href="details.php" class="font-default">
                                                <h5>Qui Laboriosam Quas Beatae</h5>
                                            </a>
                                            <div class="listing-content">
                                                <span class="font-light">Regular Fit</span>
                                                <p class="font-light">Dolorem nihil quia qui laudantium expedita aut dolor.
                                                    Qui eligendi voluptatem autem ullam et. Voluptas nemo eum nihil aliquam
                                                    eos aperiam. Numquam dolorum veniam non magnam illum odit deleniti.</p>
                                            </div>
                                            <h3 class="theme-color">$1</h3>
                                            <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                                To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product section end -->

    </div>
@endsection
