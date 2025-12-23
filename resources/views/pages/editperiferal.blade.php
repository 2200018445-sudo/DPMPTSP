@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap');

    * {
        font-family: 'Space Grotesk', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
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
            radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 40%),
            radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.08) 0%, transparent 40%);
        animation: moveGradient 15s ease infinite;
        pointer-events: none;
    }

    @keyframes moveGradient {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(50px, 50px); }
    }

    .page-container {
        padding: 60px 20px;
        position: relative;
        z-index: 1;
    }

    .form-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 40px;
        overflow: hidden;
        box-shadow: 
            0 0 0 1px rgba(255, 255, 255, 0.3),
            0 40px 80px rgba(0, 0, 0, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
        animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(60px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Decorative corners */
    .form-wrapper::before,
    .form-wrapper::after {
        content: '';
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        opacity: 0.6;
        filter: blur(60px);
        pointer-events: none;
    }

    .form-wrapper::before {
        top: -40px;
        left: -40px;
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .form-wrapper::after {
        bottom: -40px;
        right: -40px;
        background: linear-gradient(135deg, #f093fb, #667eea);
    }

    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 60px;
        position: relative;
        overflow: hidden;
    }

    /* Animated circles in header */
    .circle-decoration {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 20s ease-in-out infinite;
    }

    .circle-1 {
        width: 200px;
        height: 200px;
        top: -50px;
        right: 10%;
        animation-delay: 0s;
    }

    .circle-2 {
        width: 150px;
        height: 150px;
        bottom: -30px;
        left: 15%;
        animation-delay: 3s;
    }

    .circle-3 {
        width: 100px;
        height: 100px;
        top: 40%;
        right: -20px;
        animation-delay: 6s;
    }

    @keyframes float {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        25% { transform: translate(20px, -20px) rotate(90deg); }
        50% { transform: translate(-20px, 20px) rotate(180deg); }
        75% { transform: translate(20px, 20px) rotate(270deg); }
    }

    .header-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .icon-container {
        width: 100px;
        height: 100px;
        margin: 0 auto 24px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 
            0 20px 40px rgba(0, 0, 0, 0.2),
            inset 0 2px 10px rgba(255, 255, 255, 0.3);
        transform-style: preserve-3d;
        animation: rotate3d 10s ease-in-out infinite;
    }

    @keyframes rotate3d {
        0%, 100% { transform: rotateY(0deg) rotateX(0deg); }
        50% { transform: rotateY(180deg) rotateX(10deg); }
    }

    .icon-container svg {
        width: 50px;
        height: 50px;
        color: white;
        filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.3));
    }

    .edit-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(20px);
        padding: 8px 20px;
        border-radius: 30px;
        color: white;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .form-title {
        font-weight: 700;
        font-size: 48px;
        color: white;
        margin-bottom: 12px;
        letter-spacing: -1px;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .form-subtitle {
        color: rgba(255, 255, 255, 0.9);
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    .form-body {
        padding: 60px;
        position: relative;
        z-index: 1;
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
        font-size: 24px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 40px 0 24px 0;
        padding: 16px 24px;
        border-radius: 16px;
        background-color: rgba(102, 126, 234, 0.08);
        position: relative;
        overflow: hidden;
    }

    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 5px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 0 5px 5px 0;
    }

    .form-label {
        color: #4a5568;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 10px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 12px;
    }

    .form-control, .form-select {
        border: 3px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #667eea 0%, #764ba2 100%) border-box;
        border-radius: 16px;
        padding: 16px 20px;
        font-size: 16px;
        color: #2d3748;
        width: 100%;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(102, 126, 234, 0.3);
        border-color: transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #667eea 0%, #f093fb 100%) border-box;
    }

    .form-control:hover:not(:focus), 
    .form-select:hover:not(:focus) {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(102, 126, 234, 0.15);
    }

    .form-control::placeholder {
        color: #a0aec0;
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
        background: white;
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
        letter-spacing: 0.5px;
        margin-right: 16px;
        cursor: pointer;
        transition: all 0.3s;
    }

    input[type="file"].form-control::file-selector-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    small {
        color: #e53e3e;
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
        border-top: 2px dashed rgba(102, 126, 234, 0.2);
    }

    .btn {
        padding: 18px 56px;
        border-radius: 16px;
        font-weight: 700;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
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
        background: rgba(255, 255, 255, 0.4);
        transform: translate(-50%, -50%);
        transition: width 0.8s, height 0.8s;
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
            inset 0 -2px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-4px);
        box-shadow: 
            0 16px 40px rgba(102, 126, 234, 0.5),
            inset 0 -2px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary {
        background: white;
        color: #667eea;
        border: 3px solid #667eea;
    }

    .btn-secondary:hover {
        background: #667eea;
        color: white;
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(102, 126, 234, 0.3);
    }

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%23667eea' d='M13.354 5.646a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0l-5-5a.5.5 0 1 1 .708-.708L8 10.293l4.646-4.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 20px center;
        padding-right: 50px;
        cursor: pointer;
    }

    @media (max-width: 992px) {
        .form-grid { 
            grid-template-columns: repeat(2, 1fr); 
        }
        .full { 
            grid-column: span 2; 
        }
        .form-body {
            padding: 40px 35px;
        }
        .form-header {
            padding: 50px 35px;
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
            padding: 35px 25px;
        }
        .form-header {
            padding: 40px 25px;
        }
        .form-title {
            font-size: 32px;
        }
        .button-group {
            flex-direction: column;
        }
        .btn {
            width: 100%;
        }
    }
</style>

<div class="page-container">
    <div class="form-wrapper">
        <div class="form-header">
            <div class="circle-decoration circle-1"></div>
            <div class="circle-decoration circle-2"></div>
            <div class="circle-decoration circle-3"></div>

            <div class="header-content">
                <div class="edit-badge">✏️ Edit Mode</div>
                <div class="icon-container">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 3H18C19.1046 3 20 3.89543 20 5V15C20 16.1046 19.1046 17 18 17H6C4.89543 17 4 16.1046 4 15V5C4 3.89543 4.89543 3 6 3Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8 21H16" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 17V21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="form-title">EDIT DATA PERIFERAL</h2>
                <p class="form-subtitle">Update Perangkat Periferal</p>
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
                        <small style="color: #fc0019ff;">
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