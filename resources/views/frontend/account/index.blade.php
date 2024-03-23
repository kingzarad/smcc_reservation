@extends('layouts.user.index')


@section('content')
    <!-- Breadcrumb section start -->
    <section class="breadcrumb-section section-b-space">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>User Dashboard</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- user dashboard section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs custome-nav-tabs flex-column category-option" id="myTab">
                        <li class="nav-item mb-2">
                            <button class="nav-link font-light active" id="tab" data-bs-toggle="tab"
                                data-bs-target="#dash" type="button"><i class="fas fa-angle-right"></i>Dashboard</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="1-tab" data-bs-toggle="tab" data-bs-target="#order"
                                type="button"><i class="fas fa-angle-right"></i>Reservation</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="2-tab" data-bs-toggle="tab"
                                data-bs-target="#wishlist" type="button"><i
                                    class="fas fa-angle-right"></i>Wishlist</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="3-tab" data-bs-toggle="tab" data-bs-target="#save"
                                type="button"><i class="fas fa-angle-right"></i>Travel Order</button>
                        </li>



                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="5-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" type="button"><i class="fas fa-angle-right"></i>Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link font-light" id="6-tab" data-bs-toggle="tab"
                                data-bs-target="#security" type="button"><i
                                    class="fas fa-angle-right"></i>Security</button>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="filter-button dash-filter dashboard">
                        <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
                    </div>

                    <livewire:frontend.account.index  />

                </div>
            </div>
        </div>
    </section>
    <!-- user dashboard section end -->
@endsection
