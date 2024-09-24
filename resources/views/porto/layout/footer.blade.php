
<footer class="footer bg-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                <div class="widget">
                    <h4 class="widget-title">Contact Info</h4>
                    <ul class="contact-info">
                        <li>
                            <span class="contact-info-label">Address:</span>
                            <span id="branch-address">
                                @if(Session::has('branch'))
                                    {{ Session::get('branch')->address }}
                                @else
                                  Branch
                                @endif
                            </span>
                        </li>
                        <li>
                            <span class="contact-info-label">Phone:</span>
                            <a href="tel:" id="branch-phone">
                                @if(Session::has('branch'))
                                    {{ Session::get('branch')->phone }}
                                @else
                                    (123) 456-7890
                                @endif
                            </a>
                        </li>
                        <li>
                            <span class="contact-info-label">Name:</span>
                            <span id="branch-name">
                                @if(Session::has('branch'))
                                    {{ Session::get('branch')->name }}
                                @else
                                    Branch
                                @endif
                            </span>
                        </li>
                    </ul>
                                        <div class="social-icons">
                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                        <a href="#" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                    </div>
    <!-- End .social-icons -->
</div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>

                        <ul class="links">
                            <li><a href="#">Help & FAQs</a></li>
                            <li><a href="#">Order Tracking</a></li>
                            <li><a href="#">Shipping & Delivery</a></li>
                            <li><a href="#">Orders History</a></li>
                            <li><a href="#">Advanced Search</a></li>
                            <li><a href="dashboard.html">My Account</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="#">Corporate Sales</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                    <!-- End .widget -->
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-newsletter">
                        <h4 class="widget-title">Subscribe newsletter</h4>
                        <p>Get all the latest information on events, sales and offers. Sign up for newsletter:
                        </p>
                        <form action="#" class="mb-0">
                            <input type="email" class="form-control m-b-3" placeholder="Email address" required>

                            <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                        </form>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .footer-middle -->

    <div class="container">
        <div class="footer-bottom">
            <div class="container d-sm-flex align-items-center">
                <div class="footer-left">
                    <span class="footer-copyright">© Porto eCommerce. 2021. All Rights Reserved</span>
                </div>

                <div class="footer-right ml-auto mt-1 mt-sm-0">
                    <div class="payment-icons">
                        <span class="payment-icon visa" style="background-image: url(assets/images/payments/payment-visa.svg)"></span>
                        <span class="payment-icon paypal" style="background-image: url(assets/images/payments/payment-paypal.svg)"></span>
                        <span class="payment-icon stripe" style="background-image: url(assets/images/payments/payment-stripe.png)"></span>
                        <span class="payment-icon verisign" style="background-image:  url(assets/images/payments/payment-verisign.svg)"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .footer-bottom -->
    </div>
    <!-- End .container -->
</footer>




<!-- End .footer -->