<div class="dashboard-right">
    <div class="dashboard">
        <div class="page-title title title1 title-effect">
            <h2>My Dashboard</h2>
        </div>
        <div class="welcome-msg">
            <h6 class="font-light">Hello, <span>{{ Auth::user()->username }}</span></h6>
            <p class="font-light">From your My Account Dashboard you have the ability to
                view a snapshot of your recent account activity and update your account
                information. Select a link below to view or edit information.</p>
        </div>

        <div class="order-box-contain my-4">
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="order-box">
                        <div class="order-box-image">
                            <img src="{{ asset('assets_users/images/svg/sent.png') }} "
                                class="img-fluid blur-up lazyload" alt="">
                        </div>
                        <div class="order-box-contain">
                            <img src="{{ asset('assets_users/images/svg/sent1.png') }}"
                                class="img-fluid blur-up lazyload" alt="">
                            <div>
                                <h5 class="font-light">total reservation</h5>
                                <h3>0</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="order-box">
                        <div class="order-box-image">
                            <img src="{{ asset('assets_users/images/svg/box.png') }}" class="img-fluid blur-up lazyload"
                                alt="">

                        </div>
                        <div class="order-box-contain">
                            <img src="{{ asset('assets_users/images/svg/box1.png') }}"
                                class="img-fluid blur-up lazyload" alt="">

                            <div>
                                <h5 class="font-light">pending reservation</h5>
                                <h3>0</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="order-box">
                        <div class="order-box-image">
                            <img src="{{ asset('assets_users/images/svg/wishlist.png') }}"
                                class="img-fluid blur-up lazyload" alt="">
                        </div>
                        <div class="order-box-contain">
                            <img src="{{ asset('assets_users/images/svg/wishlist1.png') }}"
                                class="img-fluid blur-up lazyload" alt="">
                            <div>
                                <h5 class="font-light">wishlist</h5>
                                <h3>0</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-account box-info">
            <div class="box-head">
                <h3>Account Information</h3>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="box">
                        <div class="box-title">
                            <h4>Contact Information</h4><a href="javascript:void(0)">Edit</a>
                        </div>
                        <div class="box-content">
                            <h6 class="font-light">{{ Auth::user()->username }}</h6>
                            <h6 class="font-light">{{ Auth::user()->email }}</h6>
                            <a href="javascript:void(0)">Change Password</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box">
                        <div class="box-title">
                            <h4>Information</h4><a href="javascript:void(0)">Edit</a>
                        </div>
                        <div class="box-content">
                            <h6 class="font-light">You are currently not subscribed to any
                                newsletter.</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
