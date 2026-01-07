@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&display=swap');

    * {
        font-family: 'Sora', sans-serif;
    }

    /* ===== BACKGROUND HALAMAN ===== */
    .page-background {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        min-height: 100vh;
        padding: 60px 20px;
        position: relative;
        overflow: hidden;
    }

    /* Animated background particles */
    .page-background::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 15% 25%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 85% 75%, rgba(139, 92, 246, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(236, 72, 153, 0.1) 0%, transparent 50%);
        animation: particleFloat 20s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes particleFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -30px) scale(1.1); }
        66% { transform: translate(-30px, 30px) scale(0.9); }
    }

    .container-custom {
        max-width: 1600px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    /* ===== ALERT ===== */
    .alert-green-soft {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.2) 0%, rgba(5, 150, 105, 0.15) 100%);
        color: #10b981;
        border: 2px solid rgba(16, 185, 129, 0.4);
        border-radius: 20px;
        padding: 20px 28px;
        font-weight: 600;
        font-size: 15px;
        margin-bottom: 32px;
        backdrop-filter: blur(20px);
        box-shadow: 0 12px 32px rgba(16, 185, 129, 0.2);
        animation: slideDown 0.5s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .btn-close {
        filter: brightness(0) invert(1);
    }

    /* ===== SEARCH BOX ===== */
    .search-container {
        margin-bottom: 24px;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .search-box {
        position: relative;
        width: 100%;
        max-width: 400px;
    }

    .search-box input {
        width: 100%;
        padding: 14px 48px 14px 20px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.08);
        color: #e2e8f0;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .search-box input::placeholder {
        color: #94a3b8;
    }

    .search-box input:focus {
        outline: none;
        border-color: #3b82f6;
        background: rgba(255, 255, 255, 0.12);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
    }

    .search-box button {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        border: none;
        border-radius: 10px;
        padding: 8px 16px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .search-box button:hover {
        transform: translateY(-50%) scale(1.05);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
    }

    /* ===== CARD ===== */
    .card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 28px;
        overflow: hidden;
        margin-bottom: 40px;
        box-shadow: 
            0 0 0 1px rgba(255, 255, 255, 0.05),
            0 20px 60px rgba(0, 0, 0, 0.3);
        animation: cardFloat 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes cardFloat {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-header {
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        padding: 24px 32px;
        font-weight: 800;
        font-size: 20px;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
    }

    .card-header::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 6px;
        background: linear-gradient(180deg, #3b82f6 0%, #8b5cf6 100%);
    }

    .card-body {
        padding: 32px;
    }

    /* ===== TABLE ===== */
    .table-responsive {
        border-radius: 0 0 28px 28px;
        overflow: hidden;
    }

    .table {
        margin-bottom: 0;
        font-size: 14px;
        color: #e2e8f0;
    }

    .table thead {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(139, 92, 246, 0.2) 100%);
    }

    .table thead th {
        padding: 18px 20px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 1px;
        color: #cbd5e1;
        border: 1px solid rgba(255, 255, 255, 0.1);
        white-space: nowrap;
    }

    .table tbody td {
        padding: 16px 20px;
        vertical-align: middle;
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: #cbd5e1;
        background: rgba(255, 255, 255, 0.02);
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background: rgba(59, 130, 246, 0.1);
        transform: scale(1.01);
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.2);
    }

    /* ===== PAGINATION ===== */
    .pagination-container {
        padding: 24px 32px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-top: 2px solid rgba(255, 255, 255, 0.1);
        flex-direction: column;
        gap: 16px;
    }

    .pagination-info {
        color: #94a3b8;
        font-size: 14px;
        font-weight: 500;
        order: 2;
    }

    .pagination {
        margin: 0;
        gap: 0;
        display: inline-flex;
        align-items: center;
        border-radius: 6px;
        overflow: hidden;
        background: white;
        border: 1px solid #d1d5db;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        order: 1;
    }

    .pagination .page-item {
        margin: 0;
    }

    .pagination .page-link {
        background: white;
        border: none;
        border-right: 1px solid #e5e7eb;
        color: #6b7280;
        padding: 10px 16px;
        border-radius: 0;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.2s ease;
        margin: 0;
        min-width: 40px;
        height: 40px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pagination .page-item:first-child .page-link {
        border-radius: 6px 0 0 6px;
    }

    .pagination .page-item:last-child .page-link {
        border-right: none;
        border-radius: 0 6px 6px 0;
    }

    .pagination .page-link:hover:not(.disabled) {
        background: #f3f4f6;
        color: #374151;
    }

    .pagination .page-item.active .page-link {
        background: #1d4ed8;
        color: white;
        border-color: #1d4ed8;
        position: relative;
        z-index: 1;
    }

    .pagination .page-item.disabled .page-link {
        background: white;
        color: #d1d5db;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .pagination .page-item.disabled .page-link:hover {
        background: white;
        color: #d1d5db;
    }

    /* Styling khusus untuk arrow */
    .pagination .page-link[rel="prev"],
    .pagination .page-link[rel="next"] {
        font-weight: 600;
        font-size: 16px;
    }

    /* ===== BADGES ===== */
    .badge {
        font-size: 12px;
        padding: 6px 14px;
        border-radius: 10px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .bg-dark {
        background: linear-gradient(135deg, #64748b 0%, #475569 100%) !important;
        box-shadow: 0 4px 12px rgba(71, 85, 105, 0.3);
    }

    /* ===== BUTTONS ===== */
    .btn {
        font-size: 12px;
        padding: 8px 18px;
        border-radius: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5);
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(71, 85, 105, 0.4);
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(71, 85, 105, 0.5);
        background: linear-gradient(135deg, #475569 0%, #334155 100%);
    }

    .btn-danger {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(239, 68, 68, 0.5);
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    }

    .btn-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(245, 158, 11, 0.5);
        background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
    }

    /* ===== MODAL ===== */
    .modal-backdrop {
        backdrop-filter: blur(8px);
        background-color: rgba(0, 0, 0, 0.7);
    }

    .modal-content {
        background: linear-gradient(145deg, #1e293b 0%, #0f172a 100%);
        border: 2px solid rgba(239, 68, 68, 0.3);
        border-radius: 24px;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(20px);
        overflow: hidden;
    }

    .modal-header {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        padding: 24px 32px;
        border-radius: 22px 22px 0 0;
    }

    .modal-title {
        font-weight: 800;
        font-size: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #ffffff;
    }

    .modal-body {
        padding: 32px;
        color: #cbd5e1;
        font-size: 16px;
        line-height: 1.6;
    }

    .modal-body p {
        margin-bottom: 16px;
        color: #e2e8f0;
    }

    .modal-body strong {
        color: #ef4444;
        font-size: 18px;
        display: block;
        margin-top: 12px;
        font-weight: 700;
    }

    .modal-footer {
        border-top: 2px solid rgba(255, 255, 255, 0.1);
        padding: 24px 32px;
        background: rgba(0, 0, 0, 0.2);
    }

    .modal-footer .btn {
        min-width: 100px;
        padding: 10px 24px;
        font-size: 13px;
    }

    .btn-close {
        filter: brightness(0) invert(1);
        opacity: 1;
    }

    .btn-close:hover {
        opacity: 0.8;
        transform: rotate(90deg);
        transition: all 0.3s ease;
    }

    /* ===== TEXT COLORS ===== */
    .text-muted {
        color: #64748b !important;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .page-background {
            padding: 30px 15px;
        }

        .card-header {
            padding: 20px 24px;
            font-size: 16px;
        }

        .table {
            font-size: 12px;
        }

        .table thead th,
        .table tbody td {
            padding: 12px 14px;
        }

        .btn {
            padding: 6px 12px;
            font-size: 11px;
        }

        .d-flex.gap-2 {
            flex-direction: column;
        }

        .search-box {
            max-width: 100%;
        }

        .pagination-container {
            flex-direction: column;
            gap: 16px;
        }
    }
</style>

<div class="page-background">
    <div class="container-custom">

        {{-- ALERT --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show alert-green-soft">
                ✓ {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ================= --}}
        {{-- TABEL PERIFERAL --}}
        {{-- ================= --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">
                Riwayat Perangkat Periferal
            </div>

            <div class="card-body">
                {{-- SEARCH BOX --}}
                <form action="{{ route('riwayat.periferal') }}" method="GET">
                    <div class="search-container">
                        <div class="search-box">
                            <input type="text" 
                                   name="search" 
                                   placeholder="🔍 Cari ID, nama, tipe, posisi, pengguna..." 
                                   value="{{ request('search') }}">
                            <button type="submit">Cari</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Perangkat</th>
                                <th>Posisi</th>
                                <th>Pengguna</th>
                                <th style="text-align:center; vertical-align:middle;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($periferals as $item)
                                <tr>
                                    <td class="text-center">{{ ($periferals->currentPage() - 1) * $periferals->perPage() + $loop->iteration }}</td>
                                    <td>{{ $item->id_perangkat }}</td>
                                    <td>
                                        <span class="badge bg-dark">
                                            {{ $item->jenis_perangkat }}
                                        </span>
                                    </td>
                                    <td>{{ $item->posisi }}</td>
                                    <td>{{ $item->pengguna }}</td>

                                    {{-- AKSI --}}
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- Pemeliharaan --}}
                                            <a href="{{ route('perangkat.riwayat', ['id' => $item->id, 'from' => 'periferal']) }}" 
                                               class="btn btn-warning">
                                                <i class="bi bi-tools me-1"></i>PEMELIHARAAN
                                            </a>
                                            <a href="{{ route('periferal.edit', $item->id) }}"
                                               class="btn btn-secondary btn-sm">
                                                Edit
                                            </a>

                                            <button type="button"
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusPeriferal{{ $item->id }}">
                                                Hapus
                                            </button>
                                            <a href="{{ route('periferal.show', $item->id) }}" class="btn btn-primary btn-sm">
                                                Detail
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        @if(request('search'))
                                            Tidak ada data yang sesuai dengan pencarian "{{ request('search') }}"
                                        @else
                                            Data periferal belum tersedia
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                

                {{-- PAGINATION --}}
                @if($periferals->hasPages())
                <div class="pagination-container">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{-- Previous Button --}}
                            @if ($periferals->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">‹</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $periferals->previousPageUrl() }}" rel="prev">‹</a>
                                </li>
                            @endif

                            {{-- Page Numbers --}}
                            @foreach ($periferals->getUrlRange(1, $periferals->lastPage()) as $page => $url)
                                @if ($page == $periferals->currentPage())
                                    <li class="page-item active">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Button --}}
                            @if ($periferals->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $periferals->nextPageUrl() }}" rel="next">›</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">›</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    <div class="pagination-info">
                        Menampilkan {{ $periferals->firstItem() ?? 0 }} - {{ $periferals->lastItem() ?? 0 }} dari {{ $periferals->total() }} data
                    </div>
                </div>
                @endif

            
            </div>
        </div>

    </div>
</div>

{{-- ===================================== --}}
{{-- MODAL HAPUS PERIFERAL --}}
{{-- ===================================== --}}
@foreach ($periferals as $item)
<div class="modal fade" id="hapusPeriferal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusPeriferalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusPeriferalLabel{{ $item->id }}">
                    ⚠️ Konfirmasi Hapus
                </h5>
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <p>Apakah Anda yakin ingin menghapus data periferal ini?</p>
                <strong>{{ $item->jenis_perangkat }} - {{ $item->merk }}</strong>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>

                <form action="{{ route('periferal.destroy', $item->id) }}"
                      method="POST"
                      style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection