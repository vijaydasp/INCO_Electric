@extends('admin.layout')
@section('page-title', 'Dashboard')

@section('content')

<h4 class="dashboard-title">
    <i class="fa-solid fa-gauge"></i> Admin Dashboard
</h4>

<div class="stats-grid">

    <!-- USERS -->
    <div class="stat-card">
        <div class="stat-icon users">
            <i class="fa-solid fa-users"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $data['usersCount'] }}</h3>
            <p>Total Users</p>
        </div>
    </div>

    <!-- PENDING REDEEMS -->
    <div class="stat-card">
        <div class="stat-icon pending">
            <i class="fa-solid fa-hourglass-half"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $data['pendingRedeems'] }}</h3>
            <p>Pending Redeems</p>
        </div>
    </div>


    <!-- SHIPPED -->
    <div class="stat-card">
        <div class="stat-icon shipped">
            <i class="fa-solid fa-truck"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $data['shippedRedeems'] }}</h3>
            <p>Shipped</p>
        </div>
    </div>

    <!-- TOTAL -->
    <div class="stat-card">
        <div class="stat-icon total">
            <i class="fa-solid fa-box"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $data['totalRedeems'] }}</h3>
            <p>Total Redeems</p>
        </div>
    </div>

</div>

@endsection
@push('styles')
<style>
.dashboard-title {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
}

.stat-card {
    background: #fff;
    border-radius: 14px;
    padding: 18px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.06);
    transition: transform 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
}

.stat-icon {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    color: #fff;
}

.stat-icon.users { background: #ce1212; }
.stat-icon.pending { background: #ce1212; color: #000; }
.stat-icon.shipped { background: #ce1212; }
.stat-icon.total { background: #ce1212; }

.stat-info h3 {
    margin: 0;
    font-size: 24px;
    font-weight: 700;
}

.stat-info p {
    margin: 2px 0 0;
    font-size: 13px;
    color: #666;
}

.dashboard-title {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* 👈 2 columns */
    gap: 20px;
}

.stat-card {
    background: #fff;
    border-radius: 14px;
    padding: 18px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.06);
    transition: transform 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
}

.stat-icon {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    color: #fff;
}

.stat-icon.users { background: #0d6efd; }
.stat-icon.pending { background: #ffc107; color: #000; }
.stat-icon.shipped { background: #6f42c1; }
.stat-icon.total { background: #ce1212; }

.stat-info h3 {
    margin: 0;
    font-size: 24px;
    font-weight: 700;
}

.stat-info p {
    margin: 2px 0 0;
    font-size: 13px;
    color: #666;
}

</style>
@endpush