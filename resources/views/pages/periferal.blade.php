@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    * {
        font-family: 'Inter', sans-serif;
    }

    body {
        background: #0f0f23;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    /* Animated mesh gradient background */
    .gradient-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 10% 20%, rgba(240, 147, 251, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 90% 10%, rgba(102, 126, 234, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 50% 90%, rgba(245, 87, 108, 0.15) 0%, transparent 50%);
        animation: moveGradient 20s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes moveGradient {
        0%, 100% { 
            background: 
                radial-gradient(circle at 10% 20%, rgba(240, 147, 251, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 90% 10%, rgba(102, 126, 234, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 50% 90%, rgba(245, 87, 108, 0.15) 0%, transparent 50%);
        }
        50% { 
            background: 
                radial-gradient(circle at 90% 80%, rgba(240, 147, 251, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 10% 90%, rgba(102, 126, 234, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 50% 10%, rgba(245, 87, 108, 0.15) 0%, transparent 50%);
        }
    }

    /* Grid pattern overlay */
    .grid-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            linear-gradient(rgba(102, 126, 234, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(102, 126, 234, 0.03) 1px, transparent 1px);
        background-size: 50px 50px;
        pointer-events: none;
        opacity: 0.5;
    }

    .page-container {
        padding: 80px 20px;
        position: relative;
        z-index: 1;
    }

    .form-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        background: rgba(20, 20, 40, 0.7);
        backdrop-filter: blur(20px);
        border-radius: 32px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 
            0 0 0 1px rgba(102, 126, 234, 0.2),
            0 50px 100px rgba(0, 0, 0, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.05);
        animation: fadeIn 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-header {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.2) 0%, rgba(118, 75, 162, 0.2) 100%);
        padding: 50px 50px;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Floating particles */
    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        animation: float 15s ease-in-out infinite;
    }

    .particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; }
    .particle:nth-child(2) { left: 20%; top: 80%; animation-delay: 2s; }
    .particle:nth-child(3) { left: 60%; top: 40%; animation-delay: 4s; }
    .particle:nth-child(4) { left: 80%; top: 60%; animation-delay: 6s; }
    .particle:nth-child(5) { left: 40%; top: 90%; animation-delay: 8s; }

    @keyframes float {
        0%, 100% { transform: translate(0, 0); opacity: 0.3; }
        50% { transform: translate(100px, -50px); opacity: 0.8; }
    }

    .header-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .icon-container {
        width: 90px;
        height: 90px;
        margin: 0 auto 24px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 
            0 20px 50px rgba(102, 126, 234, 0.4),
            inset 0 2px 10px rgba(255, 255, 255, 0.2);
        animation: pulse 3s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .icon-container svg {
        width: 45px;
        height: 45px;
        color: white;
        filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.3));
    }

    .form-title {
        font-weight: 800;
        font-size: 42px;
        background: linear-gradient(135deg, #fff 0%, rgba(255, 255, 255, 0.7) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 12px;
        letter-spacing: -1.5px;
    }

    .form-subtitle {
        color: rgba(255, 255, 255, 0.6);
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.5px;
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
        font-size: 20px;
        color: #fff;
        margin: 40px 0 24px 0;
        padding: 0 0 16px 0;
        border-bottom: 2px solid rgba(102, 126, 234, 0.3);
        position: relative;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .section-title::before {
        content: '';
        width: 6px;
        height: 24px;
        background: linear-gradient(135deg, #667eea 0%, #f093fb 100%);
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(102, 126, 234, 0.5);
    }

    .form-group {
        position: relative;
    }

    .form-label {
        color: rgba(255, 255, 255, 0.8);
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 10px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-size: 11px;
    }

    .form-control, .form-select {
        border: 2px solid rgba(255, 255, 255, 0.15);
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        padding: 14px 18px;
        font-size: 15px;
        color: #1a1a2e;
        width: 100%;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-weight: 500;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #667eea;
        background: #ffffff;
        box-shadow: 
            0 0 0 4px rgba(102, 126, 234, 0.15),
            0 8px 24px rgba(102, 126, 234, 0.25);
        transform: translateY(-1px);
        color: #1a1a2e;
    }

    .form-control:hover:not(:focus), 
    .form-select:hover:not(:focus) {
        border-color: rgba(255, 255, 255, 0.25);
        background: #ffffff;
    }

    .form-control::placeholder {
        color: rgba(26, 26, 46, 0.4);
        font-weight: 400;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
        font-family: inherit;
    }

    input[type="file"].form-control {
        padding: 12px 16px;
        cursor: pointer;
    }

    input[type="file"].form-control::file-selector-button {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: 0.5px;
        margin-right: 14px;
        cursor: pointer;
        transition: all 0.3s;
    }

    input[type="file"].form-control::file-selector-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .file-info {
        color: rgba(255, 255, 255, 0.5);
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 8px;
        font-weight: 500;
    }

    .file-info::before {
        content: '💡';
        font-size: 14px;
    }

    .button-group {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-top: 50px;
        padding-top: 40px;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .btn {
        padding: 16px 48px;
        border-radius: 12px;
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
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn:active::before {
        width: 300px;
        height: 300px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 
            0 10px 30px rgba(102, 126, 234, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 
            0 16px 40px rgba(102, 126, 234, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.05);
        color: rgba(255, 255, 255, 0.9);
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.3);
        transform: translateY(-3px);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.3);
    }

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%23667eea' d='M13.354 5.646a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0l-5-5a.5.5 0 1 1 .708-.708L8 10.293l4.646-4.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 18px center;
        padding-right: 45px;
        cursor: pointer;
    }

    .form-select option {
        background: #ffffff;
        color: #1a1a2e;
        padding: 10px;
    }

    /* Required indicator */
    .form-label.required::after {
        content: '*';
        color: #f093fb;
        margin-left: 4px;
        font-size: 14px;
    }

    /* Focus glow effect */
    .form-control:focus + .glow,
    .form-select:focus + .glow {
        opacity: 1;
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
            font-size: 32px;
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

<div class="gradient-bg"></div>
<div class="grid-overlay"></div>

<div class="page-container">
    <div class="form-wrapper">
        <div class="form-header">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>

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
                <p class="form-subtitle">Sistem Manajemen Perangkat Periferal Modern</p>
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
                        <label class="form-label required">Nama Perangkat</label>
                        <input type="text"
                               name="nama_perangkat"
                               class="form-control"
                               value="{{ old('nama_perangkat') }}"
                               placeholder="Contoh: Printer HP LaserJet"
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