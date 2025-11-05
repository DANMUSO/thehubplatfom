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
    document.body.classList.add('popup-open'); // Prevent scroll
    
    // Start progress bar
    setTimeout(() => {
        const progressBar = document.getElementById('popup-progress-bar');
        let width = 0;
        const interval = setInterval(() => {
            width += 0.67;
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
    document.body.classList.remove('popup-open'); // Re-enable scroll
}

function claimOffer() {
    closePopup();
    window.location.href = '{{ url("postmgt") }}';
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

   /* Desktop spacing for content */
@media (min-width: 992px) {
    .s-space-bottom-full {
        padding-top: 80px !important;
    }
    
    .s-space-bottom-full .container {
        padding-top: 150px !important;
    }
}
  /* ==========================================
   PROFESSIONAL MOBILE HEADER - COMPLETE REDESIGN
   ========================================== */

@media (max-width: 991px) {
    
    /* Hide desktop categories */
    .category-section-desktop {
        display: none !important;
    }
    
    /* ===== TOP CONTACT BAR ===== */
    .header-top-bar {
        background: #00897b;
        padding: 0;
    }

    .header-top-bar .container {
        padding: 10px 15px;
        max-width: 100%;
    }
    
    .header-top-bar .row {
        margin: 0;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }
    
    /* Left side - Contact info */
    .header-top-bar .col-6,
    .header-top-bar .col-lg-6,
    .header-top-bar .col-md-6,
    .header-top-bar .col-sm-6 {
        flex: 0 0 50% !important;
        max-width: 50% !important;
        padding: 0 5px !important;
    }
    
    .top-bar-left {
        text-align: left !important;
    }
    
    .top-bar-left .cp-default-btn {
        display: none !important;
    }

    .top-bar-left p {
        display: block !important;
        font-size: 11px !important;
        margin: 0 !important;
        color: #fff;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .top-bar-left p i {
        margin-right: 5px;
        font-size: 12px;
    }
    
    /* Right side - Login & Live Chat */
    .top-bar-right {
        text-align: right !important;
        width: 100%;
    }
    
    .top-bar-right ul {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 8px;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .top-bar-right ul li {
        display: inline-block;
        margin: 0;
    }
    
    .top-bar-right .login-btn {
        font-size: 11px !important;
        padding: 6px 12px !important;
        white-space: nowrap;
        background: rgba(255,255,255,0.2);
        border: 1px solid rgba(255,255,255,0.3);
        color: #fff !important;
        border-radius: 4px;
        display: inline-flex;
        align-items: center;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .top-bar-right .login-btn:hover {
        background: rgba(255,255,255,0.3);
        border-color: rgba(255,255,255,0.4);
    }

    .top-bar-right .login-btn i {
        margin-right: 5px;
        font-size: 12px;
    }
    
    /* Show live chat */
    .top-bar-right .hidden-mb {
        display: inline-block !important;
    }
    
    /* ===== MAIN HEADER WITH LOGO ===== */
    .main-menu-area {
        background: #fff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .main-menu-area .container {
        padding: 12px 15px;
        max-width: 100%;
    }
    
    .main-menu-area .row {
        margin: 0;
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }
    
    /* Logo column - Make it visible and centered */
    .main-menu-area .col-lg-2,
    .main-menu-area .col-md-2,
    .main-menu-area .col-sm-3 {
        flex: 1 1 auto !important;
        max-width: none !important;
        padding: 0 10px !important;
        order: 2 !important;
        display: block !important;
    }
    
    /* Specifically target the logo column to ensure it shows */
    .main-menu-area .row > .col-lg-2:first-child,
    .main-menu-area .row > .col-md-2:first-child,
    .main-menu-area .row > .col-sm-3:first-child {
        order: 1 !important;
        flex: 0 0 auto !important;
        width: auto !important;
        padding: 0 5px !important;
    }
    
    .logo-area {
        text-align: center !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        width: 100% !important;
        position: relative !important;
        z-index: 10 !important;
    }
    
    .logo-area a {
        display: inline-block !important;
    }

    .logo-area img {
        max-width: 110px !important;
        height: auto !important;
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
    
    /* Hide desktop nav */
    .main-menu-area .col-lg-8,
    .main-menu-area .col-md-8,
    .main-menu-area .col-sm-6 {
        display: none !important;
    }
    
    /* Post Ad button - RIGHT */
    .main-menu-area .text-right {
        flex: 0 0 auto !important;
        max-width: none !important;
        text-align: right !important;
        padding: 0 !important;
        order: 3;
    }
    
    .main-menu-area .cp-default-btn {
        font-size: 11px !important;
        padding: 8px 14px !important;
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        background: #ffa726;
        color: #fff !important;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(255, 167, 38, 0.3);
    }

    .main-menu-area .cp-default-btn:hover {
        background: #fb8c00;
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(255, 167, 38, 0.4);
    }
    
    /* ===== HAMBURGER MENU ICON ===== */
    .mobile-menu-area {
        background: transparent;
        padding: 0;
        border: none;
        position: static;
    }

    .mobile-menu-area .container {
        padding: 0;
        max-width: 100%;
    }

    .mobile-menu-area .row {
        margin: 0;
    }

    .mobile-menu-area .mobile-menu {
        background: #fff;
    }
    
    .mean-container {
        position: relative;
        width: 100%;
    }
    
    .mean-container .meanmenu-reveal {
        position: relative !important;
        display: flex !important;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: transparent !important;
        color: #333 !important;
        padding: 8px !important;
        border: none !important;
        cursor: pointer;
        width: 36px;
        height: 36px;
        border-radius: 4px;
        transition: all 0.3s ease;
        top: auto !important;
        left: auto !important;
        right: auto !important;
        transform: none !important;
    }

    .mean-container .meanmenu-reveal:hover {
        background: #f5f5f5 !important;
    }

    .mean-container .meanmenu-reveal span {
        background: #333 !important;
        height: 2px;
        width: 20px;
        margin: 2px 0;
        border-radius: 2px;
        display: block;
        transition: all 0.3s ease;
    }
    
    .mean-container .mean-nav {
        background: #fff;
        margin-top: 0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    /* ===== MOBILE MENU ITEMS ===== */
    .mobile-menu nav ul {
        background: #fff;
        padding: 0;
        margin: 0;
    }
    
    .mobile-menu nav ul li {
        border-bottom: 1px solid #f0f0f0;
    }
    
    .mobile-menu nav ul li a {
        padding: 14px 20px;
        font-size: 14px;
        color: #333;
        font-weight: 500;
        transition: all 0.3s ease;
        display: block;
        text-decoration: none;
    }

    .mobile-menu nav ul li a:hover {
        background: linear-gradient(90deg, rgba(0, 137, 123, 0.08) 0%, transparent 100%);
        color: #00897b;
        padding-left: 25px;
    }

    /* Submenu */
    .mobile-menu nav ul ul {
        background: #f8f9fa;
    }
    
    .mobile-menu nav ul ul li a {
        padding-left: 35px;
        font-size: 13px;
        font-weight: 400;
        color: #555;
    }

    .mobile-menu nav ul ul li a:hover {
        padding-left: 40px;
        background: #f0f0f0;
    }
    
    /* ===== SEARCH SECTION ===== */
    .search-layout3.d-lg-none {
        display: block !important;
        margin: 0;
        padding: 0;
        background: #f8f9fa;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .search-layout3-holder {
        padding: 0;
    }

    .search-layout3-inner {
        padding: 16px !important;
        background: #fff !important;
        border-radius: 0 !important;
        box-shadow: none !important;
    }
    
    .search-layout3 .row {
        margin: 0 -6px;
    }
    
    .search-layout3 [class*="col-"] {
        padding: 0 6px;
    }
    
    .search-layout3 .form-group {
        margin-bottom: 10px;
    }

    .search-layout3 .select2,
    .search-layout3 input[type="text"] {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        background: #fafafa;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .search-layout3 .select2:focus,
    .search-layout3 input[type="text"]:focus {
        border-color: #00897b;
        background: #fff;
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 137, 123, 0.1);
    }
    
    .search-layout3 .cp-search-btn {
        width: 100%;
        text-align: center;
        padding: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #00897b;
        color: #fff;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(0, 137, 123, 0.25);
        border: none;
    }

    .search-layout3 .cp-search-btn:hover {
        background: #00695c;
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(0, 137, 123, 0.35);
    }

    .search-layout3 .cp-search-btn i {
        margin-right: 6px;
    }

    /* Fix layout */
    .header-style2.header-fixed {
        position: relative;
    }

    #header-three {
        display: flex;
        flex-direction: column;
    }

    .header-top-bar {
        order: 1;
    }

    .main-menu-area {
        order: 2;
        position: relative;
    }
}

/* ===== SMALLER SCREENS ===== */
@media (max-width: 576px) {
    .top-bar-left p {
        font-size: 10px !important;
    }
    
    .logo-area img {
        max-width: 95px !important;
    }
    
    .main-menu-area .cp-default-btn {
        font-size: 10px !important;
        padding: 7px 12px !important;
    }
    
    .top-bar-right .login-btn {
        font-size: 10px !important;
        padding: 5px 10px !important;
    }

    .search-layout3-inner {
        padding: 14px !important;
    }
    
    .search-layout3 .select2,
    .search-layout3 input[type="text"] {
        font-size: 13px;
        padding: 11px 12px;
    }

    .search-layout3 .cp-search-btn {
        padding: 11px;
        font-size: 13px;
    }
}

@media (max-width: 400px) {
    .top-bar-left p {
        font-size: 9px !important;
    }
    
    .logo-area img {
        max-width: 85px !important;
    }

    .main-menu-area .cp-default-btn {
        font-size: 9px !important;
        padding: 6px 10px !important;
    }

    .top-bar-right ul {
        gap: 6px;
    }

    .top-bar-right .login-btn {
        font-size: 9px !important;
        padding: 5px 8px !important;
    }
    
    .top-bar-right .login-btn i {
        display: none;
    }
}

/* ===== ANIMATIONS ===== */
@keyframes slideInMenu {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.mean-container .mean-nav {
    animation: slideInMenu 0.3s ease;
}
/* Mobile-Friendly Popup - FINAL FIXED VERSION */
@media (max-width: 768px) {
    /* Popup overlay - SCROLLABLE */
    #promo-popup-overlay {
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch !important;
        align-items: flex-start !important;
        padding: 20px 0 !important;
    }
    
    /* Popup container - centered card */
    #promo-popup-overlay > div {
        max-width: 95% !important;
        width: 95% !important;
        margin: 20px auto !important;
        max-height: none !important;
        transform: none !important;
        animation: none !important;
        border-radius: 12px !important;
        position: relative !important;
    }
    
    /* Vertical stack */
    #promo-popup-overlay > div > div {
        flex-direction: column !important;
        min-height: auto !important;
    }
    
    /* Green header section */
    #promo-popup-overlay > div > div > div:first-child {
        flex: none !important;
        width: 100% !important;
        padding: 24px 20px 20px 20px !important;
    }
    
    /* Hide icon on mobile */
    #promo-popup-overlay > div > div > div:first-child > div:first-child {
        display: none !important;
    }
    
    /* Green section heading */
    #promo-popup-overlay > div > div > div:first-child h2 {
        font-size: 17px !important;
        margin: 0 0 8px 0 !important;
        line-height: 1.3 !important;
    }
    
    #promo-popup-overlay > div > div > div:first-child > p {
        font-size: 13px !important;
        margin: 0 !important;
        opacity: 0.95 !important;
    }
    
    /* Trust indicators container */
    #promo-popup-overlay > div > div > div:first-child > div:last-child {
        margin-top: 16px !important;
        padding-top: 16px !important;
        display: block !important;
    }
    
    /* Rating row - HORIZONTAL STARS */
    #promo-popup-overlay > div > div > div:first-child > div:last-child > div {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        margin-bottom: 8px !important;
        flex-wrap: nowrap !important;
    }
    
    /* Stars container - FORCE HORIZONTAL */
    #promo-popup-overlay > div > div > div:first-child > div:last-child > div > div {
        display: flex !important;
        flex-direction: row !important;
        gap: 3px !important;
        flex-shrink: 0 !important;
    }
    
    /* Individual stars */
    #promo-popup-overlay > div > div > div:first-child > div:last-child > div > div span {
        font-size: 16px !important;
        line-height: 1 !important;
        display: inline-block !important;
    }
    
    /* Rating text */
    #promo-popup-overlay > div > div > div:first-child > div:last-child > div > span {
        font-size: 13px !important;
        white-space: nowrap !important;
        flex-shrink: 0 !important;
    }
    
    /* Trust text */
    #promo-popup-overlay > div > div > div:first-child > div:last-child > p {
        font-size: 12px !important;
        margin: 0 !important;
        line-height: 1.4 !important;
    }
    
    /* White content section */
    #promo-popup-overlay > div > div > div:last-child {
        padding: 24px 20px 28px 20px !important;
    }
    
    /* Main heading */
    #promo-popup-overlay > div > div > div:last-child h3 {
        font-size: 19px !important;
        margin: 0 0 10px 0 !important;
        line-height: 1.3 !important;
    }
    
    /* Description */
    #promo-popup-overlay > div > div > div:last-child > p:first-of-type {
        font-size: 14px !important;
        margin: 0 0 18px 0 !important;
        line-height: 1.5 !important;
        color: #64748b !important;
    }
    
    /* Benefits grid - single column */
    #promo-popup-overlay > div > div > div:last-child > div {
        display: grid !important;
        grid-template-columns: 1fr !important;
        gap: 12px !important;
        margin: 18px 0 24px 0 !important;
    }
    
    /* Benefit items */
    #promo-popup-overlay > div > div > div:last-child > div > div {
        display: flex !important;
        align-items: center !important;
        padding: 0 !important;
    }
    
    /* Checkmark circles */
    #promo-popup-overlay > div > div > div:last-child > div > div > div {
        width: 22px !important;
        height: 22px !important;
        min-width: 22px !important;
        margin-right: 12px !important;
        flex-shrink: 0 !important;
    }
    
    #promo-popup-overlay > div > div > div:last-child > div > div > div svg {
        width: 12px !important;
        height: 12px !important;
    }
    
    /* Benefit text */
    #promo-popup-overlay > div > div > div:last-child > div > div span {
        font-size: 14px !important;
        line-height: 1.4 !important;
        font-weight: 500 !important;
    }
    
    /* CTA button */
    #promo-popup-overlay > div > div > div:last-child button {
        padding: 14px 20px !important;
        font-size: 15px !important;
        border-radius: 10px !important;
        width: 100% !important;
        font-weight: 600 !important;
    }
    
    /* Fine print */
    #promo-popup-overlay > div > div > div:last-child > p:last-of-type {
        font-size: 11px !important;
        margin: 12px 0 0 0 !important;
        text-align: center !important;
        color: #9ca3af !important;
    }
    
    /* Close button - FIXED at top right */
    #promo-popup-overlay > div > button {
        position: fixed !important;
        top: 30px !important;
        right: 20px !important;
        width: 36px !important;
        height: 36px !important;
        font-size: 24px !important;
        background: rgba(0,0,0,0.85) !important;
        color: white !important;
        z-index: 999999 !important;
        box-shadow: 0 2px 12px rgba(0,0,0,0.5) !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        line-height: 1 !important;
        padding: 0 !important;
        border: 2px solid rgba(255,255,255,0.3) !important;
    }
    
    /* Progress bar */
    #promo-popup-overlay > div > #popup-progress {
        position: absolute !important;
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
        height: 3px !important;
    }
    
    #promo-popup-overlay > div > #popup-progress-bar {
        height: 100% !important;
    }
}

