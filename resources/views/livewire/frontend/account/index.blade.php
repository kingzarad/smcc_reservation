<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="dash">
        @include('frontend.account.dashboard')
    </div>

    <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="order">
        @include('frontend.account.reservation')
    </div>

    <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="wishlist">
        @include('frontend.account.wishlist')
    </div>

    <div class="tab-pane fade dashboard" id="save">
        @include('frontend.account.travel_order')
    </div>


    <div class="tab-pane fade dashboard-profile dashboard" id="profile">
        @include('frontend.account.profile')
    </div>

    <div class="tab-pane fade dashboard-security dashboard" id="security">
        @include('frontend.account.security')
    </div>
</div>
