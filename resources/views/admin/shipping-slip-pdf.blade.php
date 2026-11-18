@extends('admin.layout')

@section('content')
    <div class="container">
        <!-- REDEEM DETAILS SUMMARY -->
        <div class="redeem-summary-card">

            <div class="redeem-summary-header">
                <i class="fa-solid fa-gift"></i>
                Redeem Details
            </div>

            <div class="redeem-summary-body">

                <!-- LEFT : PRODUCT -->
                <div class="redeem-product-box">
                    <img src="{{ $redeem->product && $redeem->product->product_image
        ? asset('storage/' . $redeem->product->product_image)
        : asset('images/no-image.png') }}" class="redeem-product-image">

                    <div class="redeem-product-info">
                        <h5>{{ $redeem->product->product_info ?? '-' }}</h5>
                        <span class="redeem-points">
                            <i class="fa-solid fa-coins"></i>
                            {{ $redeem->product->point ?? 0 }} Points
                        </span>
                    </div>
                </div>

                <!-- RIGHT : USER + ADDRESS -->
                <div class="redeem-user-box">
                    <p><strong>User:</strong> {{ $redeem->user->name }}</p>
                    <p><strong>Email:</strong> {{ $redeem->user->email }}</p>
                    <p><strong>Phone:</strong> {{ $redeem->user->phone ?? '-' }}</p>

                    <div class="redeem-address">
                        <strong>Shipping Address:</strong>
                        <p>{!! nl2br(e(preg_replace('/[,|]/', "\n", $redeem->address))) !!}</p>
                    </div>

                    <div class="redeem-meta">
                        <span class="redeem-status {{ $redeem->status }}">
                            {{ ucfirst($redeem->status) }}
                        </span>
                        <span class="redeem-date">
                            {{ $redeem->created_at->format('d M Y, h:i A') }}
                        </span>
                    </div>

                    <div class="redeem-actions">
                        <form method="POST" action="{{ route('admin.redeems.ship', $redeem->id) }}">
                            @csrf

                            <button type="submit" class="status-btn">
                                <i class="fa-solid fa-rotate"></i>
                                Change Status Shipped
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <div class="page-header">
            <h4 class="page-title">
                <i class="fa-solid fa-box icon-red"></i> Shipping Slip
            </h4>
        </div>

        <div class="card p-4">
            <form action="{{ route('admin.redeems.generate-slip', $redeem->id) }}" method="POST">
                @csrf
                <div class="label-wrapper">

                    <!-- First Row: Ship To / From -->
                    <div class="row mb-3">
                        <div class="col-half col-left-border">
                            <div class="section-title ship-to">SHIP TO:</div>
                            <div class="section-content">
                                <strong>{{ $redeem->user->name }}</strong><br>
                                <p>{!! nl2br(e(preg_replace('/[,|]/', "\n", $redeem->address))) !!}</p>
                                Phone: {{ $redeem->user->phone ?? '-' }}
                            </div>
                        </div>

                        <div class="col-half">
                            <div class="section-title from-title">FROM:</div>
                            <div class="section-content">
                                <strong>Inco-inducomponents</strong><br>
                                Plot No:20,<br>SIDCO Industrial Park,<br>Muchukunnu, Koyilandy,kerala-673307<br>
                                Phone:0496 2690033<br>
                                Mobile: 9207193005, 9656193005<br>
                                email: inducomponentsinco@gmail.com
                            </div>
                        </div>
                    </div>

                    <!-- Second Row: Order Info / Remarks -->
                    <div class="row mid-row">
                        <div class="col-half col-left-border">
                            <div class="field-row mb-2">
                                <div class="field-label">ITEM: {{ $redeem->product->product_info ?? '' }}</div>
                            </div>
                            <div class="field-row">
                                <div class="field-label">SHIPPING DATE:</div>
                                <div class="field-value">
                                    <input type="date" name="shipping_date" class="form-control"
                                        value="{{ $redeem->shipping_date ?? now()->toDateString() }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-half">
                            <div class="remarks-title">REMARKS:</div>
                            <textarea name="remarks" class="form-control" rows="3"
                                placeholder="Add remarks...">{{ $redeem->remarks ?? '' }}</textarea>
                        </div>
                    </div>

                </div>

                <div class="action-bar">
                    <button type="submit" class="download-btn">
                        <i class="fa-solid fa-download"></i>
                        <span>Download PDF</span>
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection

