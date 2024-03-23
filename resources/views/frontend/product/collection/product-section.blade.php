<div
    class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">

    @foreach ($products as $product)
        <div>
            <div class="product-box">
                <div class="img-wrapper">
                    <div class="front">
                        <a href="product/details.html">
                            @if ($product->productImages->isNotEmpty())
                                @php $firstImage = $product->productImages->first(); @endphp
                                <img src="{{ asset('storage/' . $firstImage->image) }}" class="bg-img blur-up lazyload"
                                    alt="">
                            @endif

                        </a>
                    </div>

                    <div class="cart-wrap">
                        <ul>
                            <li>
                                <a href="javascript:void(0)" class="addtocart-btn">
                                    <i data-feather="shopping-cart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
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
                        <span
                            class="font-light grid-content">{{ $product->status == '1' ? 'Reserved' : 'Available' }}</span>

                    </div>
                    <div class="main-price">
                        <a href="product/details.html" class="font-default">
                            <h5 class="ms-0">{{ $product->name }}</h5>
                        </a>
                        <div class="listing-content">
                            <span class="font-light">{{ $product->status == '1' ? 'Reserved' : 'Available' }}</span>
                            <p class="font-light">{{ $product->description }}</p>
                        </div>
                        <h3 class="theme-color">{{ $product->quantity }}</h3>
                        <button class="btn listing-content">Reserve Now</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach




</div>
