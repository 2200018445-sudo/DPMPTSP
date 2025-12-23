@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: #0f172a;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 50%, rgba(34, 211, 238, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(168, 85, 247, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 40% 90%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 60px 20px;
        position: relative;
        z-index: 1;
    }

    .form-wrapper {
        max-width: 600px;
        width: 100%;
        background: linear-gradient(145deg, #1e293b 0%, #0f172a 100%);
        border-radius: 32px;
        box-shadow: 
            0 0 0 1px rgba(255, 255, 255, 0.1),
            0 50px 100px -20px rgba(0, 0, 0, 0.5),
            inset 0 1px 0 0 rgba(255, 255, 255, 0.05);
        overflow: hidden;
        animation: floatIn 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        position: relative;
    }

    @keyframes floatIn {
        from {
            opacity: 0;
            transform: translateY(50px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .glow-effect {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(34, 211, 238, 0.1) 0%, transparent 50%);
        animation: rotate 20s linear infinite;
        pointer-events: none;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .form-header {
        padding: 48px 48px 40px;
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 auto 24px;
        background: linear-gradient(135deg, #22d3ee 0%, #06b6d4 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        box-shadow: 
            0 20px 40px rgba(34, 211, 238, 0.3),
            inset 0 -2px 10px rgba(0, 0, 0, 0.2);
        animation: pulse 3s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); box-shadow: 0 20px 40px rgba(34, 211, 238, 0.3); }
        50% { transform: scale(1.05); box-shadow: 0 25px 50px rgba(34, 211, 238, 0.5); }
    }

    .icon-wrapper::before {
        content: '';
        position: absolute;
        inset: -3px;
        background: linear-gradient(135deg, #22d3ee, #06b6d4, #22d3ee);
        border-radius: 22px;
        opacity: 0;
        transition: opacity 0.3s;
        z-index: -1;
        animation: glow 2s ease-in-out infinite;
    }

    @keyframes glow {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    .icon-wrapper svg {
        width: 40px;
        height: 40px;
        color: white;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
    }

    .form-title {
        font-weight: 800;
        font-size: 32px;
        background: linear-gradient(135deg, #22d3ee 0%, #06b6d4 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
    }

    .form-subtitle {
        color: #94a3b8;
        font-size: 15px;
        font-weight: 500;
    }

    .form-body {
        padding: 0 48px 48px;
        position: relative;
        z-index: 1;
    }

    .alert {
        border-radius: 16px;
        border: 1px solid;
        padding: 16px 20px;
        margin-bottom: 28px;
        font-size: 14px;
        font-weight: 500;
        animation: slideDown 0.5s ease;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.1);
        color: #4ade80;
        border-color: rgba(34, 197, 94, 0.3);
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        color: #f87171;
        border-color: rgba(239, 68, 68, 0.3);
    }

    .form-group {
        margin-bottom: 24px;
        position: relative;
    }

    .form-label {
        color: #cbd5e1;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 10px;
        display: block;
        letter-spacing: 0.3px;
    }

    .form-label.required::after {
        content: '*';
        color: #f87171;
        margin-left: 6px;
        font-size: 16px;
    }

    .input-wrapper {
        position: relative;
    }

    .form-control,
    .form-select,
    textarea {
        background: rgba(30, 41, 59, 0.5);
        border: 2px solid rgba(71, 85, 105, 0.5);
        border-radius: 14px;
        padding: 14px 18px;
        font-size: 15px;
        color: #f1f5f9;
        width: 100%;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(10px);
    }

    .form-control:focus,
    .form-select:focus,
    textarea:focus {
        background: rgba(30, 41, 59, 0.8);
        border-color: #22d3ee;
        box-shadow: 
            0 0 0 4px rgba(34, 211, 238, 0.15),
            0 8px 24px rgba(34, 211, 238, 0.2);
        outline: none;
    }

    .form-control:hover:not(:focus),
    .form-select:hover:not(:focus),
    textarea:hover:not(:focus) {
        border-color: rgba(71, 85, 105, 0.8);
    }

    .form-control::placeholder,
    textarea::placeholder {
        color: #64748b;
    }

    textarea {
        resize: vertical;
        min-height: 110px;
        font-family: inherit;
    }

    .form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%2394a3b8' d='M13.354 5.646a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0l-5-5a.5.5 0 1 1 .708-.708L8 10.293l4.646-4.647a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 18px center;
        padding-right: 50px;
        cursor: pointer;
    }

    .button-group {
        display: flex;
        gap: 16px;
        margin-top: 36px;
    }

    .btn {
        flex: 1;
        padding: 16px 28px;
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
        width: 400px;
        height: 400px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #22d3ee 0%, #06b6d4 100%);
        color: #0f172a;
        box-shadow: 
            0 10px 30px rgba(34, 211, 238, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 
            0 15px 40px rgba(34, 211, 238, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .btn-secondary {
        background: rgba(71, 85, 105, 0.3);
        color: #cbd5e1;
        border: 2px solid rgba(71, 85, 105, 0.5);
    }

    .btn-secondary:hover {
        background: rgba(71, 85, 105, 0.5);
        border-color: rgba(71, 85, 105, 0.8);
        transform: translateY(-3px);
    }

    /* Floating particles effect */
    .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: rgba(34, 211, 238, 0.3);
        border-radius: 50%;
        animation: float 15s linear infinite;
    }

    @keyframes float {
        0%, 100% { 
            transform: translateY(0) translateX(0);
            opacity: 0;
        }
        10%, 90% {
            opacity: 1;
        }
        50% {
            transform: translateY(-500px) translateX(100px);
        }
    }

    @media (max-width: 576px) {
        .form-wrapper {
            border-radius: 24px;
        }

        .form-header,
        .form-body {
            padding-left: 28px;
            padding-right: 28px;
        }

        .form-title {
            font-size: 26px;
        }

        .button-group {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<div class="form-container">
    <!-- Floating particles -->
    <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
    <div class="particle" style="left: 30%; animation-delay: 3s;"></div>
    <div class="particle" style="left: 50%; animation-delay: 6s;"></div>
    <div class="particle" style="left: 70%; animation-delay: 9s;"></div>
    <div class="particle" style="left: 90%; animation-delay: 12s;"></div>

    <div class="form-wrapper">
        <div class="glow-effect"></div>

        <div class="form-header">
            <div class="icon-wrapper">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.7 6.3C15.1 5.9 15.7 5.9 16.1 6.3L17.7 7.9C18.1 8.3 18.1 8.9 17.7 9.3L9 18H6V15L14.7 6.3Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.5 7.5L16.5 11.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h2 class="form-title">Pemeliharaan Perangkat</h2>
            <p class="form-subtitle">Sistem Manajemen Maintenance IT</p>
        </div>

        <div class="form-body">
            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="alert alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            {{-- Alert error --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0" style="padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('request.pemeliharaan.store') }}">
                @csrf

                <!-- Tanggal Aduan -->
                <div class="form-group">
                    <label class="form-label required">Tanggal Aduan</label>
                    <div class="input-wrapper">
                        <input type="date" name="tanggal_aduan" class="form-control"
                               value="{{ old('tanggal_aduan') }}" required>
                    </div>
                </div>

                <!-- Kerusakan -->
                <div class="form-group">
                    <label class="form-label required">Kerusakan</label>
                    <div class="input-wrapper">
                        <input type="text" name="kerusakan" class="form-control"
                               placeholder="Masukkan jenis kerusakan"
                               value="{{ old('kerusakan') }}" required>
                    </div>
                </div>

                <!-- User Aduan -->
                <div class="form-group">
                    <label class="form-label required">User Aduan</label>
                    <div class="input-wrapper">
                        <input type="text" name="user_aduan" class="form-control"
                               placeholder="Nama pengadu / ruangan"
                               value="{{ old('user_aduan') }}" required>
                    </div>
                </div>

                <!-- Tanggal Penanganan -->
                <div class="form-group">
                    <label class="form-label">Tanggal Penanganan</label>
                    <div class="input-wrapper">
                        <input type="date" name="tanggal_penanganan" class="form-control"
                               value="{{ old('tanggal_penanganan') }}">
                    </div>
                </div>

                <!-- Nama Penanganan -->
                <div class="form-group">
                    <label class="form-label">Nama Penanganan</label>
                    <div class="input-wrapper">
                        <input type="text" name="nama_penanganan" class="form-control"
                               placeholder="Teknisi / petugas"
                               value="{{ old('nama_penanganan') }}">
                    </div>
                </div>

                <!-- Tindakan -->
                <div class="form-group">
                    <label class="form-label">Tindakan</label>
                    <div class="input-wrapper">
                        <textarea name="tindakan" class="form-control" rows="3"
                                  placeholder="Masukkan tindakan yang dilakukan">{{ old('tindakan') }}</textarea>
                    </div>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label class="form-label">Status Tindakan</label>
                    <div class="input-wrapper">
                        <select name="status" class="form-select">
                            <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>
                            <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>
                        </select>
                    </div>
                </div>

                <div class="button-group">
                    <a href="/" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection