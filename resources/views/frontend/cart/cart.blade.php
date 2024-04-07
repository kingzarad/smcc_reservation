<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                @if ($cartlists->isEmpty())
                    <h3><strong>Your cart list is empty.</strong></h3>
                @else
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col" >quantity</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($cartlists as $cartlist)
                                @if ($cartlist->product && $cartlist->product->category)
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ url('collection', urlencode($cartlist->product->category->slug) . '/' . urlencode($cartlist->product->slug)) }}">
                                                @if ($cartlist->product->productImages->isNotEmpty())
                                                    @php $firstImage = $cartlist->product->productImages->first(); @endphp
                                                    <img src="{{ asset('storage/' . $firstImage->image) }}"
                                                        class=" blur-up lazyload" alt="">
                                                @endif

                                            </a>

                                        </td>
                                        <td>
                                            <a
                                                href="{{ url('collection', urlencode($cartlist->product->category->slug) . '/' . urlencode($cartlist->product->slug)) }}">{{ $cartlist->product->name }}</a>

                                        </td>

                                        <td>
                                            <div class="qty-box" >
                                                <div class="input-group d-flex align-items-center">

                                                    <span class="input-group-prepend">
                                                        <button type="button " class="btn btn-sm">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </span>
                                                    <input type="text"  wire:model="quantityCount"
                                                        class="form-control input-number"
                                                        value="{{ $cartlist->quantity }}">
                                                    <span class="input-group-prepend">
                                                        <button type="button" class="btn btn-sm">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <button type="button" class="btn border border-0"
                                                wire:click="removeCartlist({{ $cartlist->id }})">
                                                <i class="fas fa-times"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                @endif
            </div>
            <div class="col-12 mt-md-5 mt-4">
                <div class="row">
                    <div class="col-sm-7 col-5 order-1">
                        <div class="left-side-button text-end d-flex d-block justify-content-end">
                            @if (!$cartlists->isEmpty())
                                <a href="javascript:void(0)"
                                    class="text-decoration-underline theme-color d-block text-capitalize">clear
                                    all items</a>
                            @endif

                        </div>
                    </div>
                    <div class="col-sm-5 col-7 d-flex justify-content-between">
                        <div class="left-side-button float-start">
                            <a href="{{ route('collection') }}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                        </div>
                        @if (!$cartlists->isEmpty())
                            <div class="checkout-button">
                                <button wire:click="processReservation" class="btn btn-solid-default btn fw-bold">
                                    Proceed to reservation <i class="fas fa-arrow-right ms-1"></i></button>
                            </div>
                        @endif

                    </div>
                </div>

            </div>


        </div>
    </div>
</section>
