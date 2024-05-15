<div class="card">
    <style>
        .bg-success {
            background: #3F8E4E !important;
        }
    </style>
    <div class="card-body p-3">
        <h4 class="card-title">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold ">RESERVATION REPORTS</h5>
            </div>
        </h4>
        <hr>
        <div class="row mt-2 g-3">

            <div class="col-lg-auto row">
                <div class="col-auto ">
                    <label class="form-control-plaintext">Department:</label>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm p-1">
                        <select class="form-select" id="hhdepartment" style="width:12em">
                            <option value="all">All</option>
                            @foreach ($department as $value)
                                <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

            </div>
            <div class="col-lg-auto row">
                <div class="col-auto ">
                    <label class="form-control-plaintext">Venue:</label>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm p-1">
                        <select class="form-select" id="hhvenue" style="width:12em">
                            <option value="all">All</option>
                            @foreach ($venue_list as $value)
                                <option value="{{ $value->name }}">
                                    {{ Str::ucfirst(Str::lower($value->name)) }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

            </div>
            <div class="col-lg-auto row">
                <div class="col-auto ">
                    <label class="form-control-plaintext">Items:</label>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm p-1">
                        <select class="form-select" id="hhitem" style="width:12em">
                            <option value="all">All</option>
                            @foreach ($item_list as $value)
                                <option value="{{ $value->name }}">
                                    {{ Str::ucfirst(Str::lower($value->name)) }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

            </div>
            <div class="col-lg-auto row">

                <div class="col-auto">
                    <label class="form-control-plaintext">From:</label>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm p-1 ">
                        <input type="date" class="form-control" id="from-filter">
                    </div>
                </div>
                <div class="col-auto">
                    <label class="form-control-plaintext">To:</label>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm p-1 ">
                        <input type="date" class="form-control" id="to-filter">
                    </div>
                </div>





            </div>


        </div>
        <hr>
        <div id="printContainer">

            <div class="table-responsived">
                <table id="datatable_report" class="table table-borderless w-100">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>DEPARMENT</th>
                            <th>NAME</th>
                            <th>VENUE LIST</th>
                            <th>ITEM LIST</th>
                            <th>HOURS</th>
                            <th>TIME USAGE (FROM - TO)</th>
                            <th>DATE USAGE (FROM - TO)</th>
                            <th>FILED DATE</th>

                            <th class="d-none exclude-print">DEPART RAW</th>
                            <th class="d-none exclude-print">VENUE RAW</th>
                            <th class="d-none exclude-print">ITEM RAW</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reserv as $index => $item)
                            <tr>
                                <td>{{ $item->departname->department_name }}</td>
                                <td>{{ $item->name ?? '' }}</td>
                                <td>{{ $item->Venue ?? '' }}</td>
                                <td>{{ $item->Items ?? '' }}</td>

                                <td>{{ $item->hours ?? '' }}</td>
                                <td>{{ $item->usagetime ?? '' }}</td>
                                <td>{{ $item->usagedate ?? '' }}</td>
                                <td>{{ $item->date ?? '' }}</td>

                                <td class="d-none">
                                    {{ $item->depart ?? '' }}
                                </td>
                                <td class="d-none">
                                    {{ $item->VenueRaw ?? '' }}
                                </td>
                                <td class="d-none">
                                    {{ $item->ItemRaw ?? '' }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--
    <div class="mx-3 m-2" x-data="{ activeTab: 'RESERVATION' }">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-linkx" :class="{ 'active': activeTab === 'RESERVATION' }"
                    x-on:click="activeTab = 'RESERVATION'">RESERVATION</a>
            </li>

            <li class="nav-item">
                <a class="nav-linkx" :class="{ 'active': activeTab === 'TO' }"
                    x-on:click="activeTab = 'TO'">TRAVEL ORDER</a>
            </li>

        </ul>


        <div class="tab-content">
            <div id="RESERVATION" x-show="activeTab === 'RESERVATION'" x-transition>
                <div class="card-body p-3">
                    <h4 class="card-title">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="m-0 font-weight-bold ">RESERVATION REPORTS</h5>
                        </div>
                    </h4>
                    <hr>
                    <div class="row mt-2 g-3">

                        <div class="col-lg-auto row">
                            <div class="col-auto ">
                                <label class="form-control-plaintext">Department:</label>
                            </div>
                            <div class="col-auto">
                                <div class="input-group input-group-sm p-1">
                                    <select class="form-select" id="hhdepartment" style="width:12em">
                                        <option value="all">All</option>
                                        @foreach ($department as $value)
                                            <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-auto row">
                            <div class="col-auto ">
                                <label class="form-control-plaintext">Venue:</label>
                            </div>
                            <div class="col-auto">
                                <div class="input-group input-group-sm p-1">
                                    <select class="form-select" id="hhvenue" style="width:12em">
                                        <option value="all">All</option>
                                        @foreach ($venue_list as $value)
                                            <option value="{{ $value->name }}">
                                                {{ Str::ucfirst(Str::lower($value->name)) }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-auto row">
                            <div class="col-auto ">
                                <label class="form-control-plaintext">Items:</label>
                            </div>
                            <div class="col-auto">
                                <div class="input-group input-group-sm p-1">
                                    <select class="form-select" id="hhitem" style="width:12em">
                                        <option value="all">All</option>
                                        @foreach ($item_list as $value)
                                            <option value="{{ $value->name }}">
                                                {{ Str::ucfirst(Str::lower($value->name)) }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-auto row">

                            <div class="col-auto">
                                <label class="form-control-plaintext">From:</label>
                            </div>
                            <div class="col-auto">
                                <div class="input-group input-group-sm p-1 ">
                                    <input type="date" class="form-control" id="from-filter">
                                </div>
                            </div>
                            <div class="col-auto">
                                <label class="form-control-plaintext">To:</label>
                            </div>
                            <div class="col-auto">
                                <div class="input-group input-group-sm p-1 ">
                                    <input type="date" class="form-control" id="to-filter">
                                </div>
                            </div>





                        </div>


                    </div>
                    <hr>
                    <div id="printContainer">

                        <div class="table-responsived">
                            <table id="datatable_report" class="table table-borderless w-100">
                                <thead class="bg-gradient-primary text-white">
                                    <tr>
                                        <th>DEPARMENT</th>
                                        <th>NAME</th>
                                        <th>VENUE LIST</th>
                                        <th>ITEM LIST</th>
                                        <th>HOURS</th>
                                        <th>TIME USAGE (FROM - TO)</th>
                                        <th>DATE USAGE (FROM - TO)</th>
                                        <th>FILED DATE</th>

                                        <th class="d-none exclude-print">DEPART RAW</th>
                                        <th class="d-none exclude-print">VENUE RAW</th>
                                        <th class="d-none exclude-print">ITEM RAW</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reserv as $index => $item)
                                        <tr>
                                            <td>{{ $item->departname->department_name }}</td>
                                            <td>{{ $item->name ?? '' }}</td>
                                            <td>{{ $item->Venue ?? '' }}</td>
                                            <td>{{ $item->Items ?? '' }}</td>

                                            <td>{{ $item->hours ?? '' }}</td>
                                            <td>{{ $item->usagetime ?? '' }}</td>
                                            <td>{{ $item->usagedate ?? '' }}</td>
                                            <td>{{ $item->date ?? '' }}</td>

                                            <td class="d-none">
                                                {{ $item->depart ?? '' }}
                                            </td>
                                            <td class="d-none">
                                                {{ $item->VenueRaw ?? '' }}
                                            </td>
                                            <td class="d-none">
                                                {{ $item->ItemRaw ?? '' }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'TO'" x-transition>
                <div class="card-body p-3">
                    <h4 class="card-title">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="m-0 font-weight-bold ">TRAVEL ORDER REPORTS</h5>
                        </div>
                    </h4>
                    <hr>
                    <div class="row mt-2 g-3">


                        <div class="col-lg-auto row">
                            <div class="col-auto ">
                                <label class="form-control-plaintext">Venue:</label>
                            </div>
                            <div class="col-auto">
                                <div class="input-group input-group-sm p-1">
                                    <select class="form-select" id="hhvenue" style="width:12em">
                                        <option value="all">All</option>
                                        @foreach ($venue_list as $value)
                                            <option value="{{ $value->name }}">
                                                {{ Str::ucfirst(Str::lower($value->name)) }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-auto row">

                            <div class="col-auto">
                                <label class="form-control-plaintext">From:</label>
                            </div>
                            <div class="col-auto">
                                <div class="input-group input-group-sm p-1 ">
                                    <input type="date" class="form-control" id="from-filter">
                                </div>
                            </div>
                            <div class="col-auto">
                                <label class="form-control-plaintext">To:</label>
                            </div>
                            <div class="col-auto">
                                <div class="input-group input-group-sm p-1 ">
                                    <input type="date" class="form-control" id="to-filter">
                                </div>
                            </div>





                        </div>


                    </div>
                    <hr>
                    <div id="printContainer">

                        <div class="table-responsived">
                            <table id="datatable_report1" class="table table-borderless w-100">
                                <thead class="bg-gradient-primary text-white">
                                    <tr>

                                        <th>NAME</th>
                                        <th>Vehicle </th>
                                        <th>TIME </th>
                                        <th>DATE</th>

                                        <th class="d-none exclude-print">DEPART RAW</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($travelorderList as $index => $item)
                                        <tr>
                                            <td>{{ $item->name ?? '' }}</td>
                                            <td>{{ $item->Vehicle ?? '' }}</td>
                                            <td>{{ $item->usagetime ?? '' }}</td>
                                            <td>{{ $item->usagedate ?? '' }}</td>

                                            <td class="d-none">
                                                {{ $item->depart ?? '' }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}




</div>