@push('styles')
    <style>
        /* REDEEM SUMMARY */
        .redeem-summary-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .redeem-summary-header {
            background: #212529;
            color: #fff;
            padding: 12px 18px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .redeem-summary-body {
            display: flex;
            padding: 18px;
            gap: 20px;
        }

        /* PRODUCT */
        .redeem-product-box {
            width: 35%;
            display: flex;
            gap: 14px;
            align-items: center;
            border-right: 1px solid #eee;
            padding-right: 18px;
        }

        .redeem-product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #ddd;
        }

        .redeem-product-info h5 {
            margin: 0;
            font-size: 15px;
        }

        .redeem-points {
            font-size: 13px;
            color: #ce1212;
            font-weight: 600;
        }

        /* USER */
        .redeem-user-box {
            width: 65%;
            font-size: 13px;
        }

        .redeem-user-box p {
            margin: 4px 0;
        }

        .redeem-address {
            background: #f8f9fa;
            padding: 10px 12px;
            border-radius: 8px;
            margin-top: 8px;
        }

        .redeem-meta {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            align-items: center;
        }

        .redeem-status {
            padding: 4px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
        }

        .redeem-status.pending {
            background: #fff3cd;
            color: #856404;
        }

        .redeem-status.shipped {
            background: #d4edda;
            color: #155724;
        }

        .redeem-date {
            color: #666;
            font-size: 12px;
        }

        .label-wrapper {
            border: 2px solid #000;
            border-radius: 16px;
            padding: 20px;
        }

        .row {
            display: flex;
            width: 100%;
        }

        .col-half {
            width: 50%;
            padding: 10px 15px;
        }

        .col-left-border {
            border-right: 2px solid #000;
        }

        .section-title.ship-to {
            background: #000;
            color: #fff;
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .section-title.from {
            color: #555;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .section-content {
            line-height: 1.6;
            font-size: 13px;
        }

        .mid-row {
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .field-row {
            display: flex;
            padding: 8px 0;
        }

        .field-label {
            width: 40%;
            font-weight: bold;
        }

        .field-value {
            width: 60%;
        }

        textarea,
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .section-title {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
            display: inline-block;
            border-radius: 4px;
        }

        .ship-to-title {
            background: #000;
            color: #fff;
        }

        .from-title {
            color: #000000ff;
        }

        .action-bar {
            margin-top: 20px;
            text-align: right;
        }

        .download-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            background: linear-gradient(135deg, #ce1212, #a50e0e);
            color: #fff;

            border: none;
            border-radius: 8px;

            padding: 12px 22px;
            font-size: 15px;
            font-weight: 600;

            cursor: pointer;
            box-shadow: 0 6px 18px rgba(206, 18, 18, 0.35);
            transition: all 0.25s ease;
        }

        .download-btn i {
            font-size: 16px;
        }

        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(206, 18, 18, 0.45);
            background: linear-gradient(135deg, #b01010, #8f0c0c);
        }

        .download-btn:active {
            transform: translateY(0);
            box-shadow: 0 4px 12px rgba(206, 18, 18, 0.35);
        }

        .download-btn:focus {
            outline: none;
        }

        .redeem-actions {
            margin-top: 16px;
        }

        .redeem-actions form {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .status-select {
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 14px;
            cursor: pointer;
        }

        .status-select:focus {
            outline: none;
            border-color: #ce1212;
        }

        .status-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: linear-gradient(135deg, #ce1212, #a50e0e);
            color: #fff;

            border: none;
            border-radius: 6px;
            padding: 10px 16px;

            font-size: 14px;
            font-weight: 600;
            cursor: pointer;

            transition: all 0.25s ease;
        }

        .status-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(206, 18, 18, 0.35);
        }

        .status-btn i {
            font-size: 14px;
        }
    </style>
@endpush