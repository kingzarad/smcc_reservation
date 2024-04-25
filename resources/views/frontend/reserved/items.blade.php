<section class="cart-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if ($reserved == null && $reserved->isEmpty())
                    <p>No reserved items found.</p>
                @else
                    <div>
                        <table class="table cart-table" style="width: 100% !important">
                            <thead>
                                <tr class="table-head">
                                    <th >image</th>
                                    <th> name</th>
                                    <th>quantity</th>
                                    <th>date (from-to)</th>

                                    <th>time (from-to)</th>

                                    <th>time return</th>

                                    <th>date return</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reserved as $cartlist)
                                    @if ($cartlist->reservation->status == 1)
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
                                                {{ \Carbon\Carbon::parse($cartlist->reservation->date_from)->format('F') }}
                                                {{ \Carbon\Carbon::parse($cartlist->reservation->date_from)->format('j') }} -
                                                {{ \Carbon\Carbon::parse($cartlist->reservation->date_to)->format('j, Y') }}
                                            </td>


                                            <td>
                                                {{ \Carbon\Carbon::parse($cartlist->reservation->time_from)->format('g:i A') }} -
                                                {{ \Carbon\Carbon::parse($cartlist->reservation->time_to)->format('g:i A') }}
                                            </td>
                                            <td>

                                                {{ \Carbon\Carbon::parse($cartlist->reservation->time_return)->format('g:i A') }}
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
                @endif
            </div>
            <div class="col-12 mt-md-5 mt-4">

            </div>


        </div>
    </div>
</section>
