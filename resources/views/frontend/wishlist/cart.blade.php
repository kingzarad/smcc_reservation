 <!-- Cart Section Start -->
 <section class="cart-section section-b-space">
     <div class="container">
         <div class="row">
             <div class="col-md-12 text-center">
                 @if ($wishlists->isEmpty())
                     <h3><strong>Your wishlist is empty.</strong></h3>
                 @else
                     <table class="table cart-table">
                         <thead>
                             <tr class="table-head">
                                 <th scope="col">image</th>
                                 <th scope="col">product name</th>
                                 <th scope="col">quantity</th>
                                 <th scope="col">action</th>
                             </tr>
                         </thead>
                         <tbody>

                             @foreach ($wishlists as $wishlist)
                                 @if ($wishlist->product && $wishlist->product->category)
                                     <tr>
                                         <td>
                                             <a
                                                 href="{{ url('collection', urlencode($wishlist->product->category->slug) . '/' . urlencode($wishlist->product->slug)) }}">
                                                 @if ($wishlist->product->productImages->isNotEmpty())
                                                     @php $firstImage = $wishlist->product->productImages->first(); @endphp
                                                     <img src="{{ asset('storage/' . $firstImage->image) }}"
                                                         class=" blur-up lazyload" alt="">
                                                 @endif

                                             </a>

                                         </td>
                                         <td>
                                             <a
                                                 href="{{ url('collection', urlencode($wishlist->product->category->slug) . '/' . urlencode($wishlist->product->slug)) }}">{{ $wishlist->product->name }}</a>
                                             <div class="mobile-cart-content row">
                                                 <div class="col">
                                                     <div class="qty-box">
                                                         <div class="input-group">
                                                             <input type="text" name="quantity"
                                                                 class="form-control input-number" value="1">
                                                         </div>
                                                     </div>
                                                 </div>


                                             </div>
                                         </td>

                                         <td>
                                             <div class="qty-box">
                                                 <div class="input-group">
                                                     <input type="number" name="quantity"
                                                         class="form-control input-number" value="1">
                                                 </div>
                                             </div>
                                         </td>

                                         <td>
                                             <button type="button" class="btn border border-0"
                                                 wire:click="removeWishlist({{ $wishlist->id }})">
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
                 @if (!$wishlists->isEmpty())
                     <div class="row">
                         <div class="col-sm-7 col-5 order-1">
                             <div class="left-side-button text-end d-flex d-block justify-content-end">
                                 <a href="javascript:void(0)"
                                     class="text-decoration-underline theme-color d-block text-capitalize">clear
                                     all items</a>
                             </div>
                         </div>
                         <div class="col-sm-5 col-7 d-flex justify-content-between">
                             <div class="left-side-button float-start">
                                 <a href="{{ route('collection') }}"
                                     class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                     <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                             </div>
                             <div class="checkout-button d-none">
                                 <a href="checkout" class="btn btn-solid-default btn fw-bold">
                                     Proceed to reservation <i class="fas fa-arrow-right ms-1"></i></a>
                             </div>
                         </div>
                     </div>
                 @endif
             </div>


         </div>
     </div>
 </section>
