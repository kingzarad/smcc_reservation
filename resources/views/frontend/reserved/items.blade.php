<section class="cart-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">quantity</th>
                            <th scope="col">expiration</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reserved as $cartlist)
                            @if ($cartlist->reservation->status  == 1)
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
                                        <h5><a
                                                href="{{ url('collection', urlencode($cartlist->product->category->slug) . '/' . urlencode($cartlist->product->slug)) }}">{{ $cartlist->product->name }}</a>
                                        </h5>
                                    </td>

                                    <td>
                                        <h5>{{ $cartlist->quantity }}</h5>
                                    </td>

                                    <td>

                                        {{ \Carbon\Carbon::parse($cartlist->reservation->date_return)->format('F j, Y') }}
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                {{ $reserved->links() }}
            </div>
            <div class="col-12 mt-md-5 mt-4">

            </div>


        </div>
    </div>
</section>
