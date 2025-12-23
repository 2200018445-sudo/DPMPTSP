@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .dashboard-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('{{ asset('Logo/MPP.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        overflow: hidden;
    }

    .gradient-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            135deg,
            rgba(15, 23, 42, 0.85) 0%,
            rgba(30, 58, 138, 0.75) 50%,
            rgba(59, 130, 246, 0.65) 100%
        );
        top: 0;
        left: 0;
        backdrop-filter: blur(2px);
    }

    .glass-box {
        backdrop-filter: blur(24px) saturate(180%);
        background: rgba(255, 255, 255, 0.12);
        padding: 50px 60px;
        border-radius: 32px;
        box-shadow: 
            0 20px 60px rgba(0, 0, 0, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.18);
        margin: 0 !important;
        transform: translateX(40px);
        z-index: 5;
        position: relative;
        max-width: 480px;
        width: 90%;
    }

    .glass-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        height: 4px;
        background: linear-gradient(90deg, 
            transparent,
            rgba(59, 130, 246, 0.8),
            transparent
        );
        border-radius: 0 0 4px 4px;
    }

    .dashboard-title {
        font-size: 36px;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .dashboard-subtitle {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.75);
        margin-bottom: 40px;
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    .menu-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
        align-items: center;
        width: 100%;
        max-width: 360px;
        margin: auto;
    }

    .menu-btn {
        width: 100%;
        font-size: 16px;
        font-weight: 600;
        padding: 18px 32px;
        border-radius: 16px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        border: 2px solid rgba(255, 255, 255, 0.2);
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        position: relative;
        overflow: hidden;
        letter-spacing: 0.5px;
        box-shadow: 0 8px 24px rgba(59, 130, 246, 0.4);
    }

    .menu-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent,
            rgba(255, 255, 255, 0.2),
            transparent
        );
        transition: left 0.6s ease;
    }

    .menu-btn:hover::before {
        left: 100%;
    }

    .menu-btn:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(59, 130, 246, 0.5);
        border-color: rgba(255, 255, 255, 0.4);
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    }

    .menu-btn:active {
        transform: translateY(-2px);
    }

    .menu-icon {
        width: 24px;
        height: 24px;
        display: inline-block;
    }

    .fade-in {
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .menu-btn:nth-child(1) {
        animation-delay: 0.1s;
    }

    .menu-btn:nth-child(2) {
        animation-delay: 0.2s;
    }

    .menu-btn:nth-child(3) {
        animation-delay: 0.3s;
    }

    /* Decorative elements */
    .glass-box::after {
        content: '';
        position: absolute;
        bottom: -100px;
        right: -100px;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    @media (max-width: 768px) {
        .glass-box {
            padding: 40px 30px;
            transform: translateX(0);
            max-width: 90%;
        }

        .dashboard-title {
            font-size: 28px;
        }

        .dashboard-subtitle {
            font-size: 14px;
        }

        .menu-btn {
            font-size: 15px;
            padding: 16px 24px;
        }
    }

    @media (max-width: 480px) {
        .glass-box {
            padding: 30px 24px;
        }

        .dashboard-title {
            font-size: 24px;
        }

        .menu-container {
            max-width: 100%;
        }
    }
</style>

<div class="dashboard-container">

    <!-- Layer gelap tipis biar tulisan lebih jelas -->
    <div class="gradient-overlay"></div>

    <!-- BOX GLASS TRANSPARAN -->
    <div class="glass-box fade-in text-center">
        
        <h2 class="dashboard-title">Sistem Pendataan TIK</h2>
        <p class="dashboard-subtitle">DPMPTSP Kabupaten Bantul</p>

        <div class="menu-container">

            <a href="{{ route('perangkatutama') }}" class="menu-btn fade-in">
                <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 7H4C2.89543 7 2 7.89543 2 9V18C2 19.1046 2.89543 20 4 20H20C21.1046 20 22 19.1046 22 18V9C22 7.89543 21.1046 7 20 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7 7V5C7 4.46957 7.21071 3.96086 7.58579 3.58579C7.96086 3.21071 8.46957 3 9 3H15C15.5304 3 16.0391 3.21071 16.4142 3.58579C16.7893 3.96086 17 4.46957 17 5V7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                PERANGKAT UTAMA
            </a>

            <a href="{{ route('periferal.index') }}" class="menu-btn fade-in">
                <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 3H18C19.1046 3 20 3.89543 20 5V15C20 16.1046 19.1046 17 18 17H6C4.89543 17 4 16.1046 4 15V5C4 3.89543 4.89543 3 6 3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 21H16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 17V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                PERIFERAL
            </a>

            <a href="{{ route('request.pemeliharaan') }}" class="menu-btn fade-in">
                <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.7 6.3C15.1 5.9 15.7 5.9 16.1 6.3L17.7 7.9C18.1 8.3 18.1 8.9 17.7 9.3L9 18H6V15L14.7 6.3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 21H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                PEMELIHARAAN PERANGKAT
            </a>

        </div>

    </div>

</div>

@endsection