@extends('layout.main')

@section('konten')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="peripheral-card">

                {{-- FOTO PERIFERAL --}}
                @php
                    $gambarDefault = 'default_peripheral.png';
                    $jenis = strtolower($periferal->jenis_perangkat);

                    if (str_contains($jenis, 'keyboard')) $gambarDefault = 'keyboard.png';
                    elseif (str_contains($jenis, 'mouse')) $gambarDefault = 'mouse.png';
                    elseif (str_contains($jenis, 'printer')) $gambarDefault = 'printer.png';
                    elseif (str_contains($jenis, 'scanner')) $gambarDefault = 'scanner.png';
                    elseif (str_contains($jenis, 'ups')) $gambarDefault = 'ups.png';

                    $fotoPath = $periferal->foto && file_exists(public_path('storage/'.$periferal->foto))
                        ? asset('storage/'.$periferal->foto)
                        : asset('images/peripheral/'.$gambarDefault);
                @endphp

                <div class="peripheral-image-container">
                    <img src="{{ $fotoPath }}" class="peripheral-image" alt="Foto Periferal">
                </div>

                {{-- HEADER --}}
                <div class="peripheral-header">
                    <h4 class="peripheral-name">{{ $periferal->nama_perangkat }}</h4>
                    <div class="peripheral-type">
                        <svg width="16" height="16" fill="currentColor" class="me-1" viewBox="0 0 16 16">
                            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                        </svg>
                        {{ $periferal->jenis_perangkat }}
                    </div>
                </div>

                {{-- DETAIL TABLE --}}
                <div class="peripheral-details">
                    <div class="detail-section">
                        <h5 class="section-title">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                            Informasi Perangkat
                        </h5>
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                    </svg>
                                    ID Periferal
                                </div>
                                <div class="info-value">{{ $periferal->id_perangkat }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1h-11z"/>
                                    </svg>
                                    Merk
                                </div>
                                <div class="info-value">{{ $periferal->merk ?? '-' }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3z"/>
                                    </svg>
                                    Tipe
                                </div>
                                <div class="info-value">{{ $periferal->tipe ?? '-' }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                    </svg>
                                    Posisi
                                </div>
                                <div class="info-value">{{ $periferal->posisi ?? '-' }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                    </svg>
                                    Pengguna
                                </div>
                                <div class="info-value">{{ $periferal->pengguna ?? '-' }}</div>
                            </div>

                            @if($periferal->keterangan)
                            <div class="info-item full-width">
                                <div class="info-label">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                    Keterangan
                                </div>
                                <div class="info-value keterangan-text">{{ $periferal->keterangan }}</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- FOOTER --}}
                <div class="peripheral-footer">
                    <a href="{{ route('riwayat') }}" class="btn-back">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                        <span>Kembali ke Riwayat</span>
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>

{{-- STYLE --}}
<style>
    .peripheral-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .peripheral-card:hover {
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.12);
    }

    .peripheral-image-container {
        position: relative;
        background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
        padding: 60px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 320px;
    }

    .peripheral-image {
        max-height: 300px;
        max-width: 100%;
        width: 100%;
        object-fit: contain;
        filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.2));
        padding: 0 20px;
    }

    .peripheral-header {
        padding: 32px 40px 24px;
        border-bottom: 2px solid #f1f5f9;
        background: linear-gradient(to bottom, #ffffff 0%, #f8fafc 100%);
    }

    .peripheral-name {
        font-size: 28px;
        font-weight: 800;
        color: #1e293b;
        margin: 0 0 12px 0;
        letter-spacing: -0.5px;
    }

    .peripheral-type {
        display: inline-flex;
        align-items: center;
        background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
        color: white;
        font-size: 14px;
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }

    .peripheral-details {
        padding: 40px;
        background: #f8fafc;
    }

    .detail-section {
        background: white;
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 28px 0;
        padding-bottom: 16px;
        border-bottom: 3px solid #e2e8f0;
    }

    .section-title svg {
        color: #4f46e5;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 20px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 12px;
        border-left: 4px solid #4f46e5;
        transition: all 0.3s ease;
    }

    .info-item:hover {
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.15);
        border-left-color: #06b6d4;
    }

    .info-item.full-width {
        grid-column: span 2;
    }

    .info-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .info-label svg {
        color: #4f46e5;
        flex-shrink: 0;
    }

    .info-value {
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
        padding-left: 24px;
        line-height: 1.5;
    }

    .keterangan-text {
        font-style: italic;
        color: #475569;
        font-weight: 500;
        line-height: 1.7;
    }

    .peripheral-footer {
        padding: 0 40px 40px;
        display: flex;
        justify-content: flex-start;
        background: #f8fafc;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 16px 32px;
        background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
        color: white;
        border: none;
        border-radius: 14px;
        font-size: 15px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 6px 20px rgba(79, 70, 229, 0.35);
    }

    .btn-back:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.45);
        color: white;
    }

    .btn-back:active {
        transform: translateY(-1px);
    }

    @media (max-width: 992px) {
        .info-grid {
            grid-template-columns: 1fr;
        }

        .info-item.full-width {
            grid-column: span 1;
        }

        .peripheral-header,
        .peripheral-details,
        .peripheral-footer {
            padding-left: 32px;
            padding-right: 32px;
        }
    }

    @media (max-width: 768px) {
        .peripheral-card {
            border-radius: 16px;
        }

        .peripheral-image-container {
            min-height: 280px;
            padding: 50px 0;
        }

        .peripheral-image {
            max-height: 250px;
        }

        .peripheral-header {
            padding: 24px 24px 20px;
        }

        .peripheral-details {
            padding: 28px 24px;
        }

        .detail-section {
            padding: 24px;
        }

        .peripheral-footer {
            padding: 0 24px 28px;
        }

        .peripheral-name {
            font-size: 22px;
        }

        .section-title {
            font-size: 18px;
        }

        .info-item {
            padding: 16px;
        }

        .info-value {
            font-size: 15px;
        }
    }

    @media (max-width: 576px) {
        .peripheral-header,
        .peripheral-details,
        .peripheral-footer {
            padding-left: 20px;
            padding-right: 20px;
        }

        .detail-section {
            padding: 20px;
        }

        .info-grid {
            gap: 16px;
        }

        .btn-back {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection