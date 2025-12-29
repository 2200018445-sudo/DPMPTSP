@extends('layout.main')

@section('konten')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Orbitron:wght@700;800;900&display=swap');

    * {
        font-family: 'Rajdhani', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .dashboard-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: 
            linear-gradient(135deg, 
                #0a0e27 0%, 
                #1a1f3a 25%, 
                #2a1a4a 50%, 
                #1a1f3a 75%, 
                #0a0e27 100%
            );
        background-size: 400% 400%;
        animation: darkGradient 20s ease infinite;
        overflow: hidden;
    }

    @keyframes darkGradient {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    /* Dark Overlay with Image */
    .dark-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('Logo/MPP.jpg') }}');
        background-size: cover;
        background-position: center;
        opacity: 0.08;
        filter: grayscale(100%) contrast(1.2);
    }

    /* Tech Grid Pattern */
    .tech-grid {
        position: absolute;
        width: 100%;
        height: 100%;
        background-image: 
            linear-gradient(rgba(0, 255, 255, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: gridMove 30s linear infinite;
    }

    @keyframes gridMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    /* Cyber Orbs - Dark Theme */
    .orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.4;
        animation: floatOrb 25s infinite ease-in-out;
    }

    .orb-1 {
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, #00ffff 0%, transparent 70%);
        top: -300px;
        left: -300px;
        animation-delay: 0s;
    }

    .orb-2 {
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, #0099ff 0%, transparent 70%);
        bottom: -250px;
        right: -250px;
        animation-delay: 8s;
    }

    .orb-3 {
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, #00ccff 0%, transparent 70%);
        top: 50%;
        right: -200px;
        animation-delay: 15s;
    }

    @keyframes floatOrb {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(60px, -80px) scale(1.1); }
        66% { transform: translate(-40px, 100px) scale(0.9); }
    }

    /* Scanline Effect */
    .scanline {
        position: absolute;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(0, 255, 255, 0.5), transparent);
        animation: scan 3s linear infinite;
        pointer-events: none;
    }

    @keyframes scan {
        0% { top: 0%; }
        100% { top: 100%; }
    }

    /* Enhanced Glass Box - Masculine */
    .glass-box {
        backdrop-filter: blur(20px) saturate(150%);
        background: linear-gradient(135deg,
            rgba(10, 14, 39, 0.8) 0%,
            rgba(26, 31, 58, 0.7) 100%
        );
        padding: 40px 50px;
        border-radius: 24px;
        box-shadow: 
            0 8px 32px 0 rgba(0, 255, 255, 0.2),
            0 30px 90px rgba(0, 0, 0, 0.6),
            inset 0 1px 0 rgba(0, 255, 255, 0.3);
        border: 2px solid rgba(0, 255, 255, 0.3);
        position: relative;
        z-index: 10;
        max-width: 520px;
        width: 90%;
        animation: boxAppear 1.2s cubic-bezier(0.23, 1, 0.32, 1);
    }

    @keyframes boxAppear {
        0% {
            opacity: 0;
            transform: translateY(100px) scale(0.8);
            filter: blur(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
            filter: blur(0);
        }
    }

    /* Cyber Border Animation */
    .glass-box::before {
        content: '';
        position: absolute;
        inset: -2px;
        border-radius: 24px;
        padding: 2px;
        background: linear-gradient(45deg, 
            #00ffff, #0099ff, #00ccff, #0066ff, #00ffff
        );
        background-size: 400% 400%;
        animation: cyberBorder 6s linear infinite;
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        z-index: -1;
        opacity: 0.6;
    }

    @keyframes cyberBorder {
        0% { background-position: 0% 50%; }
        100% { background-position: 400% 50%; }
    }

    /* Top Accent Line - Cyber Style */
    .glass-box::after {
        content: '';
        position: absolute;
        top: -3px;
        left: 10%;
        width: 80%;
        height: 4px;
        background: linear-gradient(90deg,
            transparent,
            #00ffff,
            #00ccff,
            #00ffff,
            transparent
        );
        box-shadow: 
            0 0 30px #00ffff,
            0 0 60px #00ffff;
        animation: accentPulse 3s ease-in-out infinite;
    }

    @keyframes accentPulse {
        0%, 100% { opacity: 0.5; transform: scaleX(1); }
        50% { opacity: 1; transform: scaleX(1.05); }
    }

    /* Title - Bold & Clear */
    .dashboard-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 36px;
        font-weight: 900;
        color: #ffffff;
        text-transform: uppercase;
        margin-bottom: 10px;
        letter-spacing: 2px;
        text-shadow: 
            0 0 20px rgba(0, 255, 255, 0.8),
            0 0 40px rgba(0, 255, 255, 0.5),
            0 4px 20px rgba(0, 0, 0, 0.8);
        animation: titleGlow 3s ease-in-out infinite;
        filter: drop-shadow(0 0 10px #00ffff);
    }

    @keyframes titleGlow {
        0%, 100% { 
            text-shadow: 
                0 0 20px rgba(0, 255, 255, 0.8),
                0 0 40px rgba(0, 255, 255, 0.5),
                0 4px 20px rgba(0, 0, 0, 0.8);
        }
        50% { 
            text-shadow: 
                0 0 30px rgba(0, 255, 255, 1),
                0 0 60px rgba(0, 255, 255, 0.8),
                0 4px 20px rgba(0, 0, 0, 0.8);
        }
    }

    .dashboard-subtitle {
        font-size: 17px;
        color: #00ffff;
        margin-bottom: 35px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        text-shadow: 
            0 0 10px rgba(0, 255, 255, 0.8),
            0 2px 10px rgba(0, 0, 0, 0.8);
        animation: subtitleFade 1s ease 0.5s both;
    }

    @keyframes subtitleFade {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Menu Container */
    .menu-container {
        display: flex;
        flex-direction: column;
        gap: 14px;
        width: 100%;
        max-width: 420px;
        margin: 0 auto;
    }

    /* Cyber Tech Buttons */
    .menu-btn {
        width: 100%;
        font-family: 'Rajdhani', sans-serif;
        font-size: 16px;
        font-weight: 700;
        padding: 16px 32px;
        border-radius: 12px;
        border: 2px solid;
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        position: relative;
        overflow: hidden;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        text-transform: uppercase;
    }

    /* Button 1 - Electric Blue */
    .menu-btn:nth-child(1) {
        background: linear-gradient(135deg, rgba(0, 153, 255, 0.2) 0%, rgba(0, 102, 204, 0.2) 100%);
        border-color: #0099ff;
        box-shadow: 
            0 0 20px rgba(0, 153, 255, 0.4),
            inset 0 1px 0 rgba(0, 153, 255, 0.3);
    }

    .menu-btn:nth-child(1):hover {
        background: linear-gradient(135deg, rgba(0, 153, 255, 0.4) 0%, rgba(0, 102, 204, 0.4) 100%);
        border-color: #00ccff;
        box-shadow: 
            0 0 30px rgba(0, 153, 255, 0.8),
            0 0 60px rgba(0, 153, 255, 0.4),
            inset 0 0 20px rgba(0, 153, 255, 0.2);
        transform: translateY(-8px) scale(1.02);
    }

    /* Button 2 - Cyan Electric */
    .menu-btn:nth-child(2) {
        background: linear-gradient(135deg, rgba(0, 255, 255, 0.2) 0%, rgba(0, 204, 204, 0.2) 100%);
        border-color: #00ffff;
        box-shadow: 
            0 0 20px rgba(0, 255, 255, 0.4),
            inset 0 1px 0 rgba(0, 255, 255, 0.3);
    }

    .menu-btn:nth-child(2):hover {
        background: linear-gradient(135deg, rgba(0, 255, 255, 0.4) 0%, rgba(0, 204, 204, 0.4) 100%);
        border-color: #00ffff;
        box-shadow: 
            0 0 30px rgba(0, 255, 255, 0.8),
            0 0 60px rgba(0, 255, 255, 0.4),
            inset 0 0 20px rgba(0, 255, 255, 0.2);
        transform: translateY(-8px) scale(1.02);
    }

    /* Button 3 - Steel Blue */
    .menu-btn:nth-child(3) {
        background: linear-gradient(135deg, rgba(0, 119, 182, 0.2) 0%, rgba(0, 150, 255, 0.2) 100%);
        border-color: #0077b6;
        box-shadow: 
            0 0 20px rgba(0, 119, 182, 0.4),
            inset 0 1px 0 rgba(0, 119, 182, 0.3);
    }

    .menu-btn:nth-child(3):hover {
        background: linear-gradient(135deg, rgba(0, 119, 182, 0.4) 0%, rgba(0, 150, 255, 0.4) 100%);
        border-color: #0096ff;
        box-shadow: 
            0 0 30px rgba(0, 119, 182, 0.8),
            0 0 60px rgba(0, 119, 182, 0.4),
            inset 0 0 20px rgba(0, 119, 182, 0.2);
        transform: translateY(-8px) scale(1.02);
    }

    /* Scan Line Effect on Buttons */
    .menu-btn::before {
        content: '';
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg,
            transparent,
            rgba(255, 255, 255, 0.3),
            transparent
        );
        transition: top 0.6s ease;
    }

    .menu-btn:hover::before {
        top: 100%;
    }

    /* Glow Pulse Effect */
    .menu-btn::after {
        content: '';
        position: absolute;
        inset: -2px;
        border-radius: 12px;
        background: inherit;
        opacity: 0;
        filter: blur(10px);
        transition: opacity 0.3s ease;
    }

    .menu-btn:hover::after {
        opacity: 0.5;
        animation: glowPulse 1.5s ease-in-out infinite;
    }

    @keyframes glowPulse {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.6; }
    }

    .menu-btn:active {
        transform: translateY(-4px) scale(1);
    }

    /* Icon - Tech Style */
    .menu-icon {
        width: 30px;
        height: 30px;
        filter: drop-shadow(0 0 8px currentColor);
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: relative;
        z-index: 1;
    }

    .menu-btn:hover .menu-icon {
        transform: rotate(360deg) scale(1.3);
        filter: drop-shadow(0 0 20px currentColor);
    }

    /* Fade In Animations */
    .fade-in {
        animation: techFadeIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
        opacity: 0;
    }

    @keyframes techFadeIn {
        from {
            opacity: 0;
            transform: translateX(-80px) scale(0.9);
            filter: blur(10px);
        }
        to {
            opacity: 1;
            transform: translateX(0) scale(1);
            filter: blur(0);
        }
    }

    .menu-btn:nth-child(1) { animation-delay: 0.7s; }
    .menu-btn:nth-child(2) { animation-delay: 0.9s; }
    .menu-btn:nth-child(3) { animation-delay: 1.1s; }

    /* Responsive */
    @media (max-width: 768px) {
        .glass-box {
            padding: 50px 40px;
            max-width: 92%;
        }

        .dashboard-title {
            font-size: 38px;
            letter-spacing: 2px;
        }

        .dashboard-subtitle {
            font-size: 18px;
            margin-bottom: 40px;
        }

        .menu-btn {
            font-size: 15px;
            padding: 20px 32px;
        }

        .menu-icon {
            width: 26px;
            height: 26px;
        }
    }

    @media (max-width: 480px) {
        .glass-box {
            padding: 40px 30px;
            border-radius: 20px;
        }

        .dashboard-title {
            font-size: 32px;
            letter-spacing: 1px;
        }

        .dashboard-subtitle {
            font-size: 16px;
            letter-spacing: 2px;
        }

        .menu-btn {
            padding: 18px 28px;
            font-size: 14px;
            gap: 12px;
        }

        .menu-icon {
            width: 24px;
            height: 24px;
        }
    }
</style>

<div class="dashboard-container">

    <!-- Dark Overlay -->
    <div class="dark-overlay"></div>

    <!-- Tech Grid -->
    <div class="tech-grid"></div>

    <!-- Cyber Orbs -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <!-- Scanline -->
    <div class="scanline"></div>

    <!-- Glass Box -->
    <div class="glass-box text-center">
        
        <h2 class="dashboard-title">SISTEM PENDATAAN TIK</h2>
        <p class="dashboard-subtitle">DPMPTSP KABUPATEN BANTUL</p>

        <div class="menu-container">

            <a href="{{ route('perangkatutama') }}" class="menu-btn fade-in">
                <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 7H4C2.89543 7 2 7.89543 2 9V18C2 19.1046 2.89543 20 4 20H20C21.1046 20 22 19.1046 22 18V9C22 7.89543 21.1046 7 20 7Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7 7V5C7 4.46957 7.21071 3.96086 7.58579 3.58579C7.96086 3.21071 8.46957 3 9 3H15C15.5304 3 16.0391 3.21071 16.4142 3.58579C16.7893 3.96086 17 4.46957 17 5V7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                PERANGKAT UTAMA
            </a>

            <a href="{{ route('periferal.index') }}" class="menu-btn fade-in">
                <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 3H18C19.1046 3 20 3.89543 20 5V15C20 16.1046 19.1046 17 18 17H6C4.89543 17 4 16.1046 4 15V5C4 3.89543 4.89543 3 6 3Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 21H16" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 17V21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                PERIFERAL
            </a>

            <a href="{{ route('request.pemeliharaan') }}" class="menu-btn fade-in">
                <svg class="menu-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.7 6.3C15.1 5.9 15.7 5.9 16.1 6.3L17.7 7.9C18.1 8.3 18.1 8.9 17.7 9.3L9 18H6V15L14.7 6.3Z" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 21H21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                PEMELIHARAAN PERANGKAT
            </a>

        </div>

    </div>

</div>

@endsection