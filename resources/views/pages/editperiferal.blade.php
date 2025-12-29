@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    * {
        font-family: 'Inter', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    /* Animated mesh gradient background */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 20%, rgba(99, 102, 241, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 50%, rgba(236, 72, 153, 0.06) 0%, transparent 50%),
            radial-gradient(circle at 50% 80%, rgba(59, 130, 246, 0.07) 0%, transparent 50%);
        animation: meshMove 20s ease infinite;
        pointer-events: none;
    }

    @keyframes meshMove {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.1); }
    }

    /* Floating geometric shapes */
    .geometric-shape {
        position: fixed;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        opacity: 0.03;
        animation: morphShape 15s ease-in-out infinite;
        pointer-events: none;
    }

    .shape-1 {
        width: 400px;
        height: 400px;
        top: -100px;
        right: -100px;
        background: linear-gradient(135deg, #6366f1, #ec4899);
        animation-delay: 0s;
    }

    .shape-2 {
        width: 300px;
        height: 300px;
        bottom: -50px;
        left: -50px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        animation-delay: 5s;
    }

    @keyframes morphShape {
        0%, 100% { 
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            transform: rotate(0deg) scale(1);
        }
        25% { 
            border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%;
            transform: rotate(90deg) scale(1.1);
        }
        50% { 
            border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%;
            transform: rotate(180deg) scale(0.9);
        }
        75% { 
            border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%;
            transform: rotate(270deg) scale(1.05);
        }
    }

    .page-container {
        padding: 80px 20px;
        position: relative;
        z-index: 1;
    }

    .form-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.98);
        border-radius: 32px;
        overflow: hidden;
        box-shadow: 
            0 0 0 1px rgba(0, 0, 0, 0.03),
            0 20px 60px rgba(0, 0, 0, 0.08),
            0 40px 120px rgba(0, 0, 0, 0.05);
        backdrop-filter: blur(20px);
        animation: fadeSlideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Subtle gradient overlay at top */
    .form-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #6366f1 0%, #ec4899 50%, #3b82f6 100%);
        background-size: 200% 100%;
        animation: gradientSlide 8s ease infinite;
    }

    @keyframes gradientSlide {
        0%, 100% { background-position: 0% 0%; }
        50% { background-position: 100% 0%; }
    }

    .form-header {
        background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
        padding: 60px 60px 50px;
        position: relative;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    /* Decorative grid pattern */
    .form-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            linear-gradient(rgba(99, 102, 241, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(99, 102, 241, 0.03) 1px, transparent 1px);
        background-size: 30px 30px;
        opacity: 0.5;
        pointer-events: none;
    }

    .header-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .icon-container {
        width: 96px;
        height: 96px;
        margin: 0 auto 28px;
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 
            0 20px 40px rgba(99, 102, 241, 0.25),
            0 10px 20px rgba(139, 92, 246, 0.15),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
        position: relative;
        animation: floatIcon 4s ease-in-out infinite;
    }

    @keyframes floatIcon {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
    }

    /* Glow effect around icon */
    .icon-container::before {
        content: '';
        position: absolute;
        inset: -4px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 26px;
        opacity: 0.4;
        filter: blur(16px);
        z-index: -1;
        animation: pulse 3s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 0.4; transform: scale(0.95); }
        50% { opacity: 0.7; transform: scale(1.05); }
    }

    .icon-container svg {
        width: 48px;
        height: 48px;
        color: white;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
    }

    .edit-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #ede9fe 0%, #ddd6fe 100%);
        padding: 10px 24px;
        border-radius: 100px;
        color: #6366f1;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 24px;
        box-shadow: 
            0 4px 12px rgba(99, 102, 241, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        border: 2px solid rgba(99, 102, 241, 0.1);
    }

    .form-title {
        font-weight: 800;
        font-size: 42px;
        background: linear-gradient(135deg, #1e293b 0%, #475569 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 12px;
        letter-spacing: -1.5px;
        line-height: 1.2;
    }

    .form-subtitle {
        color: #64748b;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    .form-body {
        padding: 60px;
        position: relative;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
    }

    .full { 
        grid-column: span 3; 
    }

    .section-title {
        font-weight: 700;
        font-size: 20px;
        color: #1e293b;
        margin: 48px 0 28px 0;
        padding: 20px 28px;
        border-radius: 16px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border: 2px solid rgba(99, 102, 241, 0.1);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }

    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 5px;
        background: linear-gradient(180deg, #6366f1 0%, #8b5cf6 100%);
    }

    .section-title::after {
        content: '✦';
        font-size: 18px;
        color: #6366f1;
        animation: rotate 8s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .form-label {
        color: #475569;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 10px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        background: #ffffff;
        border-radius: 14px;
        padding: 16px 20px;
        font-size: 15px;
        color: #1e293b;
        width: 100%;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-weight: 500;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #6366f1;
        background: #ffffff;
        box-shadow: 
            0 0 0 4px rgba(99, 102, 241, 0.08),
            0 8px 24px rgba(99, 102, 241, 0.12);
        transform: translateY(-2px);
    }

    .form-control:hover:not(:focus), 
    .form-select:hover:not(:focus) {
        border-color: #cbd5e1;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .form-control::placeholder {
        color: #94a3b8;
        font-weight: 400;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
        font-family: inherit;
    }

    input[type="file"].form-control {
        padding: 14px 20px;
        cursor: pointer;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border: 2px dashed #cbd5e1;
    }

    input[type="file"].form-control:hover {
        border-color: #6366f1;
        background: linear-gradient(135deg, #ede9fe 0%, #f5f3ff 100%);
    }

    input[type="file"].form-control::file-selector-button {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 10px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.8px;
        margin-right: 16px;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
    }

    input[type="file"].form-control::file-selector-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
    }

    small {
        color: #ef4444;
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
        font-weight: 600;
    }

    small::before {
        content: '⚠️';
        font-size: 16px;
    }

    .button-group {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 60px;
        padding-top: 40px;
        border-top: 2px solid rgba(0, 0, 0, 0.05);
    }

    .btn {
        padding: 18px 56px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        color: white;
        box-shadow: 
            0 10px 30px rgba(99, 102, 241, 0.35),
            0 4px 12px rgba(139, 92, 246, 0.2),
            inset 0 2px 0 rgba(255, 255, 255, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 
            0 16px 40px rgba(99, 102, 241, 0.45),
            0 8px 20px rgba(139, 92, 246, 0.25),
            inset 0 2px 0 rgba(255, 255, 255, 0.2);
    }

    .btn-secondary {
        background: white;
        color: #6366f1;
        border: 2px solid #6366f1;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.15);
    }

    .btn-secondary:hover {
        background: #6366f1;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(99, 102, 241, 0.3);
    }

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%236366f1' d='M13.354 5.646a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0l-5-5a.5.5 0 1 1 .708-.708L8 10.293l4.646-4.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 20px center;
        padding-right: 50px;
        cursor: pointer;
    }

    /* Progress indicator dots */
    .progress-dots {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 40px;
    }

    .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        animation: dotPulse 2s ease-in-out infinite;
    }

    .dot:nth-child(2) { animation-delay: 0.2s; }
    .dot:nth-child(3) { animation-delay: 0.4s; }

    @keyframes dotPulse {
        0%, 100% { opacity: 0.3; transform: scale(0.8); }
        50% { opacity: 1; transform: scale(1.2); }
    }

    @media (max-width: 992px) {
        .form-grid { 
            grid-template-columns: repeat(2, 1fr); 
        }
        .full { 
            grid-column: span 2; 
        }
        .form-body, .form-header {
            padding: 40px 35px;
        }
        .form-title {
            font-size: 36px;
        }
    }

    @media (max-width: 576px) {
        .form-grid { 
            grid-template-columns: 1fr;
            gap: 24px;
        }
        .full { 
            grid-column: span 1; 
        }
        .form-body, .form-header {
            padding: 35px 25px;
        }
        .form-title {
            font-size: 28px;
        }
        .button-group {
            flex-direction: column;
        }
        .btn {
            width: 100%;
        }
    }
</style>

<div class="geometric-shape shape-1"></div>
<div class="geometric-shape shape-2"></div>

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
                        <path d="M6 3H18C19.1046 3 20 3.89543 20 5V15C20 16.1046 19.1046 17 18 17H6C4.89543 17 4 16.1046 4 15V5C4 3.89543 4.89543 3 6 3Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8 21H16" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 17V21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="form-title">EDIT DATA PERIFERAL</h2>
                <p class="form-subtitle">Update Perangkat Periferal</p>
                
                <div class="progress-dots">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('periferal.update', $periferal->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-grid">

                    <div class="section-title full">Perangkat Periferal</div>

                    <div>
                        <label class="form-label">Username</label>
                        <input type="text"
                               name="nama_perangkat"
                               class="form-control"
                               value="{{ old('nama_perangkat', $periferal->nama_perangkat) }}"
                               required>
                    </div>

                    <div>
                        <label class="form-label">Jenis Perangkat</label>
                        <select name="jenis_perangkat" class="form-select" required>
                            @foreach (['Printer','Scanner','AIO','Modem','Akses Point','Switch-Hub'] as $jenis)
                                <option value="{{ $jenis }}"
                                    {{ old('jenis_perangkat', $periferal->jenis_perangkat) == $jenis ? 'selected' : '' }}>
                                    {{ $jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="form-label">ID Perangkat</label>
                        <input type="text"
                               name="id_perangkat"
                               class="form-control"
                               value="{{ old('id_perangkat', $periferal->id_perangkat) }}"
                               required>
                    </div>

                    <div class="section-title full">Spesifikasi Periferal</div>

                    <div>
                        <label class="form-label">Merk</label>
                        <input type="text"
                               name="merk"
                               class="form-control"
                               value="{{ old('merk', $periferal->merk) }}">
                    </div>

                    <div>
                        <label class="form-label">Tipe</label>
                        <input type="text"
                               name="tipe"
                               class="form-control"
                               value="{{ old('tipe', $periferal->tipe) }}">
                    </div>

                    <div>
                        <label class="form-label">Posisi</label>
                        <input type="text"
                               name="posisi"
                               class="form-control"
                               value="{{ old('posisi', $periferal->posisi) }}">
                    </div>

                    <div>
                        <label class="form-label">Pengguna</label>
                        <input type="text"
                               name="pengguna"
                               class="form-control"
                               value="{{ old('pengguna', $periferal->pengguna) }}">
                    </div>

                    {{-- FOTO --}}
                    <div class="full">
                        <label class="form-label fw-bold">Foto Perangkat</label>
                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept="image/*">
                        <small style="color: #ef4444;">
                            Format: Wajib PNG | Maksimal 2MB
                        </small>
                    </div>

                    {{-- KETERANGAN --}}
                    <div class="full">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="2">{{ old('keterangan', $periferal->keterangan) }}</textarea>
                    </div>

                    <div class="full d-flex justify-content-center gap-4 mt-4">
                        <a href="{{ route('riwayat') }}" class="btn btn-secondary px-5">
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary px-5">
                            Update Data
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection