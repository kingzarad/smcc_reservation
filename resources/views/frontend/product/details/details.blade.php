<section>
    <div class="container">
        <div class="row gx-4 gy-5">
            <div class="col-lg-12 col-12">
                <div class="details-items">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="details-image-1 ratio_asos">
                                        @if ($products->productImages->isNotEmpty())
                                            @php $firstImage = $products->productImages->first(); @endphp
                                            <img src="{{ asset('storage/' . $firstImage->image) }}" id="zoom_01"
                                                class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload"
                                                alt="">
                                        @endif



                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="cloth-details-size">


                                <div class="details-image-concept">
                                    <h2>{{ $products->name }}</h2>
                                </div>

                                <div class="label-section">
                                    <span
                                        class="badge badge-grey-color">{{ $products->product_status == '0' ? 'Available' : 'Reserved' }}</span>
                                </div>
                                <div id="selectSize" class="addeffect-section product-description border-product">
                                    <h6 class="product-title product-title-2 d-block">
                                        <strong>({{ $products->quantity }})
                                            Available quantity</strong>
                                    </h6>
                                    <h6 class="product-title product-title-2 d-block">quantity</h6>

                                    <div class="qty-box">
                                        <div class="input-group">

                                            <span class="input-group-prepend">
                                                <button type="button "
                                                    {{ intval($this->quantityCount) == intval(1) ? 'disabled' : '' }}
                                                    class="btn " wire:click="decrementQuantity">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" wire:model="quantityCount"
                                                class="form-control input-number" value="{{ $this->quantityCount }}">
                                            <span class="input-group-prepend">
                                                <button type="button"
                                                    {{ intval($this->quantityCount) >= intval($products->quantity) ? 'disabled' : '' }}
                                                    wire:click="incrementQuantity" class="btn ">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <button type="button" class="btn btn-solid"
                                        wire:click="addToWishlist({{ $products->id }})">
                                        <i class="fa fa-bookmark fz-16 me-2"></i>
                                        <span>Wishlist</span>
                                    </button>
                                    <button type="button" id="cartEffect" wire:click="addToCart({{ $products->id }})"
                                        class="btn btn-solid hover-solid btn-animation">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Reserve</span>

                                    </button>



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
                                type="button"><span class="text-warning">Description</span></button>

                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="desc">
                            <div class="shipping-chart">
                                <div class="part">
                                    <h4 class="inner-title mb-2">{{ $products->small_description }}</h4>
                                    <p class="font-light">{{ $products->description }}
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
