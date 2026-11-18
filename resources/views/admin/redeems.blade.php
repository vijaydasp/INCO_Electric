@extends('admin.layout')

@section('content')
    <div class="container">

        <div class="page-header">
            <h4 class="page-title">
                <i class="fa-solid fa-gift icon-red"></i> New Redeems (Pending)
            </h4>
        </div>

        <div class="card">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Address</th>
                            <th>Redeemed At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($redeems as $redeem)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>
                                                <strong>{{ $redeem->user->name }}</strong><br>
                                                <small>{{ $redeem->user->email }}</small>
                                            </td>

                                            <td>
                                                <div class="product-cell">
                                                    <img src="{{ $redeem->product && $redeem->product->product_image
                            ? asset('storage/' . $redeem->product->product_image)
                            : asset('images/no-image.png') }}" class="product-thumb">
                                                    <span>{{ $redeem->product->product_info ?? '-' }}</span>
                                                </div>
                                            </td>

                                            <td class="address-cell">
                                                <div class="address-text">
                                                    {{ $redeem->address ?? '-' }}
                                                </div>

                                                <!-- <a href="{{ route('admin.redeems.pdf', $redeem->id) }}" class="btn-slip"
                                                    >
                                                    <i class="fa-solid fa-download"></i> Slip
                                                </a> -->
                                            </td>

                                            <td>{{ $redeem->created_at->format('d M Y, h:i A') }}</td>

                                            <td>
                                                <a href="{{ route('admin.redeems.pdf', $redeem->id) }}" class="btn-slip"
                                                    >
                                                    <i class="fa-solid fa-truck-fast"></i> Proceed to Ship
                                                </a>
                                                <!-- <form method="POST" action="{{ route('admin.redeems.ship', $redeem->id) }}">
                                                    @csrf
                                                    <button class="btn-danger btn-sm">
                                                        Proceed to Ship
                                                    </button>
                                                </form> -->
                                            </td>
                                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty">
                                    No pending redeems found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
@push('styles')
    <style>
        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .icon-red {
            color: #ce1212;
        }

        /* ===== CARD ===== */
        .card {
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        /* ===== TABLE ===== */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            background: linear-gradient(135deg, #ce1212, #b71c1c);
            color: #fff;
            padding: 14px 12px;
            font-size: 14px;
            font-weight: 600;
            text-align: left;
            white-space: nowrap;
        }

        tbody td {
            padding: 14px 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            vertical-align: middle;
        }

        /* ===== ROW HOVER ===== */
        tbody tr {
            transition: background .2s ease;
        }

        tbody tr:hover {
            background: #fff5f5;
        }

        /* ===== USER CELL ===== */
        tbody td strong {
            font-weight: 600;
            color: #222;
        }

        tbody td small {
            color: #777;
            font-size: 12px;
        }

        /* ===== PRODUCT CELL ===== */
        .product-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-thumb {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid #ddd;
            background: #fafafa;
        }

        /* ===== ACTION BUTTON ===== */
        .btn-danger {
            background: linear-gradient(135deg, #ce1212, #b71c1c);
            color: #fff;
            border: none;
            padding: 8px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all .25s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(206, 18, 18, .35);
        }

        /* ===== EMPTY STATE ===== */
        .empty {
            text-align: center;
            padding: 30px;
            font-size: 14px;
            color: #999;
        }

        .address-cell {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.btn-slip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #ce1212;
    border: 1px dashed #ce1212;
    padding: 4px 10px;
    border-radius: 30px;
    width: fit-content;
    text-decoration: none;
    transition: all .2s ease;
}

.btn-slip:hover {
    background: #ce1212;
    color: #fff;
}

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            thead {
                display: none;
            }

            table,
            tbody,
            tr,
            td {
                display: block;
                width: 100%;
            }

            tbody tr {
                background: #fff;
                border-radius: 12px;
                margin-bottom: 15px;
                box-shadow: 0 6px 18px rgba(0, 0, 0, .06);
                padding: 12px;
            }

            tbody td {
                border: none;
                padding: 6px 0;
            }

            tbody td::before {
                content: attr(data-label);
                font-weight: 600;
                display: block;
                color: #555;
                font-size: 12px;
                margin-bottom: 2px;
            }
        }
    </style>
@endpush