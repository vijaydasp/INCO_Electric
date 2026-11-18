@extends('admin.layout')
@section('styles')
<style>
    .profile-actions{
    margin-top:20px;
    display:flex;
    gap:10px;
    justify-content:center;
    flex-wrap:wrap;
}

.btn-primary{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:6px 14px;
    border-radius:50px;
    font-weight:600;
    border:2px solid #0d6efd;
    color:#0d6efd;
    background:transparent;
    text-decoration:none;
    transition:.25s;
}

.btn-primary:hover{
    background:#0d6efd;
    color:#fff;
}
</style>

@endsection

@section('content')
    <div class="container">

        <!-- PAGE HEADER -->
        <div class="page-header">
            <h4 class="page-title">
                <i class="fa-solid fa-user icon-red"></i> User Details
            </h4>

        </div>

        <!-- USER PROFILE -->
        <div class="profile-card-wrapper">
            <div class="profile-card">
                <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                <h4>{{ $user->name }}</h4>
                <span class="redeem-points" id="userPoints">
                    <i class="fa-solid fa-coins"></i>
                    {{ $user->userdetails->point ?? 0 }} Points
                </span>

                <div class="profile-info">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone }}</p>
                    <p><strong>Place:</strong> {{ $user->userdetails->place ?? '-' }}</p>
                    <p><strong>City:</strong> {{ $user->userdetails->city ?? '-' }}</p>
                    <p><strong>District:</strong> {{ $user->userdetails->district ?? '-' }}</p>
                </div>

                <!-- <div class="profile-actions">
                    <button class="btn-danger" id="editPointsBtn">
                        <i class="fa-solid fa-pen"></i> Edit Points
                    </button>
                    <button class="btn-secondary" id="suspendUserBtn">
                        <i class="fa-solid fa-user-slash"></i> Suspend User
                    </button>
                </div> -->

                <div class="profile-actions">
    <button class="btn-danger" id="editPointsBtn">
        <i class="fa-solid fa-pen"></i> Edit Points
    </button>

    <button class="btn-secondary" id="suspendUserBtn">
        <i class="fa-solid fa-user-slash"></i> Suspend User
    </button>

    <a href="{{ route('admin.users.qr-history', $user->id) }}" class="btn-primary">
        <i class="fa-solid fa-qrcode"></i> QR Scan History
    </a>
