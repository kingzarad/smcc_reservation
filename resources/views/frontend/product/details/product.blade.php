<section class="ratio_asos section-b-space overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-lg-4 mb-3">Available For Reservation</h2>
                <div class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space">

                    @forelse ($products_suggest as $suggest)
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a
                                            href="{{ url('collection', urlencode($suggest->category->slug) . '/' . urlencode($suggest->slug)) }}">
                                            @if ($suggest->productImages->isNotEmpty())
                                                @php $firstImage = $suggest->productImages->first(); @endphp
                                                <img src="{{ asset('storage/' . $firstImage->image) }}"
                                                    class="bg-img blur-up lazyload" alt="">
                                            @endif
                                        </a>

                                    </div>


                                </div>
                                <div class="product-details">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="theme-color">{{ Str::ucfirst($suggest->category->name) }}</h3>
                                        <span class="text-primary">{{ $suggest->quantity }}</span>
                                    </div>
                                    <div class="rating-details">
                                        <span
                                            class="font-light grid-content">{{ $suggest->status == '1' ? 'Reserved' : 'Available' }}</span>

                                    </div>
                                    <div class="main-price">
                                        <a href="{{ url('collection', urlencode($suggest->category->slug) . '/' . urlencode($suggest->slug)) }}"
                                            class="font-default">
                                            <h5 class="ms-0">{{ $suggest->name }}</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span
                                                class="font-light">{{ $suggest->status == '1' ? 'Reserved' : 'Available' }}</span>
                                            <p class="font-light">{{ $suggest->description }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1>No Available right now</h1>
                    @endforelse




                </div>
            </div>
        </div>
    </div>
</section>
