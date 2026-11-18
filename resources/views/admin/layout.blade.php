<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gdQ8N8dq8Lg1RkF6vH6T+7KpZ0p5Fm39h6C4f5eR/akU7R9y/3VfH4e5Q+3jcR4A" crossorigin="anonymous">


    <style>
:root {
    --red: #c62828;
    --dark-red: #b71c1c;
    --sidebar-red: #b71c1c;
    --light-bg: #f1f1f1;
}

/* RESET */
* {
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    margin: 0;
    background: var(--light-bg);
    overflow: hidden; /* important */
}

/* ================= HEADER ================= */
.header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 55px;
    background: var(--red);
    color: #fff;
    display: flex;
    align-items: center;
    padding: 0 20px;
    justify-content: space-between;
    z-index: 1000;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 15px;
}

.header-left h2 {
    font-size: 20px;
    margin: 0;
}

.header-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

.logout-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #ce1212;
    color: #fff;
    border: 2px solid #fff;
    padding: 7px 16px;
    border-radius: 30px;
    font-size: 14px;
    cursor: pointer;
    transition: 0.3s;
}

.logout-btn:hover {
    background: #fff;
    color: #ce1212;
}

/* ================= LAYOUT ================= */
.wrapper {
    display: flex;
}

/* ================= SIDEBAR ================= */
.sidebar {
    position: fixed;
    top: 55px;
    left: 0;
    width: 240px;
    height: calc(100vh - 55px);
    background: var(--sidebar-red);
    color: #fff;
    padding-top: 10px;
    overflow-y: auto;
}

.sidebar a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 20px;
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    border-left: 4px solid transparent;
}

.sidebar a:hover,
.sidebar a.active {
    background: rgba(0, 0, 0, 0.15);
    border-left: 4px solid #fff;
}

/* ================= CONTENT ================= */
.content-div {
    margin-top: 15px;
    margin-left: 240px;
    padding: 30px;

    height: calc(100vh - 55px);
    overflow-y: auto;

    background: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
}

.page-title {
    font-size: 22px;
    margin-bottom: 20px;
}

/* ================= DASHBOARD ================= */
.dashboard-box {
    background: #fff;
    padding: 20px;
    border-radius: 4px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-top: 20px;
}

.stat {
    text-align: center;
    color: #333;
}

.stat i {
    font-size: 30px;
    margin-bottom: 8px;
    color: var(--red);
}

.stat span {
    display: block;
    font-size: 13px;
    color: #777;
}

/* ================= PAGINATION ================= */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.admin-pagination .pagination {
    display: flex !important;
    gap: 10px;
    padding: 10px 14px;
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, .08);
}

.admin-pagination .page-item {
    display: inline-flex !important;
}

.admin-pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 42px;
    height: 42px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    border: none;
    color: #212529;
    background: linear-gradient(180deg, #ffffff, #f7f7f7);
    box-shadow:
        0 4px 10px rgba(0, 0, 0, .08),
        inset 0 1px 0 rgba(255, 255, 255, .8);
    transition: all .25s ease;
}

.admin-pagination .page-item:not(.active):not(.disabled) .page-link:hover {
    background: linear-gradient(135deg, #c62828, #b71c1c);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(198, 40, 40, .45);
}

.admin-pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #c62828, #b71c1c);
    color: #fff;
    box-shadow: 0 14px 35px rgba(198, 40, 40, .55);
}

.admin-pagination .page-item.disabled .page-link {
    background: #f1f1f1;
    color: #aaa;
    box-shadow: none;
    cursor: not-allowed;
}

/* ================= MOBILE ================= */
@media (max-width: 768px) {
    .sidebar {
        width: 200px;
    }

    .content-div {
        margin-left: 200px;
        padding: 20px;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }
}

    </style>

    @stack('styles')
</head>

<body>

    <!-- ===== HEADER ===== -->
    <div class="header">
        <div class="header-left">
            <h2>Admin Panel</h2>
            <span>@yield('page-title', 'Dashboard')</span>
        </div>

        <div class="header-right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fa-solid fa-power-off"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- ===== BODY ===== -->
    <div class="wrapper">

        <!-- SIDEBAR -->
        <div class="sidebar">
            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>

            <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i> Users
            </a>

            <a href="{{ route('admin.redeems') }}" class="{{ request()->routeIs('admin.redeems*') ? 'active' : '' }}">
                <i class="fa-solid fa-gift"></i> Pending Redeems
            </a>

            <a href="{{ route('admin.redeemhistory') }}" class="{{ request()->routeIs('admin.redeemhistory*') ? 'active' : '' }}">
                <i class="fa-solid fa-truck-fast"></i> Reward Shipping History
            </a>

            <a href="{{ route('admin.qr.index') }}" class="{{ request()->routeIs('admin.qr*') ? 'active' : '' }}">
                <i class="fa-solid fa-qrcode"></i> QR Codes
            </a>
        </div>

        <!-- CONTENT -->
        <div class="content-div">
            <h3 class="page-title">@yield('title')</h3>
            @yield('content')

        </div>

    </div>
    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-PIfyHjM03f88hRrmR72K6G0H8MkU4Kcf5U2Q4GfBqk/2uOb0Zp4vpp0nC5H0kM3b"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    @stack('scripts')
</body>

</html>