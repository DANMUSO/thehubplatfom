<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheHub - Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('Platform/img/salogo-dark.png')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Add this CSS for the logout button -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
.logout-btn {
    width: 100%;
    padding: 10px 15px;
    background: #ef4444;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s;
    font-weight: 500;
}

.logout-btn:hover {
    background: #dc2626;
    transform: translateY(-1px);
}

.logout-btn i {
    font-size: 16px;
}
</style>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
            color: #333;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #22C55E;
            color: #f59e0b;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 999;
        }

        .logo {
            text-align: center;
            padding: 0 20px 30px;
            border-bottom: 1px solid #334155;
        }

        .logo h2 {
            color: #22C55E;
            font-size: 24px;
        }

        .nav-menu {
            list-style: none;
            padding: 20px 0;
        }

        .nav-item {
            margin: 5px 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            background: #334155;
            color: #f59e0b;
            border-right: 3px solid #f59e0b;
        }

        .nav-link i {
            margin-right: 12px;
            width: 20px;
        }

        .user-profile {
            padding: 20px;
            border-top: 1px solid #334155;
            margin-top: auto;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f59e0b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            padding: 20px;
            width: calc(100% - 280px);
        }

        .header {
            background: white;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-text h1 {
            font-size: 28px;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .welcome-text p {
            color: #64748b;
        }

        .quick-actions {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #f59e0b;
            color: white;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: #f59e0b;
            border: 2px solid #f59e0b;
        }

        .btn-outline:hover {
            background: #f59e0b;
            color: white;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .icon-blue { background: #f59e0b; }
        .icon-green { background: #10b981; }
        .icon-yellow { background: #f59e0b; }
        .icon-purple { background: #8b5cf6; }

        .stat-value {
            font-size: 32px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #64748b;
            font-size: 14px;
        }

        .stat-change {
            font-size: 12px;
            font-weight: 500;
        }

        .positive { color: #10b981; }
        .negative { color: #ef4444; }

        /* Content Sections */
        .content-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .section-header {
            padding: 20px 30px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #1e293b;
        }

        .section-content {
            padding: 30px;
        }

        /* Quick Post Form */
        .quick-post-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #f59e0b;
        }

        .form-textarea {
            height: 120px;
            resize: vertical;
        }

        /* Recent Activities */
        .activity-list {
            list-style: none;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 16px;
            color: white;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 500;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 12px;
            color: #64748b;
        }

        /* Package Cards */
        .package-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .package-card {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .package-card:hover {
            border-color: #f59e0b;
            transform: translateY(-5px);
        }

        .package-card.featured {
            border-color: #f59e0b;
            background: linear-gradient(135deg, #f59e0b 0%, #1d4ed8 100%);
            color: white;
        }

        .package-popular {
            position: absolute;
            top: -10px;
            right: 20px;
            background: #f59e0b;
            color: white;
            padding: 5px 15px;
            border-radius: 0 0 8px 8px;
            font-size: 12px;
            font-weight: bold;
        }

        .package-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .package-price {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .package-features {
            list-style: none;
            margin-bottom: 25px;
        }

        .package-features li {
            padding: 8px 0;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        .package-features li:last-child {
            border-bottom: none;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .quick-actions {
                flex-wrap: wrap;
                justify-content: center;
            }

            .quick-post-form {
                grid-template-columns: 1fr;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        .mobile-menu-btn {
    display: none;
    background: #f59e0b;
    color: white;
    border: none;
    padding: 12px 15px;
    border-radius: 8px;
    font-size: 20px;
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 1001; /* Higher than sidebar */
    cursor: pointer;
}
/* Sidebar Overlay for Mobile */
.sidebar-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 998;
}

.sidebar-overlay.active {
    display: block;
}
/* Mobile Responsive */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
        z-index: 999;
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    }

    .sidebar.open {
        transform: translateX(0);
    }

    .main-content {
        margin-left: 0;
        width: 100%;
        padding: 80px 15px 20px; /* Add top padding for menu button */
    }

    .header {
        flex-direction: column;
        gap: 15px;
        text-align: center;
        padding: 20px 15px;
    }

    .welcome-text h1 {
        font-size: 22px;
    }

    .quick-actions {
        flex-direction: column;
        width: 100%;
    }

    .btn {
        width: 100%;
        justify-content: center;
    }

    .quick-post-form {
        grid-template-columns: 1fr;
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .stat-card {
        padding: 20px;
    }

    .stat-value {
        font-size: 28px;
    }

    .section-content {
        padding: 20px 15px;
    }

    .package-grid {
        grid-template-columns: 1fr;
    }

    .mobile-menu-btn {
        display: block;
    }

    /* Fix logo sizing on mobile */
    .logo img {
        max-height: 50px;
        width: auto;
    }

    /* Improve user profile on mobile */
    .user-profile {
        padding: 15px;
    }

    .user-info {
        font-size: 14px;
    }
}

/* Extra small devices */
@media (max-width: 480px) {
    .stat-card {
        padding: 15px;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        font-size: 20px;
    }

    .stat-value {
        font-size: 24px;
    }

    .welcome-text h1 {
        font-size: 20px;
    }

    .section-title {
        font-size: 18px;
    }
}
    </style>
</head>
<body>
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>
 <!-- Sidebar Overlay (Add this) -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="logo">
                <img src="{{asset('Platform/img/salogo-dark.png')}}" alt="logo" style="height:70px">
            </div>
            
           <ul class="nav-menu">
    <li class="nav-item">
        <a href="{{url('client-classification')}}" class="nav-link {{ request()->is('client-classification') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a href="{{url('postmgt')}}" class="nav-link {{ request()->is('postmgt') ? 'active' : '' }}">
            <i class="fas fa-plus-circle"></i>
            Posts Management
        </a>
    </li>
     <li class="nav-item">
        <a href="{{url('locations')}}" class="nav-link {{ request()->is('locations') ? 'active' : '' }}">
            <i class="fas fa-map-marker-alt"></i>
           Business Locations
        </a>
    </li>
    <li class="nav-item">
        <a href="{{url('packages')}}" class="nav-link {{ request()->is('packages') ? 'active' : '' }}">
            <i class="fas fa-crown"></i>
            Upgrade Package
        </a>
    </li>
    <li class="nav-item">
        <a href="{{url('messages')}}" class="nav-link {{ request()->is('messages') ? 'active' : '' }}">
            <i class="fas fa-envelope"></i>
            Messages
            <span style="background: #ef4444; color: white; border-radius: 50%; padding: 2px 6px; font-size: 10px; margin-left: auto;">3</span>
        </a>
    </li>
    <li class="nav-item"> 
        <a href="{{url('adsanalytics')}}" class="nav-link {{ request()->is('adsanalytics') ? 'active' : '' }}">
            <i class="fas fa-chart-bar"></i>
            Analytics
        </a>
    </li>
    <li class="nav-item">
        <a href="{{url('profilev1')}}" class="nav-link {{ request()->is('profilev1') ? 'active' : '' }}">
           <i class="fas fa-user-circle"></i>
            Profile
        </a>
    </li>
</ul>
             <div class="user-profile">
            <div class="user-info">
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name ?? 'JD', 0, 2)) }}</div>
                <div>
                    <div style="font-weight: 500;">{{ Auth::user()->name ?? 'John Doe' }}</div>
                    <div style="font-size: 12px; color: #94a3b8;">Premium Member</div>
                </div>
            </div>
            
            <!-- Logout Button -->
            <div style="margin-top: 15px;">
                  <!-- Logout Button -->
            <div style="margin-top: 15px;">
                <a href="{{url('listedads')}}" class="logout-btn bg-primary text-white">
                    <i class="fas fa-list-ul"></i>
                    Listed Ads
                </a>
            </div>
            <br>
                <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </div>
           
        </div>
        </nav>

                {{ $slot }}
 
    </div>

  <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        sidebar.classList.toggle('open');
        overlay.classList.toggle('active');
    }

    // Close sidebar when clicking nav link on mobile
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
            }
        });
    });

    // Prevent body scroll when sidebar is open on mobile
    function updateBodyScroll() {
        const sidebar = document.getElementById('sidebar');
        if (window.innerWidth <= 768 && sidebar.classList.contains('open')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = 'auto';
        }
    }

    // Listen for sidebar toggle
    const sidebar = document.getElementById('sidebar');
    const observer = new MutationObserver(updateBodyScroll);
    observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });
</script>
</body>
</html>