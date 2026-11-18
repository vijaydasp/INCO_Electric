@forelse($pdfs as $pdf)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>
    <span class="pdf-badge">
        <i class="fa-solid fa-file-pdf"></i> PDF
    </span>
    <span class="pdf-filename">
        {{ basename($pdf->pdf_path) }}
    </span>
</td>

    <td>{{ $pdf->created_at->format('d M Y, h:i A') }}</td>
    <td>
        <a href="{{ route('admin.qr.download', $pdf->id) }}"
           class="btn btn-small btn-success">
            <i class="fa-solid fa-download"></i> Download
        </a>
    </td>
</tr>
@empty
<tr>
    <td colspan="4" class="empty-row">
        No QR PDF files found
    </td>
</tr>
@endforelse
