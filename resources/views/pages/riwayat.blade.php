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

    .card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .card:nth-child(3) {
        animation-delay: 0.2s;
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
        padding: 0;
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

    /* ===== BADGES ===== */
    .badge {
        font-size: 12px;
        padding: 6px 14px;
        border-radius: 10px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .bg-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .bg-danger {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .bg-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        color: #ffffff !important;
    }

    .bg-dark {
        background: linear-gradient(135deg, #64748b 0%, #475569 100%) !important;
        box-shadow: 0 4px 12px rgba(71, 85, 105, 0.3);
    }

    .bg-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%) !important;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
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

    /* Button Close Modal */
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

    /* ===== EMPTY STATE ===== */
    .table tbody tr td.text-center.text-muted {
        padding: 60px 20px;
        font-size: 16px;
        font-weight: 600;
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

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            padding: 20px 24px;
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

        {{-- ===================== --}}
        {{-- TABEL PERANGKAT UTAMA --}}
        {{-- ===================== --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">
                Riwayat Perangkat Utama
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nama Perangkat</th>
                                <th>Posisi</th>
                                
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($perangkatUtamas as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_perangkat }}</td>
                                    <td>{{ $item->jenis_perangkat }}</td>
                                    <td>{{ $item->posisi }}</td>
                                    
                
                                    <td class="text-center">
                                        <span class="badge {{ $item->status === 'OK' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td>{{ $item->keterangan ?? '-' }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('perangkatutama.edit', $item->id) }}"
                                               class="btn btn-secondary btn-sm">
                                                Edit
                                            </a>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusModal{{ $item->id }}">
                                                Hapus
                                            </button>
                                            <a href="{{ route('perangkatutama.show', $item->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                Detail
                                             </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        Data perangkat utama belum tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- ================= --}}
        {{-- TABEL PERIFERAL --}}
        {{-- ================= --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">
                Riwayat Perangkat Periferal
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Perangkat</th>
                                <th>Merk</th>
                                <th>Tipe</th>
                                <th>Posisi</th>
                                <th>Pengguna</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($periferals as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->id_perangkat }}</td>
                                    <td>
                                        <span class="badge bg-dark">
                                            {{ $item->jenis_perangkat }}
                                        </span>
                                    </td>
                                    <td>{{ $item->merk }}</td>
                                    <td>{{ $item->tipe }}</td>
                                    <td>{{ $item->posisi }}</td>
                                    <td>{{ $item->pengguna }}</td>

                                    {{-- AKSI --}}
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
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
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Data periferal belum tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- =============================== --}}
        {{-- TABEL RIWAYAT REQUEST PEMELIHARAAN --}}
        {{-- =============================== --}}
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-white fw-bold">
                Riwayat Pemeliharaan Perangkat
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User Aduan</th>
                                <th>Kerusakan</th>
                                
                                
                                <th>Petugas</th>
                                <th>Tindakan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($requestPemeliharaans as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->user_aduan }}</td>
                                    <td>{{ $item->kerusakan }}</td>
                                    
                                    
                                    <td>{{ $item->nama_penanganan ?? '-' }}</td>
                                    <td>{{ $item->tindakan ?? '-' }}</td>
                                    <td class="text-center">
                                        <span class="badge {{ $item->status === 'Selesai' ? 'bg-success' : 'bg-warning' }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                     {{-- AKSI --}}
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">

                                            <a href="{{ route('requestpemeliharaan.edit', $item->id) }}"
                                            class="btn btn-secondary btn-sm">
                                                Edit
                                            </a>

                                            <button type="button"
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusPemeliharaan{{ $item->id }}">
                                                Hapus
                                            </button>

                                            <a href="{{ route('requestpemeliharaan.show', $item->id) }}"
                                            class="btn btn-primary btn-sm">
                                                Detail
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        Data request pemeliharaan belum tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- ========================================= --}}
{{-- MODAL HAPUS PERANGKAT UTAMA (LUAR TABEL) --}}
{{-- ========================================= --}}
@foreach ($perangkatUtamas as $item)
<div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel{{ $item->id }}">
                    ⚠️ Konfirmasi Hapus
                </h5>
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah Anda yakin ingin menghapus data perangkat utama ini?</p>
                <strong>{{ $item->nama_perangkat }}</strong>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form action="{{ route('perangkatutama.destroy', $item->id) }}"
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

{{-- ===================================== --}}
{{-- MODAL HAPUS PERIFERAL (LUAR TABEL) --}}
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

{{-- ========================================== --}}
{{-- MODAL HAPUS PEMELIHARAAN (LUAR TABEL) --}}
{{-- ========================================== --}}
@foreach ($requestPemeliharaans as $item)
<div class="modal fade" id="hapusPemeliharaan{{ $item->id }}" tabindex="-1" aria-labelledby="hapusPemeliharaanLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusPemeliharaanLabel{{ $item->id }}">
                    ⚠️ Konfirmasi Hapus
                </h5>
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <div class="modal-body text-center">
                <p>Apakah Anda yakin ingin menghapus data pemeliharaan ini?</p>
                <strong>{{ $item->kerusakan }}</strong>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>

                <form action="{{ route('requestpemeliharaan.destroy', $item->id) }}"
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