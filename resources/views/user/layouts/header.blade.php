<div id="main-menu" class="wa-main-menu">
    <!-- Menu -->
    <div class="wathemes-menu relative">
        <!-- navbar -->
        <div class="navbar navbar-default theme-bg mar0" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <div class="body-menu-1">
                                <!-- Button For Responsive toggle -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span>
                                </button> 
                                <!-- Logo -->
                                <a class="navbar-brand" href="{{ route('home') }}">
                                    <figure>
                                        <img class="site_logo hidden-xs" src="{{ asset('user/assets/img/logo.png') }}" alt="Site Logo">
                                        <img class="site_logo hidden-md hidden-lg hidden-sm" src="{{ asset('user/assets/img/menu-logo.png') }}" alt="Site Logo">
                                    </figure>
                                </a>
                                <div class="search-icon s-icon mobail hidden-lg hidden-sm hidden-md">
                                    <a href="index.html#" class="opencart" ><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span class="cart-quantity-box">02</span></a>
                                    <div class="add-cart-section">
                                        <a href="index.html#" class="mini-close-icons miniclose"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        <div class="cart-main-box">
                                            <div class="cart-img-box">
                                                <figure>
                                                    <img src="assets/img/all/cart-img.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="cart-itam-name">
                                                <h4>Body Product</h4>
                                                <p>1 x $50.00
                                                <p>
                                            </div>
                                        </div>
                                        <div class="cart-main-box marT30">
                                            <div class="cart-img-box">
                                                <figure>
                                                    <img src="assets/img/all/cart-img.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="cart-itam-name">
                                                <h4>Body Product</h4>
                                                <p>1 x $50.00
                                                <p>
                                            </div>
                                        </div>
                                        <div class="pro-total-price padT30">
                                            <span class="total-price-left">Total</span>
                                            <span class="total-price-right">$100</span>
                                        </div>
                                        <div class="mini-btn  padT30">
                                            <a href="index.html#" class="itg-button-2">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Navbar Collapse -->
                        <div class="navbar-collapse collapse body-menu-section">
                            <!-- nav -->
                            <ul class="nav navbar-nav menu-section">
                                <li><a href="{{ route('home') }}">home</a></li>
                                <li><a href="{{ route('about') }}">about us</a></li>
                                <li><a href="{{ route('class') }}">classes</a></li>
                                <li><a href="{{ route('trainer') }}">Trainer</a></li>
                                <li><a href="{{ route('product') }}">Product</a></li>
                                <li><a href="{{ route('contact') }}">Contact us</a></li>
                                {{-- <li>
                                    <a href="index.html#">Shop</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="collection.html">Collection Full</a></li>
                                        <li><a href="our-collection-with-sidebar.html">Collection With Sidebar</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="check-out.html">Check Out</a></li>
                                        <li><a href="order-page.html">Order</a></li>
                                        <li><a href="product-page.html">Product Detail</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li class="hidden-xs">
                                    <a href="index.html#" class="opencart hidden-xs"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span class="cart-quantity-box">02</span></a>
                                    <div class="add-cart-section">
                                        <a href="index.html#" class="mini-close-icons miniclose"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        <div class="cart-main-box">
                                            <div class="cart-img-box">
                                                <figure>
                                                    <img src="assets/img/all/cart-img.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="cart-itam-name">
                                                <h4>Body Product</h4>
                                                <p>1 x $50.00
                                                <p>
                                            </div>
                                        </div>
                                        <div class="cart-main-box marT30">
                                            <div class="cart-img-box">
                                                <figure>
                                                    <img src="assets/img/all/cart-img.jpg" alt="">
                                                </figure>
                                            </div>
                                            <div class="cart-itam-name">
                                                <h4>Body Product</h4>
                                                <p>1 x $50.00
                                                <p>
                                            </div>
                                        </div>
                                        <div class="pro-total-price padT30">
                                            <span class="total-price-left">Total</span>
                                            <span class="total-price-right">$100</span>
                                        </div>
                                        <div class="mini-btn  padT30">
                                            <a href="index.html#" class="itg-button-2">Checkout</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="search-icon s-icon hidden-xs">
                                    <a href="index.html#" class="addClass"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="serach-popup-box">
                            <div id="qnimate" class="off-box">
                                <div id="search" class="open">
                                    <button data-widget="remove" id="removeClass" class="close" type="button">×</button>
                                    <form autocomplete="off">
                                        <input type="text" placeholder="Type search keywords here" value="" name="term" id="term">
                                        <button class="btn btn-lg btn-site itg-button-2" type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- navbar-collapse -->  
                    </div>
                </div>
                <!-- col-md-12 -->                           
            </div>
            <!-- container -->
        </div>
        <!-- navbar -->
    </div>
    <!--  Menu -->
</div>