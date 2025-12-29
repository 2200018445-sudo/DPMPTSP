@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    * {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    /* Animated Background Patterns */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
        animation: bgFloat 15s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes bgFloat {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(30px, -30px); }
    }

    .container-wrapper {
        position: relative;
        z-index: 1;
        padding: 50px 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .form-wrapper {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 32px;
        overflow: hidden;
        box-shadow: 
            0 30px 90px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(255, 255, 255, 0.5);
        animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(60px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Premium Gradient Header */
    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        padding: 60px 50px;
        position: relative;
        overflow: hidden;
    }

    /* Floating Orbs in Header */
    .header-orb {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        animation: floatOrb 20s ease-in-out infinite;
    }

    .orb-1 {
        width: 300px;
        height: 300px;
        top: -150px;
        right: -100px;
    }

    .orb-2 {
        width: 200px;
        height: 200px;
        bottom: -80px;
        left: 10%;
        animation-delay: 5s;
    }

    @keyframes floatOrb {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(20px, -30px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    .header-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .badge-container {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(20px);
        padding: 10px 24px;
        border-radius: 50px;
        margin-bottom: 20px;
        border: 2px solid rgba(255, 255, 255, 0.4);
    }

    .badge-dot {
        width: 8px;
        height: 8px;
        background: white;
        border-radius: 50%;
        animation: pulse 2s ease-in-out infinite;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.7; transform: scale(1.3); }
    }

    .badge-text {
        color: white;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .form-title {
        font-weight: 900;
        font-size: 48px;
        color: white;
        margin-bottom: 12px;
        letter-spacing: -1px;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        line-height: 1.1;
    }

    .form-subtitle {
        color: rgba(255, 255, 255, 0.95);
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .form-body {
        padding: 60px 50px;
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }

    .full { 
        grid-column: span 3; 
    }

    /* Modern Section Title */
    .section-title {
        font-weight: 800;
        font-size: 24px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 40px 0 24px 0;
        padding: 18px 24px;
        background-color: #f1f5f9;
        border-radius: 16px;
        border-left: 5px solid #667eea;
        position: relative;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.1);
    }

    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 5px;
        background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
        animation: slideUpDown 3s ease-in-out infinite;
    }

    @keyframes slideUpDown {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(15px); }
    }

    .form-label {
        color: #475569;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 10px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .form-label.required::after {
        content: '*';
        color: #ef4444;
        margin-left: 4px;
        font-size: 16px;
    }

    /* Modern Input Styles */
    .form-control, .form-select {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 14px;
        padding: 14px 18px;
        font-size: 15px;
        color: #1e293b;
        width: 100%;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-weight: 500;
    }

    .form-control:focus, .form-select:focus {
        background: white;
        border-color: #667eea;
        box-shadow: 
            0 0 0 4px rgba(102, 126, 234, 0.15),
            0 8px 20px rgba(102, 126, 234, 0.2);
        outline: none;
        transform: translateY(-2px);
    }

    .form-control:hover:not(:focus), 
    .form-select:hover:not(:focus) {
        border-color: #cbd5e1;
        transform: translateY(-1px);
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

    /* File Input Styling */
    input[type="file"].form-control {
        padding: 12px 18px;
        cursor: pointer;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    input[type="file"].form-control::file-selector-button {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 10px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 1px;
        margin-right: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    input[type="file"].form-control::file-selector-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    small {
        color: #f59e0b;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 8px;
        font-weight: 600;
    }

    small::before {
        content: '⚠️';
        font-size: 14px;
    }

    /* Custom Select Arrow */
    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%23667eea' d='M13.354 5.646a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0l-5-5a.5.5 0 1 1 .708-.708L8 10.293l4.646-4.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 18px center;
        padding-right: 50px;
        cursor: pointer;
    }

    /* Modern Button Group */
    .button-group {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-top: 60px;
        padding-top: 40px;
        border-top: 2px solid #e2e8f0;
    }

    .btn {
        padding: 16px 48px;
        border-radius: 14px;
        font-weight: 800;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        display: inline-block;
    }

    /* Ripple Effect */
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 
            0 10px 30px rgba(102, 126, 234, 0.4),
            inset 0 -2px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 
            0 15px 40px rgba(102, 126, 234, 0.5),
            inset 0 -2px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-secondary {
        background: white;
        color: #475569;
        border: 2px solid #e2e8f0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .btn-secondary:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    /* Form Group Animation */
    .form-group {
        animation: fadeInUp 0.6s ease both;
    }

    .form-group:nth-child(1) { animation-delay: 0.05s; }
    .form-group:nth-child(2) { animation-delay: 0.1s; }
    .form-group:nth-child(3) { animation-delay: 0.15s; }
    .form-group:nth-child(4) { animation-delay: 0.2s; }
    .form-group:nth-child(5) { animation-delay: 0.25s; }
    .form-group:nth-child(6) { animation-delay: 0.3s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .form-grid { 
            grid-template-columns: repeat(2, 1fr); 
            gap: 24px;
        }
        .full { 
            grid-column: span 2; 
        }
        .form-body {
            padding: 50px 40px;
        }
        .form-header {
            padding: 50px 40px;
        }
        .form-title {
            font-size: 40px;
        }
    }

    @media (max-width: 576px) {
        .form-grid { 
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .full { 
            grid-column: span 1; 
        }
        .form-body {
            padding: 40px 24px;
        }
        .form-header {
            padding: 40px 24px;
        }
        .form-title {
            font-size: 32px;
        }
        .form-subtitle {
            font-size: 16px;
        }
        .button-group {
            flex-direction: column;
            gap: 12px;
        }
        .btn {
            width: 100%;
        }
        .section-title {
            font-size: 20px;
        }
    }

    /* Floating Particle Decoration */
    .particle {
        position: fixed;
        width: 6px;
        height: 6px;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 50%;
        pointer-events: none;
        animation: floatParticle 15s infinite ease-in-out;
        z-index: 0;
    }

    @keyframes floatParticle {
        0%, 100% { 
            opacity: 0;
            transform: translateY(0) translateX(0);
        }
        10%, 90% { 
            opacity: 1;
        }
        50% { 
            transform: translateY(-100vh) translateX(50px);
        }
    }

    .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { left: 30%; animation-delay: 3s; }
    .particle:nth-child(3) { left: 50%; animation-delay: 6s; }
    .particle:nth-child(4) { left: 70%; animation-delay: 9s; }
    .particle:nth-child(5) { left: 90%; animation-delay: 12s; }
</style>

<!-- Floating Particles -->
<div class="particle"></div>
<div class="particle"></div>
<div class="particle"></div>
<div class="particle"></div>
<div class="particle"></div>

<div class="container-wrapper">
    <div class="form-wrapper">
        <div class="form-header">
            <div class="header-orb orb-1"></div>
            <div class="header-orb orb-2"></div>

            <div class="header-content">
                <div class="badge-container">
                    <div class="badge-dot"></div>
                    <span class="badge-text">IT Asset Management</span>
                </div>
                <h1 class="form-title">PERANGKAT UTAMA</h1>
                <p class="form-subtitle">Sistem Manajemen Inventaris TIK</p>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('perangkatutama.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf

                <div class="form-grid">

                    {{-- ===== PERANGKAT UTAMA ===== --}}
                    <div class="section-title full">Perangkat Utama</div>

                    <div class="form-group">
                        <label class="form-label required">Username</label>
                        <input type="text" name="nama_perangkat" class="form-control" placeholder="Masukkan username" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Jenis Perangkat</label>
                        <select name="jenis_perangkat" class="form-select" required>
                            <option disabled selected>Pilih jenis perangkat</option>
                            <option>PC Standalone</option>
                            <option>PC AIO</option>
                            <option>PC Server</option>
                            <option>Laptop</option>
                            <option>Smartphone</option>
                            <option>Tablet</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">ID Pegawai</label>
                        <input type="text" name="id_perangkat" class="form-control" placeholder="Contoh: EMP001" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tahun Produksi</label>
                        <input type="number" name="tahun_produksi" class="form-control" placeholder="2024">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Posisi</label>
                        <input type="text" name="posisi" class="form-control" placeholder="Departemen / Divisi">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Pengguna</label>
                        <input type="text" name="pengguna" class="form-control" placeholder="Nama pengguna">
                    </div>

                    {{-- ===== UPLOAD FOTO ===== --}}
                    <div class="full form-group">
                        <label class="form-label">Foto Perangkat</label>
                        <input type="file" 
                               name="foto" 
                               class="form-control"
                               accept="image/*">
                        <small>
                            Format: Wajib PNG | Maksimal 2MB
                        </small>
                    </div>

                    {{-- ===== SPESIFIKASI ===== --}}
                    <div class="section-title full">Spesifikasi Perangkat</div>

                    <div class="form-group">
                        <label class="form-label">Operating System</label>
                        <select name="os" class="form-select">
                            <option>Windows 11</option>
                            <option>Windows 10</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">RAM (Merk)</label>
                        <input type="text" name="ram_merk" class="form-control" placeholder="Contoh: Corsair">
                    </div>

                    <div class="form-group">
                        <label class="form-label">RAM (Kapasitas)</label>
                        <input type="text" name="ram_kapasitas" class="form-control" placeholder="Contoh: 16GB">
                    </div>

                    <div class="form-group">
                        <label class="form-label">SSD (Merk)</label>
                        <input type="text" name="ssd_merk" class="form-control" placeholder="Contoh: Samsung">
                    </div>

                    <div class="form-group">
                        <label class="form-label">SSD (Kapasitas)</label>
                        <input type="text" name="ssd_kapasitas" class="form-control" placeholder="Contoh: 512GB">
                    </div>

                    <div class="form-group">
                        <label class="form-label">HDD (Merk)</label>
                        <input type="text" name="hdd_merk" class="form-control" placeholder="Contoh: Seagate">
                    </div>

                    <div class="form-group">
                        <label class="form-label">HDD (Kapasitas)</label>
                        <input type="text" name="hdd_kapasitas" class="form-control" placeholder="Contoh: 1TB">
                    </div>

                    <div class="form-group">
                        <label class="form-label">App Office</label>
                        <input type="text" name="office_nama" class="form-control" placeholder="Contoh: Microsoft Office 2021">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Status App Office</label>
                        <select name="office_status" class="form-select">
                            <option>Genuine</option>
                            <option>Not Genuine</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Status Perangkat</label>
                        <select name="status" class="form-select">
                            <option>OK</option>
                            <option>Upgrade</option>
                        </select>
                    </div>

                    <div class="full form-group">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2" placeholder="Tambahkan catatan atau informasi tambahan..."></textarea>
                    </div>

                    {{-- ===== BUTTON ===== --}}
                    <div class="full button-group">
                        <a href="/" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection