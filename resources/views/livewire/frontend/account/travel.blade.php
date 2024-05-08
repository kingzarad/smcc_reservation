<div class="col-lg-9">
    <div class="filter-button dash-filter dashboard">
        <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
    </div>


    <div>

        <div class="save-details-box">
            <div class="row g-3">
                @if ($travelist->isEmpty())
                    <h3><strong>Travel order list is empty.</strong></h3>
                @else
                    <div class="table-dashboard dashboard wish-list-section">

                        <div class="table-responsive">
                            <table class="table cart-table">
                                <thead>
                                    <tr class="table-head">
                                        <th scope="col">Travel Order</th>
                                        <th scope="col">Travel Date</th>
                                        <th scope="col">Travel Time</th>
                                        <th scope="col">Date Filed</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($travelist as $item)
                                        <tr>
                                            <td>

                                                <div class="image-container">
                                                    <img class="img-thumbnail"
                                                        src="{{ asset('storage/' . $item->image) }}"
                                                        alt="Product Image">
                                                </div>

                                            </td>

                                            <td>
                                                <p class="fs-6 m-0">{{ optional(\Carbon\Carbon::parse($item->date))->format('F j, Y') }}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{ optional(\Carbon\Carbon::parse($item->time))->format('g:i A') }}</p>
                                            </td>
                                            <td>
                                                {{ $item->created_at }}
                                            </td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <p class="btn-success text-white btn btn-sm">ACCEPTED</p>
                                                @elseif ($item->status == 1)
                                                    <p class="btn-danger  text-white btn btn-sm">DECLINED</p>
                                                @elseif ($item->status == 2)
                                                    <p class="btn-success text-white btn btn-sm">COMPLETED</p>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ asset('storage/' . $item->image) }}" target="_blank">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
