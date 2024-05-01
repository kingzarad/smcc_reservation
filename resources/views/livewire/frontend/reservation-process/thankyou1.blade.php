<div class="col-md-6">
    <div class="col-sm-12 mb-3 table-responsive">
        <h2>Venue/Rooms</h2>
        <table class="table cart-table table-borderless">
            <tbody>
                @foreach ($venue as $venuelist)
                    <tr class="table-order">
                        <td>
                            <p class="font-light">Name</p>
                            <h5>{{ $venuelist->Venue->name }}</h5>
                        </td>
                        <td>
                            <p class="font-light">Quantity</p>
                            <h5>{{ $venuelist->quantity }}</h5>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
        <div class="d-flex mt-3">
            {{ $venue->links(data: ['scrollTo' => false]) }}
        </div>
    </div>

    <div class="col-sm-12 table-responsive">
        <h2>Items</h2>
        <table class="table  cart-table table-borderless">
            <tbody>
                @foreach ($item as $cartlist)
                    <tr class="table-order">
                        <td>
                            <p class="font-light">Name</p>
                            <h5>{{ $cartlist->Items->name }}</h5>
                        </td>
                        <td>
                            <p class="font-light">Quantity</p>
                            <h5>{{ $cartlist->quantity }}</h5>
                        </td>

                    </tr>
                @endforeach


            </tbody>

        </table>
        <div class="d-flex mt-3">
            {{ $item->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>
