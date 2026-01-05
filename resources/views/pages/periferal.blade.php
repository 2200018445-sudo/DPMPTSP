@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');

    * {
        font-family: 'Inter', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: fixed;
        inset: 0;
        background: 
            radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(139, 92, 246, 0.15) 0%, transparent 50%);
        animation: pulse 8s ease infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    .page-container {
        padding: 60px 20px;
        position: relative;
        z-index: 1;
    }

    .form-wrapper {
        max-width: 1100px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 
            0 0 0 1px rgba(255, 255, 255, 0.1),
            0 20px 60px rgba(0, 0, 0, 0.3);
        animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6, #06b6d4);
        background-size: 200% 100%;
        animation: gradient 3s ease infinite;
    }

    @keyframes gradient {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .form-header {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        padding: 40px 40px 35px;
        text-align: center;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }

    .icon-container {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.4);
        animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    .icon-container svg {
        width: 40px;
        height: 40px;
        color: white;
    }

    .form-title {
        font-weight: 800;
        font-size: 32px;
        background: linear-gradient(135deg, #1e293b, #475569);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
        letter-spacing: -1px;
    }

    .form-subtitle {
        color: #64748b;
        font-size: 15px;
        font-weight: 500;
    }

    .form-body {
        padding: 40px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .full { 
        grid-column: span 3; 
    }

    .section-title {
        font-weight: 700;
        font-size: 16px;
        color: #1e293b;
        margin: 32px 0 20px 0;
        padding: 16px 24px;
        border-radius: 12px;
        background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
        border-left: 4px solid #3b82f6;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title::after {
        content: '◆';
        font-size: 14px;
        color: #3b82f6;
    }

    .form-group {
        position: relative;
    }

    .form-label {
        color: #475569;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-label.required::after {
        content: '*';
        color: #ef4444;
        margin-left: 4px;
    }

    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        background: #ffffff;
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 15px;
        color: #1e293b;
        width: 100%;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        transform: translateY(-1px);
    }

    .form-control:hover:not(:focus), 
    .form-select:hover:not(:focus) {
        border-color: #cbd5e1;
    }

    .form-control::placeholder {
        color: #94a3b8;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 90px;
        line-height: 1.6;
    }

    input[type="file"].form-control {
        padding: 12px 16px;
        cursor: pointer;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border: 2px dashed #cbd5e1;
    }

    input[type="file"].form-control:hover {
        border-color: #3b82f6;
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
    }

    input[type="file"].form-control::file-selector-button {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 0.5px;
        margin-right: 12px;
        cursor: pointer;
        transition: all 0.3s;
    }

    input[type="file"].form-control::file-selector-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(59, 130, 246, 0.3);
    }

    .file-info {
        color: #64748b;
        font-size: 12px;
        margin-top: 8px;
        font-weight: 500;
    }

    .button-group {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-top: 40px;
        padding-top: 32px;
        border-top: 2px solid rgba(0, 0, 0, 0.06);
    }

    .btn {
        padding: 14px 40px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        box-shadow: 0 8px 24px rgba(59, 130, 246, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(59, 130, 246, 0.4);
    }

    .btn-secondary {
        background: white;
        color: #3b82f6;
        border: 2px solid #3b82f6;
    }

    .btn-secondary:hover {
        background: #3b82f6;
        color: white;
        transform: translateY(-2px);
    }

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%233b82f6' d='M13.354 5.646a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0l-5-5a.5.5 0 1 1 .708-.708L8 10.293l4.646-4.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        padding-right: 40px;
        cursor: pointer;
    }

    @media (max-width: 992px) {
        .form-grid { 
            grid-template-columns: repeat(2, 1fr); 
        }
        .full { 
            grid-column: span 2; 
        }
        .form-body, .form-header {
            padding: 35px 30px;
        }
        .form-title {
            font-size: 28px;
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
        .form-body, .form-header {
            padding: 25px 20px;
        }
        .form-title {
            font-size: 24px;
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

<div class="page-container">
    <div class="form-wrapper">
        <div class="form-header">
            <div class="icon-container">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 3H15C16.1046 3 17 3.89543 17 5V7C17 8.10457 16.1046 9 15 9H9C7.89543 9 7 8.10457 7 7V5C7 3.89543 7.89543 3 9 3Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 9H15V11C15 12.1046 14.1046 13 13 13H11C9.89543 13 9 12.1046 9 11V9Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 13H19C20.1046 13 21 13.8954 21 15V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V15C3 13.8954 3.89543 13 5 13Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="7" cy="17" r="1" fill="currentColor"/>
                    <circle cx="17" cy="17" r="1" fill="currentColor"/>
                </svg>
            </div>
            <h2 class="form-title">PERANGKAT PERIFERAL</h2>
            <p class="form-subtitle">Sistem Manajemen Perangkat Periferal</p>
        </div>

        <div class="form-body">
            <form action="{{ route('periferal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-grid">
                    <div class="section-title full">Informasi Perangkat</div>

                    <div class="form-group">
                        <label class="form-label required">Nama</label>
                        <input type="text" name="nama_perangkat" class="form-control" value="{{ old('nama_perangkat') }}" placeholder="Contoh: Agus" required>
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
                        <input type="text" name="id_perangkat" class="form-control" placeholder="Contoh: PRN-001" required>
                    </div>

                    <div class="section-title full">Detail Spesifikasi</div>

                    <div class="form-group">
                        <label class="form-label">Merk</label>
                        <input type="text" name="merk" class="form-control" placeholder="Contoh: HP, Canon, Epson">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tipe/Model</label>
                        <input type="text" name="tipe" class="form-control" placeholder="Contoh: LaserJet Pro M404">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Posisi/Lokasi</label>
                        <input type="text" name="posisi" class="form-control" placeholder="Contoh: Ruang IT Lantai 2">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Pengguna</label>
                        <input type="text" name="pengguna" class="form-control" placeholder="Contoh: Budi Santoso">
                    </div>

                    <div class="form-group full">
                        <label class="form-label">Upload Foto Perangkat</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <div class="file-info">💡 Format: PNG, JPG, JPEG | Maksimal 2MB</div>
                    </div>

                    <div class="form-group full">
                        <label class="form-label">Keterangan Tambahan</label>
                        <textarea name="keterangan" class="form-control" rows="3" placeholder="Tuliskan informasi tambahan atau catatan khusus..."></textarea>
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