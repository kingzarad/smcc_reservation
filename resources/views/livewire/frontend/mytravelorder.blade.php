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
            <h5>{{ __('TRAVEL ORDER') }}</h5>
        </div>
        <div class="login-container scroll  table-responsive" style="height: 1000px !important;">
            <table class="table cart-table p-3 ">

                <tbody>
                    @forelse ($travel as $item)
                        <tr>
                            <td style="text-align: left !important; padding: 20px !important;">
                                <small>
                                    <span class="badge {{ $item->status == 1 ? 'bg-warning' : 'bg-success' }}">
                                        {{ $item->status == 1 ? 'Pending' : 'Approved' }}
                                    </span>
                                    <br>
                                    {{ $item->time }} <br>
                                    {{ $item->date }} <br>

                                </small>
                            </td>
                            <td style=" padding: 0px 20px 0px 0px !important;">
                                <a href="{{ route('place_reservation', ['reference' => $item->ref]) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" style="text-align: center;">No active travel order</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>


</div>
