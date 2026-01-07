@extends('layout.main')

@section('konten')
<div class="container py-5">
    @php
        // Tentukan route kembali berdasarkan parameter 'from'
        $backRoute = ($from ?? 'utama') === 'periferal' 
            ? route('riwayat.periferal') 
            : route('riwayat.perangkat-utama');
        $backLabel = ($from ?? 'utama') === 'periferal' 
            ? 'Riwayat Periferal' 
            : 'Riwayat Perangkat Utama';
    @endphp
    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item">
                <a href="{{ $backRoute }}" class="text-decoration-none text-primary">
                    <i class="bi bi-house-door me-1"></i>{{ $backLabel }}
                </a>
            </li>
            <li class="breadcrumb-item active fw-semibold">Riwayat Pemeliharaan Perangkat</li>
        </ol>
    </nav>

    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg overflow-hidden header-gradient">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bold mb-2 text-white">
                                <i class="bi bi-clock-history me-2"></i>Riwayat Pemeliharaan
                            </h2>
                            <p class="text-white-50 mb-0">
                                <i class="bi bi-info-circle me-1"></i>
                                Perangkat: <strong>{{ $perangkat->nama_perangkat ?? $perangkat->nama ?? 'N/A' }}</strong>
                            </p>
                        </div>
                        <div>
                            <span class="badge badge-info-custom px-4 py-3 fs-6 shadow-sm">
                                <i class="bi bi-laptop me-2"></i>
                                {{ $perangkat->jenis_perangkat ?? 'Perangkat' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($riwayatPemeliharaan->count() == 0 && !request('search'))
        <!-- Belum Ada Riwayat -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-hover card-modern">
                    <div class="card-body text-center py-5">
                        <div class="empty-state">
                            <div class="empty-icon mb-4">
                                <i class="bi bi-inbox display-1 text-muted"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Belum Ada Riwayat Pemeliharaan</h4>
                            <p class="text-muted mb-4">
                                Perangkat ini belum pernah dalam pemeliharaan atau belum ada laporan kerusakan yang tercatat.
                            </p>
                            <a href="{{ $backRoute }}" class="btn btn-primary-custom px-4 py-3">
                                <i class="bi bi-arrow-left-circle me-2"></i>Kembali ke {{ $backLabel }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Tabel Riwayat -->
        <div class="card border-0 shadow-hover card-modern">
            <div class="card-header bg-transparent border-0 p-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                        <div class="icon-box icon-box-primary me-3">
                            <i class="bi bi-list-ul fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Daftar Riwayat Pemeliharaan</h5>
                            <small class="text-muted">
                                <i class="bi bi-graph-up me-1"></i>Total {{ $riwayatPemeliharaan->total() }} riwayat pemeliharaan
                            </small>
                        </div>
                    </div>
                    
                    <!-- Search Box -->
                    <div class="search-box">
                        <form method="GET" action="{{ route('perangkat.riwayat', ['id' => $perangkat->id, 'from' => $from ?? 'utama']) }}">
                            <div class="position-relative">
                                <input type="text" 
                                       name="search" 
                                       class="form-control" 
                                       placeholder="🔍 Cari pelapor, kerusakan, petugas..." 
                                       value="{{ request('search') }}"
                                       style="min-width: 250px; padding-right: 90px;">
                                <button type="submit" class="btn btn-primary-custom position-absolute" 
                                        style="right: 8px; top: 50%; transform: translateY(-50%);">
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-header-custom">
                            <tr>
                                <th class="text-center" style="width: 60px;">No</th>
                                <th>Tanggal Aduan</th>
                                <th>Pelapor</th>
                                <th>Kerusakan</th>
                                <th>Status</th>
                                <th>Petugas</th>
                                <th>Tanggal Selesai</th>
                                <th class="text-center" style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayatPemeliharaan as $index => $item)
                            <tr>
                                <td class="text-center fw-semibold">{{ $riwayatPemeliharaan->firstItem() + $index }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-calendar-event text-primary me-2"></i>
                                        <span>{{ $item->tanggal_aduan }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-primary bg-opacity-10 me-2">
                                            <i class="bi bi-person-fill text-primary"></i>
                                        </div>
                                        <span class="fw-semibold">{{ $item->user_aduan }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-truncate d-inline-block" style="max-width: 200px;" 
                                          title="{{ $item->kerusakan }}">
                                        {{ $item->kerusakan }}
                                    </span>
                                </td>
                                <td>
                                    @if($item->status === 'Selesai')
                                        <span class="badge badge-success-sm">
                                            <i class="bi bi-check-circle-fill me-1"></i>Selesai
                                        </span>
                                    @else
                                        <span class="badge badge-warning-sm">
                                            <i class="bi bi-hourglass-split me-1"></i>Proses
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->nama_penanganan)
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person-badge text-success me-2"></i>
                                            <span>{{ $item->nama_penanganan }}</span>
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status === 'Selesai')
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-check-circle text-success me-2"></i>
                                            <span>{{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}</span>
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('requestpemeliharaan.show', $item->id) }}" 
                                       class="btn btn-sm btn-detail-custom me-1">
                                        <i class="bi bi-eye me-1"></i>Detail
                                    </a>
                                    <a href="{{ route('requestpemeliharaan.edit', $item->id) }}" 
                                       class="btn btn-sm btn-edit-custom">
                                        <i class="bi bi-pencil-square me-1"></i>Edit
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="empty-search">
                                        <i class="bi bi-search display-4 text-muted"></i>
                                        <p class="mt-3 text-muted">Tidak ada data yang ditemukan dengan kata kunci "{{ request('search') }}"</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Pagination -->
            @if($riwayatPemeliharaan->hasPages())
            <div class="card-footer bg-transparent border-0 p-4">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <nav aria-label="Page navigation" class="mb-3">
                        <ul class="pagination-custom">
                            {{-- Previous Button --}}
                            @if ($riwayatPemeliharaan->onFirstPage())
                                <li class="page-item-custom disabled">
                                    <span class="page-link-custom">‹</span>
                                </li>
                            @else
                                <li class="page-item-custom">
                                    <a class="page-link-custom" href="{{ $riwayatPemeliharaan->appends(['search' => request('search'), 'from' => $from ?? 'utama'])->previousPageUrl() }}" rel="prev">‹</a>
                                </li>
                            @endif

                            {{-- Page Numbers --}}
                            @foreach ($riwayatPemeliharaan->getUrlRange(1, $riwayatPemeliharaan->lastPage()) as $page => $url)
                                @if ($page == $riwayatPemeliharaan->currentPage())
                                    <li class="page-item-custom active">
                                        <span class="page-link-custom">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item-custom">
                                        <a class="page-link-custom" href="{{ $riwayatPemeliharaan->appends(['search' => request('search'), 'from' => $from ?? 'utama'])->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Button --}}
                            @if ($riwayatPemeliharaan->hasMorePages())
                                <li class="page-item-custom">
                                    <a class="page-link-custom" href="{{ $riwayatPemeliharaan->appends(['search' => request('search'), 'from' => $from ?? 'utama'])->nextPageUrl() }}" rel="next">›</a>
                                </li>
                            @else
                                <li class="page-item-custom disabled">
                                    <span class="page-link-custom">›</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    <div class="pagination-info-custom">
                        Menampilkan {{ $riwayatPemeliharaan->firstItem() }} - {{ $riwayatPemeliharaan->lastItem() }} 
                        dari {{ $riwayatPemeliharaan->total() }} data
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Summary Stats -->
        <div class="row mt-4 g-3">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm card-stat">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-primary bg-opacity-10 me-3">
                                <i class="bi bi-clipboard-check text-primary fs-3"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Total Pemeliharaan</div>
                                <h3 class="fw-bold mb-0">{{ $riwayatPemeliharaan->total() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm card-stat">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-success bg-opacity-10 me-3">
                                <i class="bi bi-check-circle text-success fs-3"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Selesai</div>
                                <h3 class="fw-bold mb-0">{{ $statusSelesai ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm card-stat">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-warning bg-opacity-10 me-3">
                                <i class="bi bi-hourglass-split text-warning fs-3"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Dalam Proses</div>
                                <h3 class="fw-bold mb-0">{{ $statusProses ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <div class="mt-4">
            <a href="{{ $backRoute }}" class="btn btn-light-custom px-4 py-3">
                <i class="bi bi-arrow-left-circle me-2"></i>Kembali
            </a>
        </div>
    @endif
</div>

<style>
    /* Header Gradient */
    .header-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px !important;
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
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    /* Search Box */
    .search-box {
        max-width: 400px;
    }

    .search-box .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 14px 20px;
        transition: all 0.3s ease;
    }

    .search-box .form-control:focus {
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2);
        border-color: #667eea;
    }

    /* Icon Box */
    .icon-box {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .icon-box-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    /* Badge Custom */
    .badge-info-custom {
        background: linear-gradient(135deg, #4dabf7 0%, #339af0 100%);
        color: white;
        border-radius: 25px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .badge-success-sm {
        background: linear-gradient(135deg, #51cf66 0%, #37b24d 100%);
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .badge-warning-sm {
        background: linear-gradient(135deg, #ffd43b 0%, #fab005 100%);
        color: #495057;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Table Custom */
    .table-header-custom {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    .table-header-custom th {
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.85rem;
        color: #495057;
        padding: 1rem;
        border: none;
        letter-spacing: 0.5px;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
        transform: translateX(5px);
    }

    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #e9ecef;
    }

    /* Avatar Small */
    .avatar-sm {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Button Detail */
    .btn-detail-custom {
        background: linear-gradient(135deg, #4dabf7 0%, #339af0 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .btn-detail-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(77, 171, 247, 0.4);
        color: white;
    }

    /* Button Edit */
    .btn-edit-custom {
        background: linear-gradient(135deg, #ffd43b 0%, #fab005 100%);
        color: #495057;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .btn-edit-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(250, 176, 5, 0.4);
        color: #495057;
    }

    /* Empty State */
    .empty-state {
        padding: 3rem 1rem;
    }

    .empty-icon {
        animation: float 3s ease-in-out infinite;
    }

    .empty-search {
        padding: 2rem 1rem;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    /* Stat Card */
    .card-stat {
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .card-stat:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Button Light Custom */
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
        color: white;
    }

    /* ===== PAGINATION CUSTOM ===== */
    .pagination-custom {
        margin: 0;
        padding: 0;
        gap: 0;
        display: inline-flex;
        align-items: center;
        border-radius: 6px;
        overflow: hidden;
        background: white;
        border: 1px solid #d1d5db;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        list-style: none;
    }

    .page-item-custom {
        margin: 0;
    }

    .page-link-custom {
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
        text-decoration: none;
        cursor: pointer;
    }

    .page-item-custom:first-child .page-link-custom {
        border-radius: 6px 0 0 6px;
    }

    .page-item-custom:last-child .page-link-custom {
        border-right: none;
        border-radius: 0 6px 6px 0;
    }

    .page-link-custom:hover:not(.disabled) {
        background: #f3f4f6;
        color: #374151;
    }

    .page-item-custom.active .page-link-custom {
        background: #1d4ed8;
        color: white;
        border-color: #1d4ed8;
        position: relative;
        z-index: 1;
    }

    .page-item-custom.disabled .page-link-custom {
        background: white;
        color: #d1d5db;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .page-item-custom.disabled .page-link-custom:hover {
        background: white;
        color: #d1d5db;
    }

    .pagination-info-custom {
        color: #6b7280;
        font-size: 14px;
        font-weight: 500;
    }

    /* Breadcrumb */
    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        color: #667eea;
        font-weight: bold;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .table-responsive {
            font-size: 0.85rem;
        }

        .header-gradient .card-body {
            padding: 1.5rem !important;
        }

        .header-gradient h2 {
            font-size: 1.5rem;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
        }

        .search-box .form-control {
            min-width: 200px !important;
        }

        .btn-detail-custom,
        .btn-edit-custom {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
        }
    }
</style>
@endsection