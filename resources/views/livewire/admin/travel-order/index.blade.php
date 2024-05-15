<div class="card">
    @include('livewire.admin.travel-order.modal')
    <style>
        .bg-success {
            background: #3F8E4E !important;
        }
    </style>
    <div class="card-body p-3">
        <h4 class="card-title">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-muted">TRAVEL ORDER MANAGEMENT</h5>
            </div>
        </h4>
        <div class="mt-3" x-data="{ activeTab: 'PENDING' }">

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-linkx" :class="{ 'active': activeTab === 'PENDING' }"
                        x-on:click="activeTab = 'PENDING'">PENDING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-linkx" :class="{ 'active': activeTab === 'APPROVED' }"
                        x-on:click="activeTab = 'APPROVED'">APPROVED</a>
                </li>

                <li class="nav-item">
                    <a class="nav-linkx" :class="{ 'active': activeTab === 'CANCELLED' }"
                        x-on:click="activeTab = 'CANCELLED'">CANCELLED</a>
                </li>
                <li class="nav-item">
                    <a class="nav-linkx" :class="{ 'active': activeTab === 'COMPLETED' }"
                        x-on:click="activeTab = 'COMPLETED'">COMPLETED</a>
                </li>
            </ul>

            <div class="tab-content mt-2">
                <div x-show="activeTab === 'PENDING'" x-transition>
                    <div class="table-responsived">
                        <table id="datatable" class="table table-borderless">
                            <thead class="bg-gradient-primary text-white">
                                <tr>

                                    <th>Department</th>
                                    <th>Instructor Name</th>
                                    <th>Date Filled</th>

                                    <th>Status</th>

                                    <th style="width:160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservationsList as $index => $item)
                                    @if ($item->status == 2)
                                        <tr>

                                            <td>
                                                {{ Str::ucfirst($item->departname) }}
                                            </td>
                                            <td> {{ $item->name }} </td>
                                            <td>{{ \Carbon\Carbon::parse($item->date_filled)->format('F j, Y') }}</td>

                                            <td>
                                                @if ($item->status == 0)
                                                    <p class="btn-success text-white btn btn-sm">
                                                        ACCEPTED
                                                    </p>
                                                @elseif ($item->status == 2)
                                                    <p class="btn-warning  text-white btn btn-sm">
                                                        PENDING
                                                    </p>
                                                @elseif ($item->status == 1)
                                                    <p class="btn-danger  text-white btn btn-sm">
                                                        DECLINED
                                                    </p>
                                                @elseif ($item->status == 3)
                                                    <p class="btn-success text-white btn btn-sm">
                                                        COMPLETED
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-bs-toggle="modal"
                                                    wire:click="showSingle({{ $item->id }})"
                                                    data-bs-target="#showModal"class="btn btn-sm btn-info">
                                                    <i class="fa-regular fa-eye"></i>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div x-show="activeTab === 'APPROVED'" x-transition>
                    <div class="table-responsived">
                        <table id="datatable1" class="table table-borderless">
                            <thead class="bg-gradient-primary text-white">
                                <tr>

                                    <th>Department</th>
                                    <th>Instructor Name</th>
                                    <th>Date Filled</th>

                                    <th>Status</th>

                                    <th style="width:160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservationsList as $index => $item)
                                    @if ($item->status == 0)
                                        <tr>

                                            <td>
                                                {{ Str::ucfirst($item->departname) }}
                                            </td>
                                            <td> {{ $item->name }} </td>
                                            <td>{{ \Carbon\Carbon::parse($item->date_filled)->format('F j, Y') }}</td>

                                            <td>
                                                @if ($item->status == 0)
                                                    <p class="btn-success text-white btn btn-sm">
                                                        ACCEPTED
                                                    </p>
                                                @elseif ($item->status == 2)
                                                    <p class="btn-warning  text-white btn btn-sm">
                                                        PENDING
                                                    </p>
                                                @elseif ($item->status == 1)
                                                    <p class="btn-danger  text-white btn btn-sm">
                                                        DECLINED
                                                    </p>
                                                @elseif ($item->status == 3)
                                                    <p class="btn-success text-white btn btn-sm">
                                                        COMPLETED
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-bs-toggle="modal"
                                                    wire:click="showSingle({{ $item->id }})"
                                                    data-bs-target="#showModal"class="btn btn-sm btn-info">
                                                    <i class="fa-regular fa-eye"></i>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div x-show="activeTab === 'CANCELLED'" x-transition>
                    <div class="table-responsived">
                        <table id="datatable3" class="table table-borderless">
                            <thead class="bg-gradient-primary text-white">
                                <tr>

                                    <th>Department</th>
                                    <th>Instructor Name</th>
                                    <th>Date Filled</th>

                                    <th>Status</th>

                                    <th style="width:160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservationsList as $index => $item)
                                    @if ($item->status == 1)
                                        <tr>

                                            <td>
                                                {{ Str::ucfirst($item->departname) }}
                                            </td>
                                            <td> {{ $item->name }} </td>
                                            <td>{{ \Carbon\Carbon::parse($item->date_filled)->format('F j, Y') }}</td>

                                            <td>
                                                @if ($item->status == 0)
                                                    <p class="btn-success text-white btn btn-sm">
                                                        ACCEPTED
                                                    </p>
                                                @elseif ($item->status == 2)
                                                    <p class="btn-warning  text-white btn btn-sm">
                                                        PENDING
                                                    </p>
                                                @elseif ($item->status == 1)
                                                    <p class="btn-danger  text-white btn btn-sm">
                                                        DECLINED
                                                    </p>
                                                @elseif ($item->status == 3)
                                                    <p class="btn-success text-white btn btn-sm">
                                                        COMPLETED
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-bs-toggle="modal"
                                                    wire:click="showSingle({{ $item->id }})"
                                                    data-bs-target="#showModal"class="btn btn-sm btn-info">
                                                    <i class="fa-regular fa-eye"></i>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div x-show="activeTab === 'COMPLETED'" x-transition>
                    <div class="table-responsived">
                        <table id="datatable2" class="table table-borderless">
                            <thead class="bg-gradient-primary text-white">
                                <tr>

                                    <th>Department</th>
                                    <th>Instructor Name</th>
                                    <th>Date Filled</th>

                                    <th>Status</th>

                                    <th style="width:160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reservationsList as $index => $item)

                                    @if ($item->status == 3)
                                        <tr>

                                            <td>
                                                {{ Str::ucfirst($item->departname) }}
                                            </td>
                                            <td> {{ $item->name }} </td>
                                            <td>{{ \Carbon\Carbon::parse($item->date_filled)->format('F j, Y') }}</td>

                                            <td>
                                                @if ($item->status == 0)
                                                    <p class="btn-success text-white btn btn-sm">
                                                        ACCEPTED
                                                    </p>
                                                @elseif ($item->status == 2)
                                                    <p class="btn-warning  text-white btn btn-sm">
                                                        PENDING
                                                    </p>
                                                @elseif ($item->status == 1)
                                                    <p class="btn-danger  text-white btn btn-sm">
                                                        DECLINED
                                                    </p>
                                                @elseif ($item->status == 3)
                                                    <p class="btn-success text-white btn btn-sm">
                                                        COMPLETED
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-bs-toggle="modal"
                                                    wire:click="showSingle({{ $item->id }})"
                                                    data-bs-target="#showModal"class="btn btn-sm btn-info">
                                                    <i class="fa-regular fa-eye"></i>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
