@extends('layout.main')

@section('konten')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

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

                {{-- DETAIL --}}
                <div class="peripheral-details">

                    @php
                        $details = [
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/></svg>', 'label' => 'ID Periferal', 'value' => $periferal->id_perangkat],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1h-11zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5v-11z"/></svg>', 'label' => 'Merk', 'value' => $periferal->merk ?? '-'],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/></svg>', 'label' => 'Tipe', 'value' => $periferal->tipe ?? '-'],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>', 'label' => 'Posisi', 'value' => $periferal->posisi ?? '-'],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>', 'label' => 'Pengguna', 'value' => $periferal->pengguna ?? '-'],
                        ];
                    @endphp

                    @foreach($details as $item)
                        <div class="detail-item">
                            <div class="detail-icon">{!! $item['icon'] !!}</div>
                            <div class="detail-content">
                                <span class="detail-label">{{ $item['label'] }}</span>
                                <span class="detail-value">{{ $item['value'] }}</span>
                            </div>
                        </div>
                    @endforeach

                    @if($periferal->keterangan)
                        <div class="detail-item keterangan-item">
                            <div class="detail-icon">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                            </div>
                            <div class="detail-content">
                                <span class="detail-label">Keterangan</span>
                                <span class="detail-value">{{ $periferal->keterangan }}</span>
                            </div>
                        </div>
                    @endif

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
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        padding: 48px 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .peripheral-image {
        max-height: 220px;
        max-width: 100%;
        object-fit: contain;
        filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.15));
    }

    .peripheral-header {
        padding: 28px 32px 20px;
        border-bottom: 1px solid #f1f5f9;
    }

    .peripheral-name {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 8px 0;
        letter-spacing: -0.5px;
    }

    .peripheral-type {
        display: flex;
        align-items: center;
        color: #64748b;
        font-size: 14px;
        font-weight: 500;
    }

    .peripheral-details {
        padding: 8px 32px 32px;
    }

    .detail-item {
        display: flex;
        align-items: flex-start;
        padding: 16px 0;
        border-bottom: 1px solid #f8fafc;
        transition: all 0.2s ease;
    }

    .detail-item:hover {
        background: #f8fafc;
        margin: 0 -32px;
        padding: 16px 32px;
        border-radius: 8px;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-icon {
        width: 40px;
        height: 40px;
        min-width: 40px;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-right: 16px;
    }

    .detail-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 0;
    }

    .detail-label {
        font-size: 12px;
        font-weight: 600;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-value {
        font-size: 15px;
        font-weight: 500;
        color: #334155;
        word-wrap: break-word;
        line-height: 1.5;
    }

    .keterangan-item .detail-value {
        font-style: italic;
        color: #64748b;
    }

    .peripheral-footer {
        padding: 0 32px 32px;
    }

    .btn-back {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: 16px 24px;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        border: none;
        border-radius: 14px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 14px rgba(240, 147, 251, 0.3);
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(240, 147, 251, 0.4);
        color: white;
    }

    .btn-back:active {
        transform: translateY(0);
    }

    @media (max-width: 576px) {
        .peripheral-card {
            border-radius: 16px;
        }

        .peripheral-header,
        .peripheral-details,
        .peripheral-footer {
            padding-left: 24px;
            padding-right: 24px;
        }

        .detail-item:hover {
            margin: 0 -24px;
            padding: 16px 24px;
        }

        .peripheral-name {
            font-size: 20px;
        }
    }
</style>
@endsection