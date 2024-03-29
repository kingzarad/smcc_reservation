<section class="ratio_asos overflow-hidden">
    <div class="container p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>Available for Reservation</h2>
                    <h5 class="theme-color">Scroll Down</h5>
                </div>
            </div>
        </div>
        <style>
            .r-price {
                display: flex;
                flex-direction: row;
                gap: 20px;
            }

            .r-price .main-price {
                width: 100%;
            }

            .r-price .rating {
                padding-left: auto;
            }

            .product-style-3.product-style-chair .product-title {
                text-align: left;
                width: 100%;
            }

            @media (max-width:600px) {

                .product-box p,
                .product-box a {
                    text-align: left;
                }

                .product-style-3.product-style-chair .main-price {
                    text-align: right !important;
                }
            }
        </style>
        <div class="row g-sm-4 g-3">
            @foreach ($products as $product)
                <div class="col-xl-2 col-lg-2 col-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <a href="{{ url('collection', urlencode($product->category->slug) . '/' . urlencode($product->slug)) }}">
                                @if ($product->productImages->isNotEmpty())
                                    @php $firstImage = $product->productImages->first(); @endphp
                                    <img src="{{ asset('storage/' . $firstImage->image) }}"
                                        class="w-100 bg-img blur-up lazyload" alt="">
                                @endif

                            </a>
                            <div class="circle-shape"></div>
                            <span class="background-text">{{ $product->category->name }}</span>
                        </div>
                        <div class="product-style-3 product-style-chair">
                            <div class="product-title d-block mb-0">
                                <div class="r-price d-flex justify-content-between">
                                    <div class="theme-color"> {{ $product->category->name }} </div>
                                    <div class="text-primary">{{ $product->quantity }}</div>
                                </div>

                                <p class="font-light mb-sm-2 mb-0">{{ $product->product_status == '1' ? 'Reserved' : 'Available' }}</p>
                                <a href="{{ url('collection', urlencode($product->category->slug) . '/' . urlencode($product->slug)) }}" class="font-default">
                                    <h5>{{ $product->name }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>
</section>
