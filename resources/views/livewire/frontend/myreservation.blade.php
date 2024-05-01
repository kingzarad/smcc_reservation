<div class="">
    <style>
        .pending {
            background-color: #D1A110;
            color: #ffff !important;
        }

        .approved {

            color: #333 !important;
        }

        .scroll {

            padding: 5px;
            max-height: 500px;

            /* Adjust based on your needs */
            overflow-y: scroll;
            /* Enables vertical scrolling */
        }
    </style>
    <div class="login-wrapper  shadow" style="width: 100%; ">
        <div class="d-flex justify-content-center login-title">
            <h5>{{ __('ACTIVE RESERVATION ') }}</h5>
        </div>
        <div class="login-container scroll  table-responsive" style="height: 1000px !important;">
            <table class="table cart-table p-3 ">

                <tbody>
                    @foreach ($reserv as $item)
                        <tr>
                            <td style="text-align: left !important; padding: 20px !important;">
                                <small>
                                    <span
                                        class="badge {{ $item->status == 0 ? 'bg-warning' : ($item->status == 1 ? 'bg-success' : 'bg-danger') }}
                                        ">
                                        {{ $item->status == 0 ? 'Pending' : ($item->status == 1 ? 'Approved' : 'Canceled') }}
                                    </span>
                                    <br>
                                    {{ $item->venue }} <br>
                                    {{ $item->item }} <br>
                                    {{ $item->date }}<br>
                                    {{ $item->time }}<br>
                                </small>
                            </td>
                            <td style=" padding: 0px 20px 0px 0px !important;">
                                <a href="{{ route('place_reservation', ['reference' => $item->ref]) }}">
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
