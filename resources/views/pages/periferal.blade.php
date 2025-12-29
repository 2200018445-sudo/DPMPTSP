@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

    * {
        font-family: 'Inter', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #dbeafe 100%);
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
            radial-gradient(circle at 15% 20%, rgba(59, 130, 246, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 85% 30%, rgba(147, 51, 234, 0.06) 0%, transparent 50%),
            radial-gradient(circle at 50% 80%, rgba(14, 165, 233, 0.07) 0%, transparent 50%);
        animation: meshMove 25s ease infinite;
        pointer-events: none;
    }

    @keyframes meshMove {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    /* Geometric decorative elements */
    .deco-circle {
        position: fixed;
        border-radius: 50%;
        opacity: 0.04;
        pointer-events: none;
        animation: floatSlow 20s ease-in-out infinite;
    }

    .deco-1 {
        width: 500px;
        height: 500px;
        top: -150px;
        right: -150px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        animation-delay: 0s;
    }

    .deco-2 {
        width: 400px;
        height: 400px;
        bottom: -100px;
        left: -100px;
        background: linear-gradient(135deg, #06b6d4, #3b82f6);
        animation-delay: 7s;
    }

    @keyframes floatSlow {
        0%, 100% { 
            transform: translate(0, 0) rotate(0deg);
        }
        50% { 
            transform: translate(50px, -30px) rotate(180deg);
        }
    }

    /* Subtle grid pattern */
    .grid-pattern {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            linear-gradient(rgba(59, 130, 246, 0.02) 1px, transparent 1px),
            linear-gradient(90deg, rgba(59, 130, 246, 0.02) 1px, transparent 1px);
        background-size: 40px 40px;
        pointer-events: none;
        opacity: 0.6;
    }

    .page-container {
        padding: 80px 20px;
        position: relative;
        z-index: 1;
    }

    .form-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 32px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.8);
        box-shadow: 
            0 0 0 1px rgba(59, 130, 246, 0.05),
            0 25px 60px rgba(0, 0, 0, 0.08),
            0 50px 100px rgba(59, 130, 246, 0.05);
        animation: fadeSlideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(50px) scale(0.98);
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
        height: 5px;
        background: linear-gradient(90deg, #3b82f6 0%, #8b5cf6 50%, #06b6d4 100%);
        background-size: 200% 100%;
        animation: gradientFlow 8s ease infinite;
    }

    @keyframes gradientFlow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .form-header {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        padding: 60px 50px 50px;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }

    /* Subtle wave pattern in header */
    .form-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 80% 50%, rgba(139, 92, 246, 0.03) 0%, transparent 50%);
        pointer-events: none;
    }

    /* Floating sparkles */
    .sparkle {
        position: absolute;
        width: 6px;
        height: 6px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 50%;
        opacity: 0;
        animation: sparkleFloat 12s ease-in-out infinite;
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
    }

    .sparkle:nth-child(1) { left: 15%; top: 25%; animation-delay: 0s; }
    .sparkle:nth-child(2) { left: 35%; top: 70%; animation-delay: 3s; }
    .sparkle:nth-child(3) { left: 65%; top: 40%; animation-delay: 6s; }
    .sparkle:nth-child(4) { left: 85%; top: 60%; animation-delay: 9s; }

    @keyframes sparkleFloat {
        0%, 100% { 
            transform: translateY(0) scale(0);
            opacity: 0;
        }
        10% {
            opacity: 0.6;
            transform: translateY(-10px) scale(1);
        }
        90% {
            opacity: 0.3;
            transform: translateY(-50px) scale(0.8);
        }
    }

    .header-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 700px;
        margin: 0 auto;
    }

    .icon-container {
        width: 100px;
        height: 100px;
        margin: 0 auto 30px;
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        border-radius: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 
            0 25px 50px rgba(59, 130, 246, 0.3),
            0 10px 25px rgba(139, 92, 246, 0.2),
            inset 0 2px 0 rgba(255, 255, 255, 0.3);
        position: relative;
        animation: iconFloat 5s ease-in-out infinite;
    }

    @keyframes iconFloat {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(5deg); }
    }

    /* Icon glow effect */
    .icon-container::after {
        content: '';
        position: absolute;
        inset: -5px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 28px;
        opacity: 0.3;
        filter: blur(20px);
        z-index: -1;
        animation: iconGlow 3s ease-in-out infinite;
    }

    @keyframes iconGlow {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.6; }
    }

    .icon-container svg {
        width: 50px;
        height: 50px;
        color: white;
        filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.2));
    }

    .form-title {
        font-weight: 900;
        font-size: 44px;
        background: linear-gradient(135deg, #1e293b 0%, #475569 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 14px;
        letter-spacing: -2px;
        line-height: 1.1;
    }

    .form-subtitle {
        color: #64748b;
        font-size: 17px;
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    .form-body {
        padding: 50px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }

    .full { 
        grid-column: span 3; 
    }

    .section-title {
        font-weight: 700;
        font-size: 19px;
        color: #1e293b;
        margin: 42px 0 26px 0;
        padding: 22px 30px;
        border-radius: 18px;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        border: 2px solid rgba(59, 130, 246, 0.1);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
    }

    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 5px;
        background: linear-gradient(180deg, #3b82f6 0%, #8b5cf6 100%);
        box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
    }

    .section-title::after {
        content: '◆';
        font-size: 16px;
        color: #3b82f6;
        animation: rotate 10s linear infinite;
    }

    .form-group {
        position: relative;
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

    .form-label.required::after {
        content: '*';
        color: #ef4444;
        margin-left: 5px;
        font-size: 15px;
    }

    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        background: #ffffff;
        border-radius: 14px;
        padding: 15px 18px;
        font-size: 15px;
        color: #1e293b;
        width: 100%;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-weight: 500;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #3b82f6;
        background: #ffffff;
        color: #1e293b;
        box-shadow: 
            0 0 0 4px rgba(59, 130, 246, 0.1),
            0 8px 24px rgba(59, 130, 246, 0.15);
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
        line-height: 1.6;
    }

    input[type="file"].form-control {
        padding: 14px 18px;
        cursor: pointer;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border: 2px dashed #cbd5e1;
    }

    input[type="file"].form-control:hover {
        border-color: #3b82f6;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    }

    input[type="file"].form-control::file-selector-button {
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
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
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    input[type="file"].form-control::file-selector-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
    }

    .file-info {
        color: #64748b;
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
        font-weight: 500;
    }

    .file-info::before {
        content: '💡';
        font-size: 15px;
    }

    .button-group {
        display: flex;
        justify-content: center;
        gap: 18px;
        margin-top: 50px;
        padding-top: 40px;
        border-top: 2px solid rgba(0, 0, 0, 0.04);
    }

    .btn {
        padding: 17px 50px;
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
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn:active::before {
        width: 300px;
        height: 300px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        color: white;
        box-shadow: 
            0 10px 30px rgba(59, 130, 246, 0.35),
            0 5px 15px rgba(139, 92, 246, 0.2),
            inset 0 2px 0 rgba(255, 255, 255, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 
            0 16px 40px rgba(59, 130, 246, 0.45),
            0 8px 20px rgba(139, 92, 246, 0.25),
            inset 0 2px 0 rgba(255, 255, 255, 0.2);
    }

    .btn-secondary {
        background: white;
        color: #3b82f6;
        border: 2px solid #3b82f6;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
    }

    .btn-secondary:hover {
        background: #3b82f6;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(59, 130, 246, 0.3);
    }

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%233b82f6' d='M13.354 5.646a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0l-5-5a.5.5 0 1 1 .708-.708L8 10.293l4.646-4.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 18px center;
        padding-right: 45px;
        cursor: pointer;
    }

    .form-select option {
        background: #ffffff;
        color: #1e293b;
        padding: 12px;
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
            font-size: 38px;
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
            padding: 30px 25px;
        }
        .form-title {
            font-size: 30px;
        }
        .button-group {
            flex-direction: column;
        }
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="deco-circle deco-1"></div>
<div class="deco-circle deco-2"></div>
<div class="grid-pattern"></div>

<div class="page-container">
    <div class="form-wrapper">
        <div class="form-header">
            <div class="sparkle"></div>
            <div class="sparkle"></div>
            <div class="sparkle"></div>
            <div class="sparkle"></div>

            <div class="header-content">
                <div class="icon-container">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 3H15C16.1046 3 17 3.89543 17 5V7C17 8.10457 16.1046 9 15 9H9C7.89543 9 7 8.10457 7 7V5C7 3.89543 7.89543 3 9 3Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 9H15V11C15 12.1046 14.1046 13 13 13H11C9.89543 13 9 12.1046 9 11V9Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5 13H19C20.1046 13 21 13.8954 21 15V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V15C3 13.8954 3.89543 13 5 13Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="7" cy="17" r="1" fill="currentColor"/>
                        <circle cx="17" cy="17" r="1" fill="currentColor"/>
                    </svg>
                </div>
                <h2 class="form-title">INPUT DATA PERIFERAL</h2>
                <p class="form-subtitle">Sistem Manajemen Perangkat Periferal</p>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('periferal.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="form-grid">

                    <div class="section-title full">Informasi Perangkat</div>

                    <div class="form-group">
                        <label class="form-label required">Nama</label>
                        <input type="text"
                               name="nama_perangkat"
                               class="form-control"
                               value="{{ old('nama_perangkat') }}"
                               placeholder="Contoh: Agus"
                               required>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Jenis Perangkat</label>
                        <select name="jenis_perangkat" class="form-select" required>
                            <option disabled selected>Pilih Jenis</option>
                            @foreach (['Printer','Scanner','AIO','Modem','Akses Point','Switch-Hub'] as $jenis)
                                <option value="{{ $jenis }}">{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">ID Perangkat</label>
                        <input type="text" 
                               name="id_perangkat" 
                               class="form-control" 
                               placeholder="Contoh: PRN-001"
                               required>
                    </div>

                    <div class="section-title full">Detail Spesifikasi</div>

                    <div class="form-group">
                        <label class="form-label">Merk</label>
                        <input type="text" 
                               name="merk" 
                               class="form-control"
                               placeholder="Contoh: HP, Canon, Epson">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tipe/Model</label>
                        <input type="text" 
                               name="tipe" 
                               class="form-control"
                               placeholder="Contoh: LaserJet Pro M404">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Posisi/Lokasi</label>
                        <input type="text" 
                               name="posisi" 
                               class="form-control"
                               placeholder="Contoh: Ruang IT Lantai 2">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Pengguna</label>
                        <input type="text" 
                               name="pengguna" 
                               class="form-control"
                               placeholder="Contoh: Budi Santoso">
                    </div>

                    <div class="form-group full">
                        <label class="form-label">Upload Foto Perangkat</label>
                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept="image/*">
                        <div class="file-info">
                            Format: PNG, JPG, JPEG | Maksimal 2MB
                        </div>
                    </div>

                    <div class="form-group full">
                        <label class="form-label">Keterangan Tambahan</label>
                        <textarea name="keterangan" 
                                  class="form-control" 
                                  rows="3"
                                  placeholder="Tuliskan informasi tambahan atau catatan khusus..."></textarea>
                    </div>

                    <div class="button-group full">
                        <a href="/" class="btn btn-secondary">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            Simpan Data
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection