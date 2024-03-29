<footer class="footer-sm-space mt-5">
    <div class="main-footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer-contact">
                        <div class="brand-logo">
                            <a href="{{ url('/') }}" class="footer-logo float-start">
                                <img src="{{ asset('assets/images/smcc-logo.png') }}"
                                    class="f-logo img-fluid blur-up lazyload" alt="logo">
                            </a>
                        </div>
                        <ul class="contact-lists" style="clear:both;">
                            <li>
                                <span><b>phone:</b> <span class="font-light">Lorem ipsum dolor sit amet.</span></span>
                            </li>
                            <li>
                                <span><b>Address:</b><span class="font-light"> Lorem ipsum dolor sit amet.</span></span>
                            </li>
                            <li>
                                <span><b>Email:</b><span class="font-light"> Lorem ipsum dolor sit amet.</span></span>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- hide section --}}
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 ">
                    <div class="footer-links d-none">
                        <div class="footer-title">
                            <h3>New Categories</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li>
                                    <a href="shop.html" class="font-dark">Latest Shoes</a>
                                </li>
                                <li>
                                    <a href="shop.html" class="font-dark">Branded Jeans</a>
                                </li>
                                <li>
                                    <a href="shop.html" class="font-dark">New Jackets</a>
                                </li>
                                <li>
                                    <a href="shop.html" class="font-dark">Colorfull Hoodies</a>
                                </li>
                                <li>
                                    <a href="shop.html" class="font-dark">Shiner Goggles</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-links d-none">
                        <div class="footer-title">
                            <h3>Get Help</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li>
                                    <a href="#" class="font-dark">Your Reservation</a>
                                </li>
                                <li>
                                    <a href="#" class="font-dark">Your Account</a>
                                </li>

                                <li>
                                    <a href="#" class="font-dark">Your Wishlist</a>
                                </li>
                                <li>
                                    <a href="#" class="font-dark">Reservation FAQs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-links">
                        <div class="footer-title">
                            <h3>About us</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}" class="font-dark">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('collection') }}" class="font-dark">Category</a>
                                </li>
                                <li>
                                    <a href="{{ route('myaccount.reservation') }}" class="font-dark">Reservation</a>
                                </li>
                                <li>
                                    <a href="{{ route('myaccount.travel') }}" class="font-dark">Travel Order</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 d-none d-sm-block">
                    <div class="footer-newsletter">
                        <h3>Let’s stay in touch</h3>
                        <div class="form-newsletter">
                            <div class="input-group mb-4">
                                <input type="text" class="form-control color-4" placeholder="Your Email Address">
                                <span class="input-group-text" id="basic-addon4"><i
                                        class="fas fa-arrow-right"></i></span>
                            </div>
                            <p class="font-dark mb-0">Keep up to date with our latest news and special offers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row gy-3">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <p class="mb-0 font-dark">&copy;{{ date('Y') }} {{ config('app.name', 'SMCC') }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
