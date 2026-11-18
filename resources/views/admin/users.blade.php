@extends('admin.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">
                <i class="fa-solid fa-users text-danger me-2"></i> Users
            </h4>
        </div>

        <!-- Search -->
        <div class="row mb-2">
            <div class="col-md-4">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="search" placeholder="Search by name , mobile or place...">
                </div>
            </div>
        </div>

        <!-- Users Table Card -->
        <div class="card admin-card">
            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Points</th>
                            <th>Phone</th>
                            <th>Place</th>
                            <th>City</th>
                            <th>District</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="usersTable">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $users->firstItem() + $loop->index }}</td>


                                <td>
                                    <div class="user-cell">
                                        <div class="avatar">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="user-name">{{ $user->name }}</div>
                                            <small class="text-muted">ID #{{ $user->id }}</small>
                                        </div>
                                    </div>
                                </td>

                                <td style="color:rgba(19, 19, 19, 1)"><i class="fa-solid fa-coins"></i>
                    {{ $user->userdetails->point ?? 0 }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->userdetails->place ?? '-' }}</td>
                                <td>{{ $user->userdetails->city ?? '-' }}</td>
                                <td>{{ $user->userdetails->district ?? '-' }}</td>

                                <td>
                                    <span class="status-pill {{ $user->status }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                        class="btn btn-sm btn-outline-danger view-btn">
                                        <i class="fa-solid fa-eye"></i>
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper mt-4">
            {{ $users->onEachSide(1)->links('pagination.admin') }}
        </div>


    </div>
@endsection

@push('styles')
    <style>
        /* ===== CARD ===== */
        .admin-card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .06);
            background: #fff;
            overflow: hidden;
        }

        /* ===== TABLE ===== */
        .admin-table {
            border-collapse: separate;
            border-spacing: 0 10px;
            padding: 10px;
            width: 100%;
        }

        /* HEADER */
        .admin-table thead tr {
            background: #b71c1c;
        }

        .admin-table thead th {
            color: #fff;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .6px;
            padding: 14px;
            border: none;
        }

        /* ROW */
        .admin-table tbody tr {
            background: #fff;
            border-radius: 10px;
            transition: all .25s ease;
        }

        /* 👉 BOTTOM BORDER (WORKING) */
        .admin-table tbody tr td {
            padding: 14px;
            vertical-align: middle;
            font-size: 14px;
            border-bottom: 2px solid #212529;
            border-top: none;
        }

        /* Remove last row border */
        .admin-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Hover */
        .admin-table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(198, 40, 40, .12);
        }

        /* ===== USER CELL ===== */
        .user-cell {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .user-name {
            font-weight: 600;
            color: #212529;
        }

        /* ===== AVATAR ===== */
        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #c62828, #b71c1c);
            color: #fff;
            font-weight: 700;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== STATUS ===== */
        .status-pill {
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 999px;
            text-transform: capitalize;
        }

        .status-pill.active {
            background: rgba(46, 125, 50, .15);
            color: #2e7d32;
        }

        .status-pill.inactive {
            background: rgba(198, 40, 40, .15);
            color: #c62828;
        }

        /* ===== SEARCH ===== */
        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #fff;
            border-radius: 40px;
            padding: 12px 18px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            border: 2px solid rgba(0, 0, 0, .2);
            transition: .3s;
        }

        .search-box i {
            color: #c62828;
            font-size: 14px;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 14px;
            background: transparent;
        }

        .search-box:focus-within {
            border-color: #c62828;
            box-shadow: 0 15px 30px rgba(198, 40, 40, .25);
        }

        /* ===== VIEW BUTTON ===== */
.view-btn {
    border-radius: 20px;
    padding: 6px 14px;
    font-size: 12px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: .25s ease;
}

.view-btn:hover {
    background: #c62828;
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(198,40,40,.3);
}


        /* ===== MOBILE ===== */
        @media (max-width:768px) {
            .admin-table thead {
                display: none;
            }

            .admin-table tbody tr {
                display: block;
                margin-bottom: 15px;
            }

            .admin-table tbody tr td {
                display: flex;
                justify-content: space-between;
                padding: 10px 14px;
            }

            .admin-table tbody tr td::before {
                content: attr(data-label);
                font-weight: 600;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {

            $('#search').on('keyup', function () {
                let search = $(this).val();

                $.ajax({
                    url: "{{ route('admin.users.search') }}",
                    type: "GET",
                    data: { search },
                    success: function (users) {

                        let html = '';

                        if (users.length) {
                            $.each(users, function (i, user) {
                                let viewUrl = "{{ route('admin.users.show', ':id') }}".replace(':id', user.id);
                                html += `
                            <tr>
                                <td>${i + 1}</td>
                                <td>
                                    <div class="user-cell">
                                        <div class="avatar">${user.name.charAt(0)}</div>
                                        <div class="user-name">${user.name}</div>
                                    </div>
                                </td>
                                <td style="color:rgba(19, 19, 19, 1)"><i class="fa-solid fa-coins"></i>
                    ${user.userdetails?.point ?? '-'}</td>
                                <td>${user.phone ?? '-'}</td>
                                
                                <td>${user.userdetails?.place ?? '-'}</td>
                                <td>${user.userdetails?.city ?? '-'}</td>
                                <td>${user.userdetails?.district ?? '-'}</td>
                                <td>
                                    <span class="status-pill ${user.status}">
                                        ${user.status}
                                    </span>
                                </td>
                                <td>
                                    <a href="${viewUrl}"
                                        class="btn btn-sm btn-outline-danger view-btn">
                                        <i class="fa-solid fa-eye"></i>
                                        View Details
                                    </a>
                                </td>
                            </tr>`;
                            });
                        } else {
                            html = `
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No users found
                            </td>
                        </tr>`;
                        }

                        $('#usersTable').html(html);
                    }
                });
            });

        });
    </script>
@endpush