/* Small screens */
@media (max-width: 480px) {
    #promo-popup-overlay {
        padding: 15px 0 !important;
    }
    
    #promo-popup-overlay > div {
        max-width: 94% !important;
        margin: 15px auto !important;
    }
    
    #promo-popup-overlay > div > div > div:first-child {
        padding: 20px 18px 18px 18px !important;
    }
    
    #promo-popup-overlay > div > div > div:first-child h2 {
        font-size: 16px !important;
    }
    
    #promo-popup-overlay > div > div > div:last-child {
        padding: 20px 18px 24px 18px !important;
    }
    
    #promo-popup-overlay > div > div > div:last-child h3 {
        font-size: 18px !important;
    }
    
    #promo-popup-overlay > div > button {
        top: 25px !important;
        right: 15px !important;
    }
}

/* Prevent body scroll when popup open */
body.popup-open {
    overflow: hidden !important;
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
                                       +25478 199990
                                    </p>
                                    <p class="d-none d-lg-block">
                                       info@thehub.co.ke
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
            <div class="col-lg-2 col-md-2 col-sm-3">
                                        <img src="{{asset('Platform/img/logo-dark.png')}}" alt="logo">
                                
                            </div>
            <div class="col-md-10">
                <div class="mobile-menu">
                    <nav id="dropdown">
                         <ul>
                            <!-- Add Categories Dropdown Here -->
                            <li><a href="#">Categories</a>
                                <ul>
                                    <li>
                                        <a href="{{url('electronics')}}"><img src="{{asset('Platform/img/product/electronics.png')}}" alt="category" class="img-fluid">Electronics<span>(50)</span></a>
                                    </li>
                                    <li>
                                        <a href="{{url('vehicles')}}"><img src="{{asset('Platform/img/product/ctg3.png')}}" alt="category" class="img-fluid">Car &amp; Vehicles<span>(50)</span></a>
                                    </li>
                                    <li>
                                        <a href="{{url('realestate')}}"><img src="{{asset('Platform/img/product/ctg7.png')}}" alt="category" class="img-fluid">Real Estate<span>(90)</span></a>
                                    </li>
                                     <li>
                                        <a href="{{url('phones')}}"><img src="{{asset('Platform/img/product/ctg1.png')}}" alt="category" class="img-fluid">Phones<span>(90)</span></a>
                                    </li>
                                </ul>
                            </li>
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