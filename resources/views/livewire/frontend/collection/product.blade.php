<!-- Shop Section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            @include('frontend.product.collection.category')

            <div class="category-product col-lg-9 col-12 ratio_30">
                @include('frontend.product.collection.mini-navbar')
                <!-- label and featured section -->

                <!-- Prodcut setion -->
               @include('frontend.product.collection.product-section')

               {{-- Pagination --}}
                {{-- @include('frontend.product.collection.pagination-collection') --}}
            </div>
        </div>
    </div>
</section>
