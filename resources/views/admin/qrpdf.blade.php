@extends('admin.layout')

@section('page-title', 'QR Code PDFs')

@section('content')

<div class="qr-page">

    <!-- Header -->
    <div class="qr-header">
        <h2>
            <i class="fa-solid fa-qrcode"></i> QR Code PDFs-single point
        </h2>

        <div class="qr-actions">
            <button type="button"
                    id="createQrBtn1"
                    class="btn btn-primary"
                    onclick="confirmCreateQrSingle()">
                <i class="fa-solid fa-plus"></i> Create single point QR Codes
            </button>

            <button type="button"
                    id="createQrBtn2"
                    class="btn btn-primary"
                    onclick="confirmCreateQrDouble()">
                <i class="fa-solid fa-plus"></i> Create Double point QR Codes
            </button>

            <a href="{{ route('admin.qr.downloadAll') }}" class="btn btn-success">
                <i class="fa-solid fa-download"></i> Download All
            </a>

            <form action="{{ route('admin.qr.clearAll') }}"
                  method="POST"
                  id="clearAllForm">
                @csrf
                @method('DELETE')

                <button type="button"
                        class="btn btn-danger"
                        onclick="confirmClearAll()">
                    <i class="fa-solid fa-trash"></i> Clear All
                </button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="qr-table-card">
        <table class="qr-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>PDF Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="qrTableBody">
                @include('admin.qr.table-rows', ['pdfs' => $pdfs])
            </tbody>
        </table>
    </div>

</div>

<!-- Custom Alert -->
<div id="customAlert" class="custom-alert">
    <div class="alert-box">

        <div id="alertIcon" class="alert-icon"></div>

        <h4 id="alertTitle"></h4>
        <p id="alertMessage"></p>

        <div class="alert-actions">
            <button class="btn btn-secondary" id="alertCancelBtn" onclick="closeAlert()">Cancel</button>
            <button class="btn btn-danger" id="alertConfirmBtn">OK</button>
        </div>

    </div>
</div>

@endsection

@push('styles')
<style>
.qr-page {
    padding: 20px;
    font-family: 'Segoe UI', sans-serif;
}

.qr-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.qr-actions {
    display: flex;
    gap: 10px;
}

.btn {
    padding: 8px 14px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-primary { background: #ce1212; color: #fff; }
.btn-success { background: #198754; color: #fff; }
.btn-danger  { background: #dc3545; color: #fff; }
.btn-secondary { background: #6c757d; color: #fff; }

.btn.loading {
    pointer-events: none;
    opacity: 0.85;
}

.btn.loading i {
    color: #fff;
}

.qr-table-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.05);
}

.qr-table {
    width: 100%;
    border-collapse: collapse;
}

.qr-table th,
.qr-table td {
    padding: 14px 16px;
}

.empty-row {
    text-align: center;
    padding: 30px;
    color: #6c757d;
}

/* Custom Alert */
.custom-alert {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.55);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.alert-box {
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    width: 380px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
}

.alert-icon i {
    font-size: 46px;
    margin-bottom: 10px;
}

.alert-actions {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 20px;
}
.pdf-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 8px;
    background: #fde2e2;
    color: #ce1212;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    margin-right: 8px;
}

.pdf-filename {
    font-weight: 500;
    color: #212529;
}

</style>
@endpush

@push('scripts')
<script>
/* ================= GLOBAL STATE ================= */
let qrProcessing = false;
let confirmAction = null;

/* ================= CREATE QR ================= */
function confirmCreateQrSingle() {
    if (qrProcessing) return;

    qrProcessing = true;

    const btn = document.getElementById('createQrBtn1');
    btn.classList.add('loading');
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Generating...';

    showWaitingAlert();

    fetch("{{ route('admin.qr.create.single') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        }
    })
    .then(res => res.json())
    .then(() => {
        showSuccessAlert(
            'QR codes are being generated in the background. please refresh the page after a few moments to see the new PDFs.'
        );

        setTimeout(resetCreateButton, 1200);
    })
    .catch(() => {
        showErrorAlert('Failed to start QR generation.');
        resetCreateButton();
    });
}

function confirmCreateQrDouble() {
    if (qrProcessing) return;

    qrProcessing = true;

    const btn = document.getElementById('createQrBtn2');
    btn.classList.add('loading');
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Generating...';

    showWaitingAlert();

    fetch("{{ route('admin.qr.create.double') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        }
    })
    .then(res => res.json())
    .then(() => {
        showSuccessAlert(
            'QR codes are being generated in the background. please refresh the page after a few moments to see the new PDFs.'
        );

        setTimeout(resetCreateButton, 1200);
    })
    .catch(() => {
        showErrorAlert('Failed to start QR generation.');
        resetCreateButton();
    });
}

/* ================= RESET BUTTON ================= */
function resetCreateButton() {
    qrProcessing = false;

    const btn = document.getElementById('createQrBtn');
    btn.classList.remove('loading');
    btn.innerHTML = '<i class="fa-solid fa-plus"></i> Create QR Codes';
}

/* ================= CLEAR ALL ================= */
function confirmClearAll() {
    showConfirmAlert(
        'Confirm Delete',
        'Are you sure you want to delete all QR Code PDFs? This action cannot be undone.',
        () => document.getElementById('clearAllForm').submit()
    );
}

/* ================= ALERT HELPERS ================= */
function showWaitingAlert() {
    setAlert(
        '<i class="fa-solid fa-spinner fa-spin" style="color:#ce1212"></i>',
        'Please wait',
        'QR codes are being generated in the background. This may take some time.',
        true
    );
}

function showSuccessAlert(message) {
    setAlert(
        '<i class="fa-solid fa-circle-check" style="color:#198754"></i>',
        'Success',
        message,
        true
    );
}

function showErrorAlert(message) {
    setAlert(
        '<i class="fa-solid fa-circle-xmark" style="color:#dc3545"></i>',
        'Error',
        message,
        true
    );
}

function showConfirmAlert(title, message, action) {
    confirmAction = action;

    setAlert(
        '<i class="fa-solid fa-triangle-exclamation" style="color:#dc3545"></i>',
        title,
        message,
        false
    );
}

/* ================= CORE ALERT ================= */
function setAlert(icon, title, message, okOnly) {
    document.getElementById('alertIcon').innerHTML = icon;
    document.getElementById('alertTitle').innerText = title;
    document.getElementById('alertMessage').innerText = message;

    const okBtn = document.getElementById('alertConfirmBtn');
    const cancelBtn = document.getElementById('alertCancelBtn');

    if (okOnly) {
        cancelBtn.style.display = 'none';
        okBtn.innerText = 'OK';
        okBtn.onclick = closeAlert;
    } else {
        cancelBtn.style.display = 'inline-flex';
        okBtn.innerText = 'Confirm';
        okBtn.onclick = () => {
            if (confirmAction) confirmAction();
            closeAlert();
        };
    }

    document.getElementById('customAlert').style.display = 'flex';
}

function closeAlert() {
    document.getElementById('customAlert').style.display = 'none';
    confirmAction = null;
}
</script>
@endpush
