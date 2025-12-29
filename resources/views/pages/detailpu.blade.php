@extends('layout.main')

@section('konten')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="device-card">

                {{-- FOTO PERANGKAT --}}
                @php
                    $gambarDefault = 'default.png';
                    $jenis = strtolower($perangkat->jenis_perangkat);

                    if (str_contains($jenis, 'laptop')) $gambarDefault = 'laptop.png';
                    elseif (str_contains($jenis, 'pc standalone') || str_contains($jenis, 'komputer')) $gambarDefault = 'pc_standalone.png';
                    elseif (str_contains($jenis, 'pc aio')) $gambarDefault = 'pc_aio.png';
                    elseif (str_contains($jenis, 'smartphone')) $gambarDefault = 'smartphone.png';
                    elseif (str_contains($jenis, 'tablet')) $gambarDefault = 'tablet.png';
                    elseif (str_contains($jenis, 'pc server')) $gambarDefault = 'pcserver.png';

                    $fotoPath = $perangkat->foto
                        ? asset('storage/' . $perangkat->foto)
                        : asset('images/perangkat/' . $gambarDefault);
                @endphp

                <div class="device-image-container">
                    <img src="{{ $fotoPath }}" class="device-image" alt="Foto Perangkat">
                </div>

                {{-- HEADER --}}
                <div class="device-header">
                    <h4 class="device-name">{{ $perangkat->nama_perangkat }}</h4>
                    <div class="device-type">
                        <svg width="16" height="16" fill="currentColor" class="me-1" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
                        </svg>
                        {{ $perangkat->jenis_perangkat }}
                    </div>
                </div>

                {{-- DETAIL --}}
                <div class="device-details">

                    @php
                        $details = [
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/></svg>', 'label' => 'ID Perangkat', 'value' => $perangkat->id_perangkat],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>', 'label' => 'Posisi', 'value' => $perangkat->posisi],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>', 'label' => 'Pengguna', 'value' => $perangkat->pengguna],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/></svg>', 'label' => 'Sistem Operasi', 'value' => $perangkat->os],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.586a1 1 0 0 0 .707-.293l.353-.353a.5.5 0 0 1 .708 0l.353.353a1 1 0 0 0 .707.293H15a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z"/></svg>', 'label' => 'RAM', 'value' => $perangkat->ram_merk . ' / ' . $perangkat->ram_kapasitas],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4.5 1A1.5 1.5 0 0 0 3 2.5v11A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-11A1.5 1.5 0 0 0 11.5 1h-7zM4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-11z"/></svg>', 'label' => 'SSD', 'value' => $perangkat->ssd_merk . ' / ' . $perangkat->ssd_kapasitas],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/></svg>', 'label' => 'HDD', 'value' => $perangkat->hdd_merk . ' / ' . $perangkat->hdd_kapasitas],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/></svg>', 'label' => 'Office App', 'value' => $perangkat->office_nama . ' / ' . $perangkat->office_status],
                            ['icon' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>', 'label' => 'Tahun Perolehan', 'value' => $perangkat->tahun_produksi],
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

                    <div class="detail-item status-item">
                        <div class="detail-icon">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                        </div>
                        <div class="detail-content">
                            <span class="detail-label">Status Perangkat</span>
                            <div class="status-container">
                                <span class="status-badge {{ $perangkat->status === 'OK' ? 'status-ok' : 'status-error' }}">
                                    @if($perangkat->status === 'OK')
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                        </svg>
                                        Berfungsi Normal
                                    @else
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                        </svg>
                                        {{ $perangkat->status }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    @if($perangkat->keterangan)
                        <div class="detail-item keterangan-item">
                            <div class="detail-icon">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                            </div>
                            <div class="detail-content">
                                <span class="detail-label">Keterangan</span>
                                <span class="detail-value">{{ $perangkat->keterangan }}</span>
                            </div>
                        </div>
                    @endif

                </div>

                {{-- FOOTER --}}
                <div class="device-footer">
                    <a href="{{ url('/riwayat') }}" class="btn-back">
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
    .device-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .device-card:hover {
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.12);
    }

    .device-image-container {
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 320px;
    }

    .device-image {
        max-height: 300px;
        max-width: 100%;
        width: 100%;
        object-fit: contain;
        filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.2));
        padding: 0 20px;
    }

    .status-container {
        margin-top: 2px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 8px 18px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .status-ok {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
    }

    .status-error {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
    }

    .status-item:hover .status-badge {
        transform: translateX(4px);
        transition: transform 0.2s ease;
    }

    .device-header {
        padding: 28px 32px 20px;
        border-bottom: 1px solid #f1f5f9;
    }

    .device-name {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 8px 0;
        letter-spacing: -0.5px;
    }

    .device-type {
        display: flex;
        align-items: center;
        color: #64748b;
        font-size: 14px;
        font-weight: 500;
    }

    .device-details {
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

    .device-footer {
        padding: 0 32px 32px;
    }

    .btn-back {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: 16px 24px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 14px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 14px rgba(102, 126, 234, 0.3);
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-back:active {
        transform: translateY(0);
    }

    @media (max-width: 576px) {
        .device-card {
            border-radius: 16px;
        }

        .device-image-container {
            min-height: 280px;
            padding: 50px 0;
        }

        .device-image {
            max-height: 250px;
        }

        .device-header,
        .device-details,
        .device-footer {
            padding-left: 24px;
            padding-right: 24px;
        }

        .detail-item:hover {
            margin: 0 -24px;
            padding: 16px 24px;
        }

        .device-name {
            font-size: 20px;
        }
    }
</style>
@endsection