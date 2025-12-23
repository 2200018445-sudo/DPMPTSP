@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

    * {
        font-family: 'Outfit', sans-serif;
    }

    body {
        background: #0a0e27;
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
            radial-gradient(circle at 10% 20%, rgba(255, 107, 107, 0.2) 0%, transparent 40%),
            radial-gradient(circle at 90% 30%, rgba(255, 168, 76, 0.15) 0%, transparent 40%),
            radial-gradient(circle at 50% 80%, rgba(255, 195, 113, 0.2) 0%, transparent 40%),
            radial-gradient(circle at 70% 60%, rgba(255, 107, 107, 0.1) 0%, transparent 40%);
        animation: meshMove 20s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes meshMove {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -30px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    .container-wrapper {
        position: relative;
        z-index: 1;
        padding: 70px 20px;
        max-width: 1500px;
        margin: 0 auto;
    }

    .form-wrapper {
        background: linear-gradient(145deg, #1a1f3a 0%, #0f1423 100%);
        border-radius: 40px;
        overflow: hidden;
        box-shadow: 
            0 0 0 1px rgba(255, 107, 107, 0.2),
            0 50px 100px rgba(0, 0, 0, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.03);
        animation: slideInScale 1s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }

    @keyframes slideInScale {
        from {
            opacity: 0;
            transform: translateY(80px) scale(0.85);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Glowing border effect */
    .form-wrapper::before {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(45deg, #ff6b6b, #ffa84c, #ffc371, #ff6b6b);
        border-radius: 40px;
        z-index: -1;
        opacity: 0.5;
        filter: blur(20px);
        animation: borderGlow 3s ease-in-out infinite;
    }

    @keyframes borderGlow {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.6; }
    }

    .form-header {
        background: linear-gradient(135deg, #ff6b6b 0%, #ffa84c 50%, #ffc371 100%);
        padding: 70px 60px;
        position: relative;
        overflow: hidden;
    }

    /* Animated geometric shapes */
    .geo-shape {
        position: absolute;
        opacity: 0.1;
        animation: rotateShape 25s linear infinite;
    }

    .shape-1 {
        width: 300px;
        height: 300px;
        top: -100px;
        right: -50px;
        background: linear-gradient(45deg, transparent 30%, white 30%, white 70%, transparent 70%);
        transform: rotate(45deg);
    }

    .shape-2 {
        width: 200px;
        height: 200px;
        bottom: -50px;
        left: 10%;
        border: 40px solid white;
        border-radius: 50%;
        animation-delay: -5s;
    }

    .shape-3 {
        width: 150px;
        height: 150px;
        top: 50%;
        left: -30px;
        background: white;
        clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        animation-delay: -10s;
    }

    @keyframes rotateShape {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
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
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(20px);
        padding: 10px 24px;
        border-radius: 30px;
        margin-bottom: 24px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .badge-dot {
        width: 8px;
        height: 8px;
        background: white;
        border-radius: 50%;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.3); }
    }

    .badge-text {
        color: white;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .form-title {
        font-weight: 800;
        font-size: 56px;
        color: white;
        margin-bottom: 16px;
        letter-spacing: -2px;
        text-shadow: 0 6px 24px rgba(0, 0, 0, 0.3);
        line-height: 1.1;
    }

    .form-subtitle {
        color: rgba(255, 255, 255, 0.95);
        font-size: 20px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .form-body {
        padding: 70px 60px;
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
        font-weight: 800;
        font-size: 26px;
        color: #ff6b6b;
        margin: 45px 0 28px 0;
        padding: 20px 28px;
        background: linear-gradient(90deg, rgba(255, 107, 107, 0.15) 0%, transparent 100%);
        border-radius: 16px;
        border-left: 6px solid #ff6b6b;
        position: relative;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 16px rgba(255, 107, 107, 0.1);
    }

    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 6px;
        background: linear-gradient(180deg, #ff6b6b 0%, #ffa84c 100%);
        animation: slideDown 2s ease-in-out infinite;
    }

    @keyframes slideDown {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(10px); }
    }

    .form-label {
        color: #cbd5e1;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 12px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .form-label.required::after {
        content: '*';
        color: #ff6b6b;
        margin-left: 6px;
        font-size: 16px;
    }

    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.95);
        border: 2px solid rgba(255, 107, 107, 0.3);
        border-radius: 16px;
        padding: 16px 22px;
        font-size: 16px;
        color: #1e293b;
        width: 100%;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(10px);
    }

    .form-control:focus, .form-select:focus {
        background: #ffffff;
        border-color: #ff6b6b;
        box-shadow: 
            0 0 0 4px rgba(255, 107, 107, 0.15),
            0 12px 32px rgba(255, 107, 107, 0.25);
        outline: none;
        transform: translateY(-2px);
    }

    .form-control:hover:not(:focus), 
    .form-select:hover:not(:focus) {
        border-color: rgba(255, 107, 107, 0.4);
        transform: translateY(-1px);
    }

    .form-control::placeholder {
        color: #64748b;
        font-weight: 400;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 110px;
        font-family: inherit;
    }

    input[type="file"].form-control {
        padding: 14px 22px;
        cursor: pointer;
    }

    input[type="file"].form-control::file-selector-button {
        background: linear-gradient(135deg, #ff6b6b 0%, #ffa84c 100%);
        color: white;
        border: none;
        padding: 10px 28px;
        border-radius: 10px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 1px;
        margin-right: 16px;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.3);
    }

    input[type="file"].form-control::file-selector-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(255, 107, 107, 0.4);
    }

    small {
        color: #ffa84c;
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

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%23ff6b6b' d='M13.354 5.646a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0l-5-5a.5.5 0 1 1 .708-.708L8 10.293l4.646-4.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 22px center;
        padding-right: 55px;
        cursor: pointer;
    }

    .button-group {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 70px;
        padding-top: 50px;
        border-top: 2px solid rgba(255, 107, 107, 0.15);
    }

    .btn {
        padding: 20px 60px;
        border-radius: 16px;
        font-weight: 800;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
        transition: width 0.8s, height 0.8s;
    }

    .btn:active::before {
        width: 500px;
        height: 500px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #ff6b6b 0%, #ffa84c 50%, #ffc371 100%);
        color: white;
        box-shadow: 
            0 12px 36px rgba(255, 107, 107, 0.45),
            inset 0 -3px 12px rgba(0, 0, 0, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-4px);
        box-shadow: 
            0 18px 48px rgba(255, 107, 107, 0.55),
            inset 0 -3px 12px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary {
        background: rgba(71, 85, 105, 0.4);
        color: #e2e8f0;
        border: 2px solid rgba(255, 107, 107, 0.3);
        backdrop-filter: blur(10px);
    }

    .btn-secondary:hover {
        background: rgba(71, 85, 105, 0.6);
        border-color: rgba(255, 107, 107, 0.5);
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(255, 107, 107, 0.2);
    }

    /* Sparkle effect */
    @keyframes sparkle {
        0%, 100% { opacity: 0; transform: scale(0) rotate(0deg); }
        50% { opacity: 1; transform: scale(1) rotate(180deg); }
    }

    @media (max-width: 992px) {
        .form-grid { 
            grid-template-columns: repeat(2, 1fr); 
        }
        .full { 
            grid-column: span 2; 
        }
        .form-body {
            padding: 50px 40px;
        }
        .form-header {
            padding: 60px 40px;
        }
        .form-title {
            font-size: 42px;
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
        .form-body {
            padding: 40px 28px;
        }
        .form-header {
            padding: 50px 28px;
        }
        .form-title {
            font-size: 36px;
        }
        .button-group {
            flex-direction: column;
        }
        .btn {
            width: 100%;
        }
    }
</style>

<div class="container-wrapper">
    <div class="form-wrapper">
        <div class="form-header">
            <div class="geo-shape shape-1"></div>
            <div class="geo-shape shape-2"></div>
            <div class="geo-shape shape-3"></div>

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
            {{-- ⚠️ enctype wajib --}}
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