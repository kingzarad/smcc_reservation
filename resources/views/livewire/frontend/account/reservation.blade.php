<div class="col-lg-9">
    <div class="filter-button dash-filter dashboard">
        <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
    </div>

    <div class="table-dashboard dashboard wish-list-section">
        <div class="box-head mb-3">
            <h3>My Reservation</h3>
        </div>
        <div class="table-responsive">
            <table class="table cart-table">
                <thead>
                    <tr class="table-head">
                        <th scope="col">Ref #</th>
                        <th scope="col">Username</th>
                        <th scope="col">Date Filed</th>
                        <th scope="col">Status</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservationlists as $item)
                        <tr>
                            <td>
                                {{ $item->reference_num }}
                            </td>

                            <td>
                                <p class="fs-6 m-0">{{ $item->users->username; }}</p>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->date_filled)->format('F j, Y') }}
                            </td>
                            <td>
                                @if ($item->status == 0)
                                    <p class="warning-button btn btn-sm">PENDING</p>
                                @elseif($item->status == 2)
                                    <p class="danger-button btn btn-sm">CANCELLED</p>
                                @else
                                    <p class="success-button btn btn-sm">APPROVED</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('place_reservation', ['reference' => $item->reference_num]) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
