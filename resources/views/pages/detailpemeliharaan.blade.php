@extends('layout.main')

@section('konten')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('riwayat') }}" class="text-decoration-none">Riwayat</a></li>
            <li class="breadcrumb-item active">Detail Pemeliharaan</li>
        </ol>
    </nav>

    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold mb-1">Detail Pemeliharaan</h2>
                    <p class="text-muted mb-0">Informasi lengkap terkait pemeliharaan</p>
                </div>
                <div>
                    <span class="badge {{ $pemeliharaan->status === 'Selesai' ? 'bg-success' : 'bg-warning' }} px-4 py-2 fs-6">
                        <i class="bi {{ $pemeliharaan->status === 'Selesai' ? 'bi-check-circle' : 'bi-clock' }} me-2"></i>
                        {{ $pemeliharaan->status }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Informasi Aduan -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="bi bi-exclamation-triangle text-primary fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Informasi Aduan</h5>
                            <small class="text-muted">Data pelaporan kerusakan</small>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small mb-2">User Pelapor</label>
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-2 me-2">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </div>
                            <h6 class="mb-0 fw-semibold">{{ $pemeliharaan->user_aduan }}</h6>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small mb-2">Deskripsi Kerusakan</label>
                        <div class="bg-light rounded p-3">
                            <p class="mb-0">{{ $pemeliharaan->kerusakan }}</p>
                        </div>
                    </div>

                    <div>
                        <label class="text-muted small mb-2">Tanggal Aduan</label>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar-event text-primary me-2"></i>
                            <span class="fw-semibold">{{ $pemeliharaan->tanggal_aduan }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Penanganan -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="bi bi-tools text-success fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Informasi Penanganan</h5>
                            <small class="text-muted">Data tindakan perbaikan</small>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small mb-2">Petugas Penanganan</label>
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-2 me-2">
                                <i class="bi bi-person-badge text-secondary"></i>
                            </div>
                            <h6 class="mb-0 fw-semibold">{{ $pemeliharaan->nama_penanganan ?? '-' }}</h6>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small mb-2">Tanggal Penanganan</label>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar-check text-success me-2"></i>
                            <span class="fw-semibold">{{ $pemeliharaan->tanggal_penanganan ?? '-' }}</span>
                        </div>
                    </div>

                    <div>
                        <label class="text-muted small mb-2">Tindakan yang Dilakukan</label>
                        <div class="bg-light rounded p-3">
                            <p class="mb-0">{{ $pemeliharaan->tindakan ?? 'Belum ada tindakan' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
    $isHandled = !empty($pemeliharaan->tanggal_penanganan);
    $isDone = $pemeliharaan->status === 'Selesai';
@endphp

<div class="card border-0 shadow-sm mt-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Timeline Proses</h5>

        <div class="d-flex justify-content-between align-items-center position-relative">

            {{-- GARIS TIMELINE --}}
            <div class="position-absolute w-100 top-50 start-0 translate-middle-y"
                 style="height: 3px;
                 background:
                 {{ $isDone
                    ? 'linear-gradient(to right, #0d6efd 66%, #198754 66%)'
                    : ($isHandled
                        ? 'linear-gradient(to right, #0d6efd 50%, #ddd 50%)'
                        : 'linear-gradient(to right, #0d6efd 33%, #ddd 33%)')
                 }};
                 z-index: 0;">
            </div>

            {{-- ADUAN --}}
            <div class="text-center position-relative z-1">
                <div class="bg-primary rounded-circle p-3 d-inline-flex mb-2">
                    <i class="bi bi-file-earmark-text text-white fs-5"></i>
                </div>
                <div class="fw-semibold small">Aduan</div>
                <div class="text-muted" style="font-size: 0.75rem;">
                    {{ $pemeliharaan->tanggal_aduan }}
                </div>
            </div>

            {{-- PENANGANAN --}}
            <div class="text-center position-relative z-1">
                <div class="rounded-circle p-3 d-inline-flex mb-2
                    {{ $isHandled && !$isDone ? 'bg-warning' : ($isDone ? 'bg-primary' : 'bg-secondary') }}">
                    <i class="bi bi-wrench text-white fs-5"></i>
                </div>
                <div class="fw-semibold small">Pending</div>
                <div class="text-muted" style="font-size: 0.75rem;">
                    {{ $isHandled ? $pemeliharaan->tindakan : 'Pending' }}
                </div>
            </div>

            {{-- SELESAI --}}
            <div class="text-center position-relative z-1">
                <div class="rounded-circle p-3 d-inline-flex mb-2
                    {{ $isDone ? 'bg-success' : 'bg-secondary' }}">
                    <i class="bi bi-check-circle text-white fs-5"></i>
                </div>
                <div class="fw-semibold small">Selesai</div>
                <div class="text-muted" style="font-size: 0.75rem;">
                    {{ $isDone ? 'Completed' : 'Waiting' }}
                </div>
            </div>

        </div>
    </div>
</div>


    <!-- Action Buttons -->
    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('riwayat') }}" class="btn btn-outline-secondary px-4">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
        <a href="{{ route('requestpemeliharaan.edit', $pemeliharaan->id) }}"
   class="btn btn-primary px-4"
<i class="bi bi-pencil-square me-2"></i>Edit
</a>

        
    </div>
</div>

<style>
    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
    }
    
    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1) !important;
    }
    
    @media print {
        .breadcrumb, .btn {
            display: none;
        }
    }
</style>
@endsection