@extends('admin.layout')

@section('content')

<div class="container py-4 qr-history-page">

    <div class="qr-history-card">

        <!-- HEADER -->
        <div class="qr-history-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">
                <i class="fa-solid fa-qrcode"></i>
                QR Scan History
            </h5>

            <span class="user-badge">
                <i class="fa-solid fa-user"></i>
                {{ $user->name }}
            </span>

        </div>


        <!-- BODY -->
        <div class="card-body">

            <div class="table-responsive">

                <table class="qr-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <!-- <th>QR Code</th> -->
                            <th>Point Type</th>
                            <th>Points Earned</th>
                            <th>Scanned Date</th>
                        </tr>
                    </thead>


                    <tbody>

                    @forelse($histories as $history)

                        <tr>

                            <td>
                                {{ $loop->iteration + ($histories->currentPage()-1) * $histories->perPage() }}
                            </td>


                            <!-- <td>
                                <span class="qr-code-text">
                                    {{ substr($history->data,0,25) }}...
                                </span>
                            </td> -->


                            <td>

                                @if($history->point == 2)

                                    <span class="point-badge double-point">
                                        <i class="fa-solid fa-star"></i>
                                        Double Point
                                    </span>

                                @else

                                    <span class="point-badge single-point">
                                        <i class="fa-solid fa-circle"></i>
                                        Single Point
                                    </span>

                                @endif

                            </td>


                            <td>
                                <span class="points-earned">
                                    +{{ $history->point }}
                                </span>
                            </td>


                            <td>
                                <span class="scan-date">
                                    <i class="fa-regular fa-clock"></i>
                                    {{ $history->scanned_at?->format('d M Y, h:i A') }}
                                </span>
                            </td>


                        </tr>


                    @empty

                        <tr>
                            <td colspan="5">
                                <div class="empty-box">
                                    <i class="fa-solid fa-qrcode fa-2x mb-2"></i>
                                    <br>
                                    No QR scan history found
                                </div>
                            </td>
                        </tr>

                    @endforelse


                    </tbody>

                </table>

            </div>


            <!-- PAGINATION -->
            <div class="pagination-wrapper mt-4">
    {{ $histories->onEachSide(1)->links('pagination.admin') }}
</div>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>


.qr-history-page{
    padding:20px;
}


/* CARD */

.qr-history-card{

    background:#fff;
    border-radius:20px;
    overflow:hidden;
    border:none;
    box-shadow:0 15px 40px rgba(0,0,0,.08);

}



/* HEADER */

.qr-history-header{

    padding:22px 28px;
    background:linear-gradient(135deg,#ce1212,#8b0000);
    color:#fff;

}


.qr-history-header h5{

    font-size:22px;
    font-weight:700;

}



.user-badge{

    background:#fff;
    color:#ce1212;
    padding:8px 18px;
    border-radius:30px;
    font-weight:600;
    display:flex;
    align-items:center;
    gap:8px;

}



/* TABLE */

.qr-table{

    width:100%;
    border-collapse:separate;
    border-spacing:0 12px;

}



.qr-table thead th{

    border:none;
    padding:12px 16px;
    color:#777;
    font-size:13px;
    text-transform:uppercase;

}



.qr-table tbody tr{

    background:#fff;
    box-shadow:0 5px 18px rgba(0,0,0,.06);
    transition:.25s;

}



.qr-table tbody tr:hover{

    transform:translateY(-3px);
    box-shadow:0 12px 25px rgba(0,0,0,.12);

}



.qr-table td{

    padding:16px;
    border:none;
    vertical-align:middle;

}



.qr-table td:first-child{

    border-radius:14px 0 0 14px;

}


.qr-table td:last-child{

    border-radius:0 14px 14px 0;

}



/* QR DATA */

.qr-code-text{

    background:#f5f5f5;
    padding:8px 12px;
    border-radius:8px;
    color:#555;
    font-family:monospace;
    font-size:13px;

}



/* BADGES */


.point-badge{

    padding:7px 15px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
    display:inline-flex;
    align-items:center;
    gap:6px;

}


.single-point{

    background:#e7f0ff;
    color:#2563eb;

}


.double-point{

    background:#dcfce7;
    color:#15803d;

}



/* POINT */

.points-earned{

    color:#ce1212;
    font-size:18px;
    font-weight:700;

}



/* DATE */


.scan-date{

    color:#555;
    font-size:14px;

}



/* EMPTY */

.empty-box{

    text-align:center;
    padding:40px;
    color:#999;

}



/* PAGINATION */

.pagination{

    justify-content:center;

}


.pagination .page-link{

    border-radius:10px;
    margin:0 3px;
    color:#ce1212;

}


.pagination .active .page-link{

    background:#ce1212;
    border-color:#ce1212;

}



/* MOBILE */

@media(max-width:768px){

    .qr-history-header{

        flex-direction:column;
        align-items:flex-start !important;
        gap:15px;

    }


    .qr-table{

        min-width:700px;

    }

}



</style>

@endpush