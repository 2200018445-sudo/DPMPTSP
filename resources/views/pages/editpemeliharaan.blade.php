@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Inter', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 50%, #fbbf24 100%);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    /* Animated gradient background */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 30%, rgba(251, 191, 36, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(245, 158, 11, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(252, 211, 77, 0.06) 0%, transparent 50%);
        animation: meshFloat 20s ease infinite;
        pointer-events: none;
    }

    @keyframes meshFloat {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    /* Floating geometric shapes */
    .geo-shape {
        position: fixed;
        opacity: 0.03;
        pointer-events: none;
        animation: shapeFloat 25s ease-in-out infinite;
    }

    .geo-1 {
        width: 450px;
        height: 450px;
        top: -120px;
        right: -120px;
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
        border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        animation-delay: 0s;
    }

    .geo-2 {
        width: 350px;
        height: 350px;
        bottom: -80px;
        left: -80px;
        background: linear-gradient(135deg, #fbbf24, #fcd34d);
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        animation-delay: 8s;
    }

    @keyframes shapeFloat {
        0%, 100% { 
            transform: translate(0, 0) rotate(0deg);
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        }
        33% { 
            transform: translate(30px, -30px) rotate(120deg);
            border-radius: 70% 30% 50% 50% / 30% 60% 40% 70%;
        }
        66% { 
            transform: translate(-20px, 20px) rotate(240deg);
            border-radius: 50% 50% 30% 70% / 50% 50% 50% 50%;
        }
    }

    .page-container {
        padding: 80px 20px;
        position: relative;
        z-index: 1;
    }

    .form-wrapper {
        max-width: 900px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.97);
        backdrop-filter: blur(20px);
        border-radius: 32px;
        overflow: hidden;
        border: 1px solid rgba(251, 191, 36, 0.2);
        box-shadow: 
            0 0 0 1px rgba(251, 191, 36, 0.1),
            0 25px 60px rgba(0, 0, 0, 0.08),
            0 50px 100px rgba(251, 191, 36, 0.08);
        animation: fadeSlideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(50px) scale(0.97);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Top gradient accent */
    .form-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #f59e0b 0%, #fbbf24 50%, #fcd34d 100%);
        background-size: 200% 100%;
        animation: gradientFlow 10s ease infinite;
    }

    @keyframes gradientFlow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .form-header {
        background: linear-gradient(135deg, #ffffff 0%, #fffbeb 100%);
        padding: 50px 50px 40px;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }

    /* Decorative pattern */
    .form-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 25% 25%, rgba(251, 191, 36, 0.04) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(245, 158, 11, 0.04) 0%, transparent 50%);
        pointer-events: none;
    }

    .header-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 600px;
        margin: 0 auto;
    }

    .icon-container {
        width: 90px;
        height: 90px;
        margin: 0 auto 26px;
        background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 
            0 20px 40px rgba(245, 158, 11, 0.3),
            0 10px 20px rgba(251, 191, 36, 0.2),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
        position: relative;
        animation: iconFloat 4s ease-in-out infinite;
    }

    @keyframes iconFloat {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
    }

    .icon-container::after {
        content: '';
        position: absolute;
        inset: -5px;
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
        border-radius: 26px;
        opacity: 0.4;
        filter: blur(15px);
        z-index: -1;
        animation: iconGlow 3s ease-in-out infinite;
    }

    @keyframes iconGlow {
        0%, 100% { opacity: 0.4; }
        50% { opacity: 0.7; }
    }

    .icon-container svg {
        width: 45px;
        height: 45px;
        color: white;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
    }

    .edit-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        padding: 10px 24px;
        border-radius: 100px;
        color: #92400e;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 24px;
        box-shadow: 
            0 4px 12px rgba(245, 158, 11, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        border: 2px solid rgba(245, 158, 11, 0.2);
    }

    .form-title {
        font-weight: 900;
        font-size: 38px;
        background: linear-gradient(135deg, #92400e 0%, #b45309 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 12px;
        letter-spacing: -1.5px;
        line-height: 1.1;
    }

    .form-subtitle {
        color: #92400e;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    .form-body {
        padding: 45px 50px 50px;
    }

    .alert {
        border-radius: 16px;
        border: 2px solid;
        padding: 16px 20px;
        margin-bottom: 28px;
        font-size: 14px;
        font-weight: 600;
        animation: slideDown 0.5s ease;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.1);
        color: #16a34a;
        border-color: rgba(34, 197, 94, 0.3);
    }

    .alert-success::before {
        content: '✓';
        font-size: 20px;
        font-weight: bold;
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        border-color: rgba(239, 68, 68, 0.3);
    }

    .alert-danger::before {
        content: '⚠';
        font-size: 20px;
    }

    /* 2 Column Layout */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }

    .full-width {
        grid-column: span 2;
    }

    .form-group {
        position: relative;
    }

    .form-label {
        color: #78350f;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 10px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .form-label.required::after {
        content: '*';
        color: #dc2626;
        margin-left: 5px;
        font-size: 15px;
    }

    .form-control,
    .form-select,
    textarea {
        background: #ffffff;
        border: 2px solid #fde68a;
        border-radius: 14px;
        padding: 14px 18px;
        font-size: 15px;
        color: #1c1917;
        width: 100%;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-weight: 500;
    }

    .form-control:focus,
    .form-select:focus,
    textarea:focus {
        background: #ffffff;
        border-color: #f59e0b;
        color: #1c1917;
        box-shadow: 
            0 0 0 4px rgba(251, 191, 36, 0.15),
            0 8px 24px rgba(245, 158, 11, 0.2);
        outline: none;
        transform: translateY(-2px);
    }

    .form-control:hover:not(:focus),
    .form-select:hover:not(:focus),
    textarea:hover:not(:focus) {
        border-color: #fbbf24;
        box-shadow: 0 4px 12px rgba(251, 191, 36, 0.1);
    }

    .form-control::placeholder,
    textarea::placeholder {
        color: #a8a29e;
        font-weight: 400;
    }

    /* Date input styling */
    .form-control[type="date"] {
        color: #1c1917;
    }

    .form-control[type="date"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
        filter: brightness(0) saturate(100%) invert(45%) sepia(97%) saturate(1678%) hue-rotate(9deg) brightness(98%) contrast(95%);
    }

    .form-control[type="date"]::-webkit-calendar-picker-indicator:hover {
        filter: brightness(0) saturate(100%) invert(55%) sepia(97%) saturate(1678%) hue-rotate(9deg) brightness(98%) contrast(95%);
    }

    textarea {
        resize: vertical;
        min-height: 110px;
        font-family: inherit;
        line-height: 1.6;
    }

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%23f59e0b' d='M13.354 5.646a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0l-5-5a.5.5 0 1 1 .708-.708L8 10.293l4.646-4.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 18px center;
        padding-right: 50px;
        cursor: pointer;
    }

    .form-select option {
        background: #ffffff;
        color: #1c1917;
        padding: 12px;
    }

    .form-select optgroup {
        font-weight: 700;
        color: #f59e0b;
        font-size: 14px;
        padding: 8px 0;
    }

    .button-group {
        display: flex;
        gap: 16px;
        margin-top: 36px;
        padding-top: 30px;
        border-top: 2px solid rgba(0, 0, 0, 0.04);
    }

    .btn {
        flex: 1;
        padding: 16px 32px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 15px;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        letter-spacing: 0.5px;
        text-transform: uppercase;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn:active::before {
        width: 400px;
        height: 400px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        color: #78350f;
        box-shadow: 
            0 10px 30px rgba(245, 158, 11, 0.35),
            0 5px 15px rgba(251, 191, 36, 0.2),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 
            0 16px 40px rgba(245, 158, 11, 0.45),
            0 8px 20px rgba(251, 191, 36, 0.25),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
    }

    .btn-secondary {
        background: white;
        color: #f59e0b;
        border: 2px solid #f59e0b;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.15);
    }

    .btn-secondary:hover {
        background: #f59e0b;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(245, 158, 11, 0.3);
    }

    /* Section divider */
    .section-divider {
        grid-column: span 2;
        margin: 24px 0 16px 0;
        padding: 18px 24px;
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        border-radius: 14px;
        border-left: 5px solid #f59e0b;
        box-shadow: 0 3px 10px rgba(245, 158, 11, 0.1);
    }

    .section-title {
        font-weight: 700;
        font-size: 17px;
        color: #78350f;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
        letter-spacing: 0.3px;
    }

    .section-title::before {
        content: '◆';
        font-size: 14px;
        color: #f59e0b;
    }

    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .full-width,
        .section-divider {
            grid-column: span 1;
        }

        .form-body,
        .form-header {
            padding: 35px 30px;
        }

        .form-title {
            font-size: 30px;
        }

        .button-group {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .form-body,
        .form-header {
            padding: 30px 25px;
        }

        .form-title {
            font-size: 26px;
        }
    }
</style>

<div class="geo-shape geo-1"></div>
<div class="geo-shape geo-2"></div>

<div class="page-container">
    <div class="form-wrapper">
        <div class="form-header">
            <div class="header-content">
                <div class="edit-badge">
                    <span>✏️</span>
                    <span>Edit Mode</span>
                </div>
                <div class="icon-container">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.7 6.3C15.1 5.9 15.7 5.9 16.1 6.3L17.7 7.9C18.1 8.3 18.1 8.9 17.7 9.3L9 18H6V15L14.7 6.3Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.5 7.5L16.5 11.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="form-title">Edit Pemeliharaan Perangkat</h2>
                <p class="form-subtitle">Update Data Maintenance IT</p>
            </div>
        </div>

        <div class="form-body">
            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Alert error --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <div>
                        <ul class="mb-0" style="padding-left: 20px; margin: 0;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('requestpemeliharaan.update', $requestPemeliharaan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <!-- Section: Informasi Aduan -->
                    <div class="section-divider">
                        <h3 class="section-title">Informasi Aduan</h3>
                    </div>

                    <!-- Jenis Perangkat -->
                    <div class="form-group">
                        <label class="form-label required">Jenis Perangkat</label>
                        <select name="jenis_perangkat" class="form-select" required>
                            <option value="" disabled>Pilih jenis perangkat</option>
                            
                            @if(isset($perangkatUtama) && $perangkatUtama->count() > 0)
                                <optgroup label="━━━ PERANGKAT UTAMA ━━━">
                                    @foreach($perangkatUtama as $item)
                                        <option value="{{ $item->nama_perangkat }}" 
                                            {{ old('jenis_perangkat', $requestPemeliharaan->jenis_perangkat) == $item->nama_perangkat ? 'selected' : '' }}>
                                            {{ $item->nama_perangkat }} / {{ $item->jenis_perangkat }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endif

                            @if(isset($perangkatPeriferal) && $perangkatPeriferal->count() > 0)
                                <optgroup label="━━━ PERANGKAT PERIFERAL ━━━">
                                    @foreach($perangkatPeriferal as $item)
                                        <option value="{{ $item->nama_perangkat }}"
                                            {{ old('jenis_perangkat', $requestPemeliharaan->jenis_perangkat) == $item->nama_perangkat ? 'selected' : '' }}>
                                            {{ $item->nama_perangkat }} / {{ $item->jenis_perangkat }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endif
                        </select>
                    </div>

                    <!-- Tanggal Aduan -->
                    <div class="form-group">
                        <label class="form-label required">Tanggal Aduan</label>
                        <input type="date" name="tanggal_aduan" class="form-control"
                               value="{{ old('tanggal_aduan', $requestPemeliharaan->tanggal_aduan) }}" required>
                    </div>

                    <!-- User Aduan -->
                    <div class="form-group">
                        <label class="form-label required">User Aduan</label>
                        <input type="text" name="user_aduan" class="form-control"
                               placeholder="Nama pengadu / ruangan"
                               value="{{ old('user_aduan', $requestPemeliharaan->user_aduan) }}" required>
                    </div>

                    <!-- Kerusakan -->
                    <div class="form-group full-width">
                        <label class="form-label required">Jenis Kerusakan</label>
                        <input type="text" name="kerusakan" class="form-control"
                               placeholder="Masukkan jenis kerusakan yang dilaporkan"
                               value="{{ old('kerusakan', $requestPemeliharaan->kerusakan) }}" required>
                    </div>

                    <!-- Section: Informasi Penanganan -->
                    <div class="section-divider">
                        <h3 class="section-title">Informasi Penanganan</h3>
                    </div>

                    <!-- Tanggal Penanganan -->
                    <div class="form-group">
                        <label class="form-label">Tanggal Penanganan</label>
                        <input type="date" name="tanggal_penanganan" class="form-control"
                               value="{{ old('tanggal_penanganan', $requestPemeliharaan->tanggal_penanganan) }}">
                    </div>

                    <!-- Nama Penanganan -->
                    <div class="form-group">
                        <label class="form-label">Nama Penanganan</label>
                        <input type="text" name="nama_penanganan" class="form-control"
                               placeholder="Teknisi / petugas yang menangani"
                               value="{{ old('nama_penanganan', $requestPemeliharaan->nama_penanganan) }}">
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label class="form-label">Status Tindakan</label>
                        <select name="status" class="form-select">
                            <option value="Pending" {{ old('status', $requestPemeliharaan->status) == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>
                            <option value="Selesai" {{ old('status', $requestPemeliharaan->status) == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>
                        </select>
                    </div>

                    <!-- Tindakan -->
                    <div class="form-group full-width">
                        <label class="form-label">Tindakan yang Dilakukan</label>
                        <textarea name="tindakan" class="form-control" rows="3"
                                  placeholder="Jelaskan tindakan yang dilakukan untuk menangani masalah...">{{ old('tindakan', $requestPemeliharaan->tindakan) }}</textarea>
                    </div>

                    <div class="button-group full-width">
    @php
        $backRoute = match(request()->query('from', 'pemeliharaan')) {
            'utama' => route('riwayat.perangkat-utama'),
            'periferal' => route('riwayat.periferal'),
            'pemeliharaan' => route('riwayat.pemeliharaan'),
            default => url()->previous()
        };
    @endphp
    <a href="{{ $backRoute }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Update Data</button>
</div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection