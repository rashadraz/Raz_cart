<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{$appsetting->website_name ?? 'RAZ CART'}}</h4>
                    <div class="footer-underline"></div>
                    <p>  We are
                        committed to providing our customers with the best online shopping experience, from browsing to
                        checkout. Thank you for choosing us for your shopping needs.
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{ url('/about-us') }}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{ url('/contact-us') }}" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Sitemaps</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="{{ url('/new-arrivals') }}" class="text-white">New Arrivals
                            Products</a></div>
                    <div class="mb-2"><a href="{{ url('/featured-products') }}" class="text-white">Featured
                            Products</a></div>
                    <div class="mb-2"><a href="{{ url('/cart') }}" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{$appsetting->address ?? '#Mukkam, Kozhikode, Kerala, india - 560077'}}
                            
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{$appsetting->phone1 ?? ' +91 954-XXX-XXXX'}}
                           
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> 
                            {{$appsetting->email1 ?? ' onlineshop@gmail.com'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; {{ date('Y') }} - Raz Cart - Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        @if ($appsetting->facebook)
                        <a href="{{$appsetting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if ($appsetting->twitter)
                        <a href="{{$appsetting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if ($appsetting->instagram)
                        <a href="{{$appsetting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if ($appsetting->youtube)
                        <a href="{{$appsetting->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                       
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
