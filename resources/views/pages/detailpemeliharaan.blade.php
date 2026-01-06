@extends('layout.main')

@section('konten')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item">
                <a href="{{ route('riwayat') }}" class="text-decoration-none text-primary">
                    <i class="bi bi-house-door me-1"></i>Riwayat
                </a>
            </li>
            <li class="breadcrumb-item active fw-semibold">Detail Pemeliharaan</li>
        </ol>
    </nav>

    <!-- Header Section with Gradient Background -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden header-gradient">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bold mb-2 text-white">
                                <i class="bi bi-clipboard-data me-2"></i>Detail Pemeliharaan
                            </h2>
                            <p class="text-white-50 mb-0">
                                <i class="bi bi-info-circle me-1"></i>Informasi lengkap terkait pemeliharaan
                            </p>
                        </div>
                        <div>
                            <span class="badge {{ $pemeliharaan->status === 'Selesai' ? 'badge-success-custom' : 'badge-warning-custom' }} px-4 py-3 fs-6 shadow-sm">
                                <i class="bi {{ $pemeliharaan->status === 'Selesai' ? 'bi-check-circle-fill' : 'bi-hourglass-split' }} me-2"></i>
                                {{ $pemeliharaan->status }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Informasi Aduan -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-hover h-100 card-modern">
                <div class="card-header bg-transparent border-0 p-4 pb-0">
                    <div class="d-flex align-items-center">
                        <div class="icon-box icon-box-danger me-3">
                            <i class="bi bi-exclamation-triangle-fill fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Informasi Aduan</h5>
                            <small class="text-muted">
                                <i class="bi bi-clipboard-check me-1"></i>Data pelaporan kerusakan
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="info-item mb-4">
                        <label class="text-muted small mb-2 text-uppercase fw-semibold">
                            <i class="bi bi-person-circle me-1"></i>User Pelapor
                        </label>
                        <div class="info-content">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 border-start border-4 border-danger">
                                <div class="avatar-circle bg-danger bg-opacity-10 me-3">
                                    <i class="bi bi-person-fill text-danger"></i>
                                </div>
                                <h6 class="mb-0 fw-bold text-dark">{{ $pemeliharaan->user_aduan }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="info-item mb-4">
                        <label class="text-muted small mb-2 text-uppercase fw-semibold">
                            <i class="bi bi-journal-text me-1"></i>Jenis Perangkat
                        </label>
                        <div class="info-content-box">
                            <p class="mb-0 lh-lg">{{ $pemeliharaan->jenis_perangkat }}</p>
                        </div>
                    </div>

                    <div class="info-item mb-4">
                        <label class="text-muted small mb-2 text-uppercase fw-semibold">
                            <i class="bi bi-journal-text me-1"></i>Deskripsi Kerusakan
                        </label>
                        <div class="info-content-box">
                            <p class="mb-0 lh-lg">{{ $pemeliharaan->kerusakan }}</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <label class="text-muted small mb-2 text-uppercase fw-semibold">
                            <i class="bi bi-calendar-event me-1"></i>Tanggal Aduan
                        </label>
                        <div class="d-flex align-items-center p-3 bg-light rounded-3">
                            <div class="date-icon me-3">
                                <i class="bi bi-calendar-day text-danger fs-4"></i>
                            </div>
                            <span class="fw-semibold fs-6">{{ $pemeliharaan->tanggal_aduan }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Penanganan -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-hover h-100 card-modern">
                <div class="card-header bg-transparent border-0 p-4 pb-0">
                    <div class="d-flex align-items-center">
                        <div class="icon-box icon-box-success me-3">
                            <i class="bi bi-tools fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Informasi Penanganan</h5>
                            <small class="text-muted">
                                <i class="bi bi-wrench-adjustable me-1"></i>Data tindakan perbaikan
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="info-item mb-4">
                        <label class="text-muted small mb-2 text-uppercase fw-semibold">
                            <i class="bi bi-person-badge me-1"></i>Petugas Penanganan
                        </label>
                        <div class="info-content">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 border-start border-4 border-success">
                                <div class="avatar-circle bg-success bg-opacity-10 me-3">
                                    <i class="bi bi-person-gear text-success"></i>
                                </div>
                                <h6 class="mb-0 fw-bold text-dark">{{ $pemeliharaan->nama_penanganan ?? '-' }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="info-item mb-4">
                        <label class="text-muted small mb-2 text-uppercase fw-semibold">
                            <i class="bi bi-calendar-check me-1"></i>Tanggal Penanganan
                        </label>
                        <div class="d-flex align-items-center p-3 bg-light rounded-3">
                            <div class="date-icon me-3">
                                <i class="bi bi-calendar-check-fill text-success fs-4"></i>
                            </div>
                            <span class="fw-semibold fs-6">{{ $pemeliharaan->tanggal_penanganan ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <label class="text-muted small mb-2 text-uppercase fw-semibold">
                            <i class="bi bi-list-check me-1"></i>Tindakan yang Dilakukan
                        </label>
                        <div class="info-content-box">
                            <p class="mb-0 lh-lg">{{ $pemeliharaan->tindakan ?? 'Belum ada tindakan' }}</p>
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

    <!-- Timeline Section -->
    <div class="card border-0 shadow-hover mt-4 card-modern">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
                <div class="icon-box icon-box-primary me-3">
                    <i class="bi bi-clock-history fs-4"></i>
                </div>
                <h5 class="fw-bold mb-0">Timeline Proses Pemeliharaan</h5>
            </div>

            <div class="timeline-container py-4">
                <div class="d-flex justify-content-between align-items-center position-relative px-3">
                    
                    {{-- GARIS TIMELINE --}}
                    <div class="timeline-line"></div>
                    <div class="timeline-progress" style="width: {{ $isDone ? '100%' : ($isHandled ? '50%' : '0%') }}"></div>

                    {{-- ADUAN --}}
                    <div class="timeline-step active">
                        <div class="timeline-dot timeline-dot-primary">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-label">Aduan Masuk</div>
                            <div class="timeline-date">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $pemeliharaan->tanggal_aduan }}
                            </div>
                        </div>
                    </div>

                    {{-- PENANGANAN --}}
                    <div class="timeline-step {{ $isHandled ? 'active' : '' }}">
                        <div class="timeline-dot {{ $isHandled ? ($isDone ? 'timeline-dot-primary' : 'timeline-dot-warning') : 'timeline-dot-inactive' }}">
                            <i class="bi bi-wrench-adjustable-circle-fill"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-label">Penanganan</div>
                            <div class="timeline-date">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ $isHandled ? $pemeliharaan->tanggal_penanganan : 'Menunggu' }}
                            </div>
                        </div>
                    </div>

                    {{-- SELESAI --}}
                    <div class="timeline-step {{ $isDone ? 'active' : '' }}">
                        <div class="timeline-dot {{ $isDone ? 'timeline-dot-success' : 'timeline-dot-inactive' }}">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-label">Selesai</div>
                            <div class="timeline-date">
                                <i class="bi bi-calendar3 me-1"></i>
                                @if($isDone)
                                    {{ \Carbon\Carbon::parse($pemeliharaan->updated_at)->format('d M Y') }}
                                @else
                                    Menunggu
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-4 d-flex gap-3">
        <a href="{{ route('riwayat') }}" class="btn btn-light-custom px-4 py-3">
            <i class="bi bi-arrow-left-circle me-2"></i>Kembali
        </a>
        <a href="{{ route('requestpemeliharaan.edit', $pemeliharaan->id) }}" class="btn btn-primary-custom px-4 py-3">
            <i class="bi bi-pencil-square me-2"></i>Edit Pemeliharaan
        </a>
    </div>
</div>

<style>
    /* Header Gradient */
    .header-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px !important;
    }

    /* Breadcrumb */
    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        color: #667eea;
        font-weight: bold;
    }

    /* Card Modern */
    .card-modern {
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .shadow-hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .shadow-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    /* Icon Box */
    .icon-box {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    
    

    .icon-box-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .icon-box:hover {
        transform: rotate(5deg) scale(1.05);
    }

    /* Avatar Circle */
    .avatar-circle {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    /* Info Content Box */
    .info-content-box {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 10px;
        padding: 1rem 1.25rem;
        border-left: 4px solid #667eea;
    }

    /* Date Icon */
    .date-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* Badge Custom */
    .badge-success-custom {
        background: linear-gradient(135deg, #51cf66 0%, #37b24d 100%);
        color: white;
        border-radius: 25px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .badge-warning-custom {
        background: linear-gradient(135deg, #ffd43b 0%, #fab005 100%);
        color: #495057;
        border-radius: 25px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* Timeline Styles */
    .timeline-container {
        padding: 2rem 0;
    }

    .timeline-line {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 4px;
        background: #e9ecef;
        transform: translateY(-50%);
        z-index: 0;
        border-radius: 10px;
    }

    .timeline-progress {
        position: absolute;
        top: 50%;
        left: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea 0%, #51cf66 100%);
        transform: translateY(-50%);
        z-index: 1;
        border-radius: 10px;
        transition: width 0.6s ease;
    }

    .timeline-step {
        position: relative;
        z-index: 2;
        text-align: center;
        flex: 1;
    }

    .timeline-dot {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        border: 4px solid white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .timeline-dot-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .timeline-dot-warning {
        background: linear-gradient(135deg, #ffd43b 0%, #fab005 100%);
        color: #495057;
    }

    .timeline-dot-success {
        background: linear-gradient(135deg, #51cf66 0%, #37b24d 100%);
        color: white;
    }

    .timeline-dot-inactive {
        background: #e9ecef;
        color: #adb5bd;
    }

    .timeline-step.active .timeline-dot {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    .timeline-content {
        margin-top: 0.5rem;
    }

    .timeline-label {
        font-weight: 700;
        font-size: 0.95rem;
        color: #495057;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .timeline-date {
        font-size: 0.85rem;
        color: #6c757d;
        font-weight: 500;
        background: white;
        display: inline-block;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    /* Button Custom */
    .btn-light-custom {
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        color: #495057;
        font-weight: 600;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-light-custom:hover {
        background: white;
        border-color: #667eea;
        color: #667eea;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .timeline-dot {
            width: 55px;
            height: 55px;
            font-size: 1.4rem;
        }

        .timeline-label {
            font-size: 0.8rem;
        }

        .timeline-date {
            font-size: 0.75rem;
            padding: 0.3rem 0.8rem;
        }

        .header-gradient .card-body {
            padding: 1.5rem !important;
        }

        .header-gradient h2 {
            font-size: 1.5rem;
        }
    }

    @media print {
        .breadcrumb, .btn, .shadow-hover:hover {
            display: none;
        }
        
        .card-modern {
            box-shadow: none !important;
            page-break-inside: avoid;
        }
    }
</style>
@endsection