</div>
            </div>
        </div>

        <!-- REDEEM HISTORY -->
        <div class="redeem-history">


            <div class="card">
                <h5>Redeem History</h5>

                <!-- FILTER -->
                <div class="filter-bar">
                    <select id="statusFilter">
                        <option value="">All</option>
                        <option value="pending">Pending</option>
                        <option value="shipped">Shipped</option>
                    </select>
                </div>


                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Redeemed At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="redeemTableBody">
                            @forelse($redeems as $redeem)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        {{ $redeem->product->product_info ?? '-' }}
                                                    </td>

                                                    <td>{{ $redeem->address ?? '-' }}</td>

                                                    <td>
                                                        <span class="status {{ $redeem->status }}">
                                                            {{ ucfirst($redeem->status) }}
                                                        </span>
                                                    </td>

                                                    <td>{{ $redeem->created_at->format('d M Y, h:i A') }}</td>
                                                    <td>
                                                        @if($redeem->status === 'pending')
                                                        <a href="{{ route('admin.redeems.pdf', $redeem->id) }}" class="btn-slip">
                                                            <i class="fa-solid fa-truck-fast"></i> Proceed to Ship
                                                        </a>
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty">No redeem history found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- PASS USER ID -->
    <script>
        const USER_ID = {{ $user->id }};
    </script>

    <!-- EDIT POINTS MODAL -->
    <div class="custom-modal" id="editPointsModal">
        <div class="custom-modal-content">
            <span class="close-modal" id="closeModal">&times;</span>
            <h5>Edit Points</h5>

            <input type="number" id="pointsInput" value="{{ $user->userdetails->point ?? 0 }}" min="0">

            <div class="modal-footer">
                <button class="btn-secondary" id="cancelBtn">Cancel</button>
                <button class="btn-danger" id="savePointsBtn">Save</button>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .icon-red {
            color: #ce1212;
        }

        .back-btn {
            background: #f1f1f1;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
        }

        .profile-card-wrapper {
            display: flex;
            justify-content: center;
        }

        .profile-card {
            background: #fff;
            padding: 20px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .08);
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #c62828, #b71c1c);
            color: #fff;
            font-size: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }

        .profile-info p {
            text-align: left;
            margin: 6px 0;
        }

        .redeem-points {
            background: #ceb812ff;
            color: #fff;
            padding: 5px 12px;
            border-radius: 30px;
        }

        .btn-danger,
        .btn-secondary {
            padding: 6px 14px;
            border-radius: 50px;
            font-weight: 600;
            border: 2px solid;
            background: transparent;
            cursor: pointer;
        }

        .btn-danger {
            border-color: #ce1212;
            color: #ce1212;
        }

        .btn-danger:hover {
            background: #ce1212;
            color: #fff;
        }

        .btn-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-secondary:hover {
            background: #6c757d;
            color: #fff;
        }

        .card {
            background: #fff;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .filter-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f8f8f8;
        }

        .product-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .product-thumb {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        .status {
            padding: 5px 12px;
            border-radius: 30px;
            font-weight: 600;
        }

        .status.pending {
            background: #fff3cd;
            color: #856404;
        }

        .status.shipped {
            background: #d4edda;
            color: #155724;
        }

        .empty {
            text-align: center;
            color: #999;
        }



        .profile-actions {
            margin-top: 20px;
        }

        /* ===== MODAL OVERLAY ===== */
        .custom-modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 15, 15, 0.55);
            backdrop-filter: blur(4px);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.25s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* ===== MODAL BOX ===== */
        .custom-modal-content {
            background: #ffffff;
            width: 420px;
            max-width: 92%;
            border-radius: 18px;
            padding: 22px 26px 24px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
            position: relative;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px) scale(0.96);
                opacity: 0;
            }

            to {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }

        /* ===== HEADER ===== */
        .custom-modal-content h5 {
            font-size: 18px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 16px;
        }

        /* ===== CLOSE BUTTON ===== */
        .close-modal {
            position: absolute;
            top: 14px;
            right: 16px;
            font-size: 22px;
            color: #aaa;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .close-modal:hover {
            color: #ce1212;
            transform: rotate(90deg);
        }

        /* ===== INPUT ===== */
        #pointsInput {
            width: 100%;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid #ddd;
            font-size: 15px;
            font-weight: 600;
            margin-top: 6px;
            transition: all 0.25s ease;
        }

        #pointsInput:focus {
            outline: none;
            border-color: #ce1212;
            box-shadow: 0 0 0 4px rgba(206, 18, 18, 0.15);
        }

        /* ===== MODAL FOOTER ===== */
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 22px;
        }

        /* ===== BUTTONS ===== */
        .modal-footer button {
            padding: 9px 18px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            border: 2px solid;
            transition: all 0.25s ease;
        }

        /* Cancel */
        .btn-secondary {
            background: transparent;
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-secondary:hover {
            background: #6c757d;
            color: #fff;
        }

        /* Save */
        .btn-danger {
            background: linear-gradient(135deg, #ce1212, #b01010);
            border-color: transparent;
            color: #fff;
        }

        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(206, 18, 18, 0.35);
        }


        /* ===== REDEEM HISTORY WRAPPER ===== */
        .redeem-history {
            margin-top: 30px;
        }

        /* ===== CARD ===== */
        .redeem-history .card {
            background: linear-gradient(180deg, #ffffff, #fafafa);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        /* ===== HEADER ===== */
        .redeem-history h5 {
            font-size: 18px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 18px;
        }

        /* ===== FILTER BAR ===== */
        .filter-bar {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        /* ===== FILTER SELECT ===== */
        #statusFilter {
            appearance: none;
            padding: 8px 36px 8px 14px;
            border-radius: 30px;
            border: 1px solid #ddd;
            font-size: 14px;
            font-weight: 600;
            background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 16 16'%3E%3Cpath d='M1.5 5.5l6 6 6-6'/%3E%3C/svg%3E") no-repeat right 12px center;
            background-size: 12px;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        #statusFilter:hover {
            border-color: #ce1212;
        }

        #statusFilter:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(206, 18, 18, 0.15);
            border-color: #ce1212;
        }

        /* ===== TABLE WRAPPER ===== */
        .table-wrapper {
            margin-top: 20px;
            overflow-x: auto;
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        /* ===== TABLE HEADER ===== */
        thead th {
            text-align: left;
            font-size: 13px;
            font-weight: 700;
            color: #6c757d;
            padding: 10px 14px;
        }

        /* ===== TABLE ROW ===== */
        tbody tr {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
        }

        /* ===== TABLE CELLS ===== */
        tbody td {
            padding: 14px;
            font-size: 14px;
            color: #333;
        }

        /* ===== PRODUCT CELL ===== */
        .product-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-thumb {
            width: 46px;
            height: 46px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid #e0e0e0;
            background: #f8f8f8;
        }

        /* ===== STATUS BADGES ===== */
        .status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: capitalize;
        }

        /* Pending */
        .status.pending {
            background: linear-gradient(135deg, #fff3cd, #ffe8a1);
            color: #856404;
        }

        /* Shipped */
        .status.shipped {
            background: linear-gradient(135deg, #d4edda, #b7ebc6);
            color: #155724;
        }

        /* ===== EMPTY STATE ===== */
        .empty {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #999;
        }
    </style>
@endpush
@push('scripts')
    <script>
        // MODAL
        editPointsBtn.onclick = () => editPointsModal.style.display = 'flex';
        closeModal.onclick = cancelBtn.onclick = () =>
            editPointsModal.style.display = 'none';

        // UPDATE POINTS
        savePointsBtn.onclick = () => {
            fetch("{{ route('admin.users.updatePoints', $user->id) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ point: pointsInput.value })
            })
                .then(r => r.json())
                .then(r => {
                    userPoints.innerHTML = `
                    <i class="fa-solid fa-coins"></i>
                    ${r.point} Points
                `;

                    editPointsModal.style.display = 'none';
                });
        };


        // SUSPEND
        suspendUserBtn.onclick = () => {
            if (confirm('Suspend this user?')) {
                fetch("{{ route('admin.users.suspend', $user->id) }}", {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                });
            }
        };

        statusFilter.addEventListener('change', function () {
            fetch(`/admin/users/${USER_ID}/redeemed-products/filter?status=${this.value}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(res => res.json())
                .then(data => {
                    redeemTableBody.innerHTML = '';

                    if (!data.redeems.length) {
                        redeemTableBody.innerHTML =
                            `<tr><td colspan="5" class="empty">No redeem history found</td></tr>`;
                        return;
                    }

                    data.redeems.forEach((r, i) => {
                        redeemTableBody.innerHTML += `
                            <tr>
                                <td>${i + 1}</td>
                                <td>
                                    <div class="product-cell">
                                        <img src="${r.product_image ? '/storage/' + r.product_image : '/images/no-image.png'}"
                                             class="product-thumb">
                                        <span>${r.product_name}</span>
                                    </div>
                                </td>
                                <td>${r.address}</td>
                                <td>
                                    <span class="status ${r.status}">
                                        ${r.status.charAt(0).toUpperCase() + r.status.slice(1)}
                                    </span>
                                </td>
                                <td>${r.created_at}</td>
                            </tr>`;
                    });
                });
        });

    </script>
@endpush