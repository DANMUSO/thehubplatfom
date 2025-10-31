<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/TheHub/TheHub/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Sep 2025 08:37:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TheHub Platform</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon --> 
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('Platform/img/salogo-dark.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('Platform/css/bootstrap.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('Platform/css/animate.min.css')}}">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="{{asset('Platform/css/font-awesome.min.css')}}">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="{{asset('Platform/vendor/OwlCarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Platform/vendor/OwlCarousel/owl.theme.default.min.css')}}">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="{{asset('Platform/css/meanmenu.min.css')}}">
    <!-- Magnific CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('Platform/css/magnific-popup.css')}}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('Platform/css/select2.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('Platform/style.css')}}">
    <script>
function showPopup() {
    const popup = document.getElementById('promo-popup-overlay');
    popup.style.display = 'flex';
    
    // Start progress bar
    setTimeout(() => {
        const progressBar = document.getElementById('popup-progress-bar');
        let width = 0;
        const interval = setInterval(() => {
            width += 0.67; // 8 seconds total (100/1.25 = 80 intervals, 80*100ms = 8000ms)
            progressBar.style.width = width + '%';
            
            if (width >= 100) {
                clearInterval(interval);
                closePopup();
            }
        }, 100);
        
        popup.progressInterval = interval;
    }, 500);
}

function closePopup() {
    const popup = document.getElementById('promo-popup-overlay');
    if (popup.progressInterval) {
        clearInterval(popup.progressInterval);
    }
    popup.style.display = 'none';
}

function claimOffer() {
    closePopup();
    // Add analytics tracking here if needed
    window.location.href = 'post-ad.html';
}

// Show popup after 3 seconds
setTimeout(showPopup, 3000);

// Close on outside click
document.addEventListener('click', function(e) {
    if (e.target.id === 'promo-popup-overlay') {
        closePopup();
    }
});
</script>
<style>
    .social-login .btn {
    font-weight: 500;
    padding: 12px 20px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.social-login .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.social-login .btn i {
    margin-right: 8px;
}
/* Force override all spacing */
.compact-container {
    margin: 0 !important;
    padding: 0 !important;
}

.compact-container .row {
    margin-left: -10px !important;
    margin-right: -10px !important;
    margin-bottom: 0 !important;
}

.compact-container [class*="col-"] {
    padding-left: 10px !important;
    padding-right: 10px !important;
    margin-bottom: 20px !important;
}

/* Override the inline styles directly */
.compact-container .product-box div[style] {
    max-width: 250px !important;
    margin: 0 auto !important;
}

.compact-container .product-box div[style*="padding: 16px"] {
    padding: 12px !important;
}

.compact-container .product-box div[style*="height: 180px"] {
    height: 160px !important;
}

/* Reduce card gaps */
.compact-container .item-mb {
    margin-bottom: 15px !important;
}
/* Add this to your <style> section */
@media (max-width: 768px) {
    /* Hide desktop categories on mobile */
    .category-section-desktop {
        display: none !important;
    }
    
    /* Ensure mobile menu appears first */
    .mobile-menu-area {
        order: -1;
    }
}
</style>
</head>

<body>
 
<style>
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
</style>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper">
        <!-- Header Area Start Here -->
        <header>
            <div id="header-three" class="header-style2 header-fixed bg-body">
               <div class="header-top-bar top-bar-style3">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="top-bar-left">
                                    <a href="{{url('postmgt')}}" class="cp-default-btn d-lg-none">Post Your Ad</a>
                                    <p class="d-none d-lg-block">
                                        <i class="fa fa-life-ring" aria-hidden="true"></i>Have any questions? 078 199990 or mail@TheHub
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="top-bar-right">
                                    <ul>
                                         @guest
                                            <li>
                                                <button type="button" class="login-btn" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-lock" aria-hidden="true"></i>Login
                                                </button>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('dashboard') }}" class="login-btn">
                                                    <i class="fa fa-user" aria-hidden="true"></i>{{ Auth::user()->name }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}" class="login-btn"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        @endguest
                                        <li class="hidden-mb">
                                            <a class="login-btn" href="#" id="login-button">
                                                <i class="fa fa-comments-o" aria-hidden="true"></i>Live Chat
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-menu-area" id="sticker">
                    <div class="container">
                        <div class="row no-gutters d-flex align-items-center">
                            <div class="col-lg-2 col-md-2 col-sm-3">
                                <div class="logo-area">
                                    <a href="index.html" class="img-fluid">
                                        <img src="{{asset('Platform/img/logo-dark.png')}}" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-6 possition-static">
                                <div class="cp-main-menu">
                                    <nav>
                                        <ul>
                                           
                           
                                            <li><a href="{{url('/mapview')}}">View All in Map</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 text-right">
                                <a href="{{url('postmgt')}}" class="cp-default-btn">Post Your Ad</a>
                            </div>
                        </div>
                    </div>
                    <div class="search-layout3">
                        <div class="search-layout3-holder">
                            <div class="container">
                                <form id="cp-search-form2" class="bg-primary search-layout3-inner">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="form-group search-input-area input-icon-location">
                                                <select id="location" class="select2">
                                                    <option value="0">Select Location</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-5">
                                            <div class="form-group search-input-area input-icon-keywords">
                                                <input placeholder="Enter Keywords here ..." value="" name="key-word" type="text">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 text-right">
                                            <a href="#" class="cp-search-btn"><i class="fa fa-search" aria-hidden="true"></i>Search</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area Start -->
            <!-- Mobile Menu Area Start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                         <ul>
                            <!-- Add Categories Dropdown Here -->
                            <li><a href="#">Categories</a>
                                <ul>
                                    <li><a href="{{url('/category/electronics')}}">Electronics</a></li>
                                    <li><a href="{{url('/category/fashion')}}">Fashion</a></li>
                                    <li><a href="{{url('/category/home')}}">Home & Garden</a></li>
                                    <li><a href="{{url('/category/vehicles')}}">Vehicles</a></li>
                                    <li><a href="{{url('/category/jobs')}}">Jobs</a></li>
                                    <li><a href="{{url('/category/services')}}">Services</a></li>
                                </ul>
                            </li>
                            
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/')}}">Who We Are</a></li>
                            <li><a href="{{url('/')}}">How It Works?</a></li>
                            <li><a href="{{url('/')}}">Features</a></li>
                            <li><a href="{{url('/')}}">Contact</a></li>
                            <li><a href="{{url('/mapview')}}">View All in Map</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area End -->
            <!-- Mobile Menu Area End -->
        </header>
        <!-- Header Area End Here -->
        <!-- Search Area Start Here -->
        <div class="search-layout3 d-lg-none bg-accent">
            <div class="search-layout3-holder">
                <div class="container">
                    <form id="cp-search-form" class="bg-primary search-layout3-inner">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 mb15--sm">
                                <div class="form-group search-input-area input-icon-location">
                                    <select id="location-header" class="select2">
                                        <option value="0">Select Location</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 col-12 mb15--sm">
                                <div class="form-group search-input-area input-icon-keywords">
                                    <input placeholder="Enter Keywords here ..." value="" name="key-word" type="text">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12 text-right text-left-mb mb15--sm">
                                <a href="#" class="cp-search-btn"><i class="fa fa-search" aria-hidden="true"></i>Search</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Search Area End Here -->
        <!-- Products Area Start Here -->
          <main>
                {{ $slot }}
            </main>
        <!-- Products Area End Here -->
        <!-- Counter Area Start Here -->
        <section class="overlay-default s-space-equal overflow-hidden" style="background-image: url('{{asset('Platform/img/banner/counter-back1.jpg')}}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                            <div>
                                <img src="{{asset('Platform/img/banner/counter1.png')}}" alt="counter" class="img-fluid mb20-auto--md">
                            </div>
                            <div>
                                <div class="counter counter-title" data-num="100000">1,00,000</div>
                                <h3 class="title-regular-light">Our Products</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                            <div>
                                <img src="{{asset('Platform/img/banner/counter2.png')}}" alt="counter" class="img-fluid mb20-auto--md">
                            </div>
                            <div>
                                <div class="counter counter-title" data-num="500000">5,00,000</div>
                                <h3 class="title-regular-light">Our Happy Buyers</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                            <div>
                                <img src="{{asset('Platform/img/banner/counter3.png')}}" alt="counter" class="img-fluid mb20-auto--md">
                            </div>
                            <div>
                                <div class="counter counter-title" data-num="200000">2,00,000</div>
                                <h3 class="title-regular-light">Verified Users</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Counter Area End Here -->
        <!-- Pricing Plan Area Start Here -->
        <section class="bg-body s-space-default">
            <div class="container">
                <div class="section-title-dark">
                    <h2>Start Earning From Things You Don’t Need Anymore</h2>
                    <p>It’s very Simple to choose pricing &amp; Plan</p>
                </div>
                <div class="row d-md-flex">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <div class="pricing-box bg-box">
                            <div class="plan-title">Free Post</div>
                            <div class="price">
                                <span class="currency">KES </span>0
                                <span class="duration">/ Per mo</span>
                            </div>
                            <h3 class="title-bold-dark size-xl">Always FREE Ad Posting</h3>
                            <p>Post as many ads as you like for 30 days without limitations and 100% FREE SUBMIT AD</p>
                            <a href="#" class="cp-default-btn-lg">Submit Ad</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center col-lg-2 col-md-12 col-sm-12 col-12">
                        <div class="other-option bg-primary">or</div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <div class="pricing-box bg-box">
                            <div class="plan-title">Premium Post</div>
                            <div class="price">
                                <span class="currency">KES </span>5000
                                <span class="duration">/ Per mo</span>
                            </div>
                            <h3 class="title-bold-dark size-xl">Featured Ad Posting</h3>
                            <p>Post as many ads as you like for 30 days without limitations and 100% FREE SUBMIT AD</p>
                            <a href="#" class="cp-default-btn-lg">Submit Ad</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Plan Area End Here -->
        <!-- Selling Process Area Start Here -->
        <section class="bg-accent s-space-regular">
            <div class="container">
                <div class="section-title-dark">
                    <h2>How To Start Selling Your Products</h2>
                    <p>It’s very simple to choose pricing &amp; level of exposure on pricing page</p>
                </div>
                <ul class="process-area">
                    <li>
                        <img src="{{asset('Platform/img/banner/process1.png')}}" alt="process" class="img-fluid">
                        <h3>Upload Your Products</h3>
                        <p> Bmply dummy text of the printing and typesing industrypsum been the induse.</p>
                    </li>
                    <li>
                        <img src="{{asset('Platform/img/banner/process2.png')}}" alt="process" class="img-fluid">
                        <h3>Set Your Price</h3>
                        <p> Bmply dummy text of the printing and typesing industrypsum been the induse.</p>
                    </li>
                    <li>
                        <img src="{{asset('Platform/img/banner/process3.png')}}" alt="process" class="img-fluid">
                        <h3>Start Your Business</h3>
                        <p> Bmply dummy text of the printing and typesing industrypsum been the induse.</p>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Selling Process Area End Here -->
        <!-- Subscribe Area Start Here -->
        <section class="bg-body s-space full-width-border-top">
            <div class="container">
                <div class="section-title-dark">
                    <h2 class="size-sm">Receive The Best Offers</h2>
                    <p>Stay in touch with Classified Ads Wordpress Theme and we'll notify you about best ads</p>
                </div>
                <div class="input-group subscribe-area">
                    <input type="text" placeholder="Type your e-mail address" class="form-control">
                    <span class="input-group-addon">
                        <button type="submit" class="cp-default-btn-xl">Subscribe</button>                        
                    </span>
                </div>
            </div>
        </section>

        <!-- Subscribe Area End Here -->
        <!-- Footer Area Start Here -->

        <footer>
            <div class="footer-area-top s-space-equal">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-box">
                                <h3 class="title-medium-light title-bar-left size-lg">About us</h3>
                                <ul class="useful-link">
                                    <li>
                                        <a href="about.html">About us</a>
                                    </li>
                                    <li>
                                        <a href="#">Career</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms &amp; Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Sitemap</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-box">
                                <h3 class="title-medium-light title-bar-left size-lg">How to sell fast</h3>
                                <ul class="useful-link">
                                    <li>
                                        <a href="#">How to sell fast</a>
                                    </li>
                                    <li>
                                        <a href="#">Buy Now on TheHub</a>
                                    </li>
                                    <li>
                                        <a href="#">Membership</a>
                                    </li>
                                    <li>
                                        <a href="#">Banner Advertising</a>
                                    </li>
                                    <li>
                                        <a href="#">Promote your ad</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-box">
                                <h3 class="title-medium-light title-bar-left size-lg">Help &amp; Support</h3>
                                <ul class="useful-link">
                                    <li>
                                        <a href="#">Live Chat</a>
                                    </li>
                                    <li>
                                        <a href="faq.html">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="#">Stay safe on TheHub</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-box">
                                <h3 class="title-medium-light title-bar-left size-lg">Follow Us On</h3>
                                <ul class="folow-us">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('Platform/img/footer/follow1.jpg')}}" alt="follow">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('Platform/img/footer/follow2.jpg')}}" alt="follow">
                                        </a>
                                    </li>
                                </ul>
                                <ul class="social-link">
                                    <li class="fa-TheHub">
                                        <a href="#">
                                            <img src="{{asset('Platform/img/footer/facebook.jpg')}}" alt="social">
                                        </a>
                                    </li>
                                    <li class="tw-TheHub">
                                        <a href="#">
                                            <img src="{{asset('Platform/img/footer/twitter.jpg')}}" alt="social">
                                        </a>
                                    </li>
                                    <li class="yo-TheHub">
                                        <a href="#">
                                            <img src="{{asset('Platform/img/footer/youtube.jpg')}}" alt="social">
                                        </a>
                                    </li>
                                    <li class="pi-TheHub">
                                        <a href="#">
                                            <img src="{{asset('Platform/img/footer/pinterest.jpg')}}" alt="social">
                                        </a>
                                    </li>
                                    <li class="li-TheHub">
                                        <a href="#">
                                            <img src="{{asset('Platform/img/footer/linkedin.jpg')}}" alt="social">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-center-mb">
                            <p>Copyright © TheHub</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-right text-center-mb">
                            <ul>
                                <li>
                                    <img src="{{asset('Platform/img/footer/card1.jpg')}}" alt="card">
                                </li>
                                <li>
                                    <img src="{{asset('Platform/img/footer/card2.jpg')}}" alt="card">
                                </li>
                                <li>
                                    <img src="{{asset('Platform/img/footer/card3.jpg')}}" alt="card">
                                </li>
                                <li>
                                    <img src="{{asset('Platform/img/footer/card4.jpg')}}" alt="card">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End Here -->
    </div>
    <!-- Modal Start-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="title-default-bold mb-none">Login</div>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <!-- Social Login Buttons -->
                    <div class="social-login mb-4">
                        <a href="{{ route('social.auth', 'google') }}" class="btn btn-danger btn-block mb-2">
                            <i class="fa fa-google"></i> Continue with Google
                        </a>
                        <a href="{{ route('social.auth', 'facebook') }}" class="btn btn-primary btn-block mb-2">
                            <i class="fa fa-facebook"></i> Continue with Facebook
                        </a>
                        <a href="{{ route('social.auth', 'twitter') }}" class="btn btn-info btn-block mb-3">
                            <i class="fa fa-twitter"></i> Continue with Twitter
                        </a>
                        
                        <div class="text-center mb-3">
                            <span class="text-muted">or</span>
                        </div>
                    </div>

                    <!-- Traditional Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label>Username or email address *</label>
                        <input type="email" name="email" placeholder="Email" required />
                        <label>Password *</label>
                        <input type="password" name="password" placeholder="Password" required />
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox1" type="checkbox" name="remember">
                            <label for="checkbox1">Remember Me</label>
                        </div>
                        <button class="default-big-btn" type="submit">Login</button>
                        <button class="default-big-btn form-cancel" type="button" data-dismiss="modal">Cancel</button>
                        <label class="lost-password"><a href="{{ route('password.request') }}">Lost your password?</a></label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal End-->
    <!-- Report Abuse Modal Start-->
    <div class="modal fade" id="report_abuse" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content report-abuse-area radius-none">
                <div class="gradient-wrapper">
                    <div class="gradient-title">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="item-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>There's Something Wrong With This Ads?</h2>
                    </div>
                    <div class="gradient-padding reduce-padding">
                        <form id="report-abuse-form">
                            <div class="form-group">
                                <label class="control-label" for="first-name">Your E-mail</label>
                                <input type="text" id="first-name" class="form-control" placeholder="Type your mail here ...">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">Your Reason</label>
                                    <textarea placeholder="Type your reason..." class="textarea form-control" name="message" id="form-message" rows="7" cols="20" data-error="Message field is required" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="cp-default-btn-sm">Submit Now!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Report Abuse Modal End-->
    <!-- jquery-->
    <script src="{{asset('Platform/js/jquery-3.2.1.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('Platform/js/popper.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('Platform/js/bootstrap.min.js')}}"></script>
    <!-- Owl Cauosel JS -->
    <script src="{{asset('Platform/vendor/OwlCarousel/owl.carousel.min.js')}}"></script>
    <!-- Meanmenu Js -->
    <script src="{{asset('Platform/js/jquery.meanmenu.min.js')}}"></script>
    <!-- Srollup js -->
    <script src="{{asset('Platform/js/jquery.scrollUp.min.js')}}"></script>
    <!-- jquery.counterup js -->
    <script src="{{asset('Platform/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('Platform/js/waypoints.min.js')}}"></script>
    <!-- Select2 Js -->
    <script src="{{asset('Platform/js/select2.min.js')}}"></script>
    <!-- Isotope js -->
    <script src="{{asset('Platform/js/isotope.pkgd.min.js')}}"></script>
    <!-- Magnific Popup -->
     <script src="{{asset('Platform/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('Platform/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('Platform/js/main.js')}}"></script>
</body>


<!-- Mirrored from www.radiustheme.com/demo/html/TheHub/TheHub/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Sep 2025 08:37:13 GMT -->
</html>