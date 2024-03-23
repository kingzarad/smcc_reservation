<div>
    <div class="box-head">
        <h3>Profile</h3>
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#resetEmail">Edit</a>
    </div>
    <ul class="dash-profile">


        <li>
            <div class="left">
                <h6 class="font-light">Street Address</h6>
            </div>
            <div class="right">
                <h6>549 Sulphur Springs Road</h6>
            </div>
        </li>

        <li>
            <div class="left">
                <h6 class="font-light">City/State</h6>
            </div>
            <div class="right">
                <h6>Downers Grove, IL</h6>
            </div>
        </li>


    </ul>

    <div class="box-head mt-lg-5 mt-3">
        <h3>Login Details</h3>
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#resetEmail">Edit</a>
    </div>

    <ul class="dash-profile">
        <li>
            <div class="left">
                <h6 class="font-light">Email Address</h6>
            </div>
            <div class="right">
                <h6>{{ Auth::user()->email }}</h6>
            </div>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#resetEmail">Edit</a>
        </li>

        <li>
            <div class="left">
                <h6 class="font-light">Username</h6>
            </div>
            <div class="right">
                <h6>{{ Auth::user()->username }}</h6>
            </div>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#resetEmail">Edit</a>
        </li>

        <li class="mb-0">
            <div class="left">
                <h6 class="font-light">Password</h6>
            </div>
            <div class="right">
                <h6>●●●●●●</h6>
            </div>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#resetEmail">Edit</a>
        </li>
    </ul>
</div>
