<div
    class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">
    @forelse ($products as $product)
        <div>
            <div class="product-box">
                <div class="img-wrapper">
                    <div class="front">
                        <a
                            href="{{ url('collection', urlencode($product->category->slug) . '/' . urlencode($product->slug)) }}">
                            @if ($product->productImages->isNotEmpty())
                                @php $firstImage = $product->productImages->first(); @endphp
                                <img src="{{ asset('storage/' . $firstImage->image) }}" class="bg-img blur-up lazyload"
                                    alt="">
                            @endif
                        </a>

                    </div>


                </div>
                <div class="product-details">
                    <div class="d-flex justify-content-between">
                        <h3 class="theme-color">{{ Str::ucfirst($product->category->name) }}</h3>
                        <span class="text-primary">{{ $product->quantity }}</span>
                    </div>
                    <div class="rating-details">
                        <span class="font-light grid-content">
                            {{ $product->product_status == '1' ? 'Reserved' : 'Available' }}
                        </span>

                    </div>

                    <div class="main-price">
                        <a href="{{ url('collection', urlencode($product->category->slug) . '/' . urlencode($product->slug)) }}"
                            class="font-default">
                            <h5 class="ms-0">{{ $product->name }}</h5>
                        </a>
                        <div class="listing-content">
                            <span
                                class="font-light">{{ $product->product_status == '1' ? 'Reserved' : 'Available' }}</span>
                            <p class="font-light">{{ $product->description }}</p>
                        </div>

                        <button class="btn listing-content">Reserve Now</button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div>
            <div class="product-box">
                <div class="product-details">
                    <h2>No available product.</h2>
                </div>
            </div>
        </div>
    @endforelse




</div>
