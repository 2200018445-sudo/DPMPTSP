<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    .modern-navbar {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%) !important;
        backdrop-filter: blur(12px);
        box-shadow: 0 2px 24px rgba(0, 0, 0, 0.06) !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 0;
        z-index: 1000;
        padding: 16px 0 !important;
    }

    .navbar-brand {
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover {
        transform: translateY(-2px);
    }

    .logo-img {
        width: 65px;
        height: 70px;
        margin-right: 16px;
        transition: all 0.3s ease;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
    }

    .logo-img:hover {
        transform: rotate(-5deg) scale(1.05);
    }

    .brand-text-container {
        display: flex;
        flex-direction: column;
        line-height: 1.3;
    }

    .brand-title {
        font-weight: 700;
        font-size: 15px;
        color: #0f172a;
        letter-spacing: 0.3px;
        margin-bottom: 2px;
    }

    .brand-subtitle {
        font-size: 12px;
        color: #64748b;
        font-weight: 500;
        letter-spacing: 0.2px;
    }

    .navbar-nav {
        gap: 8px;
    }

    .nav-link {
        color: #475569 !important;
        font-weight: 600;
        font-size: 15px;
        padding: 10px 20px !important;
        border-radius: 10px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        letter-spacing: 0.2px;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 8px;
        left: 50%;
        transform: translateX(-50%) scaleX(0);
        width: 60%;
        height: 2px;
        background: linear-gradient(90deg, #3b82f6, #2563eb);
        border-radius: 2px;
        transition: transform 0.3s ease;
    }

    .nav-link:hover {
        color: #3b82f6 !important;
        background: rgba(59, 130, 246, 0.08);
        transform: translateY(-1px);
    }

    .nav-link:hover::before {
        transform: translateX(-50%) scaleX(1);
    }

    .nav-link.active {
        color: #3b82f6 !important;
        background: rgba(59, 130, 246, 0.12);
        font-weight: 700;
    }

    .dropdown-toggle::after {
        transition: transform 0.3s ease;
        margin-left: 8px;
    }

    .dropdown-toggle:hover::after {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        border: 1px solid rgba(0, 0, 0, 0.06);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
        border-radius: 14px;
        padding: 8px;
        margin-top: 8px;
        background: #ffffff;
        backdrop-filter: blur(12px);
        animation: dropdownFadeIn 0.3s ease;
    }

    @keyframes dropdownFadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-item {
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        color: #475569;
        transition: all 0.2s ease;
        margin-bottom: 2px;
    }

    .dropdown-item:hover {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white !important;
        transform: translateX(4px);
    }

    .dropdown-item:active {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    }

    .navbar-toggler {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 8px 12px;
        transition: all 0.3s ease;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        border-color: #3b82f6;
    }

    .navbar-toggler:hover {
        background: rgba(59, 130, 246, 0.08);
        border-color: #3b82f6;
    }

    /* Mobile Responsive */
    @media (max-width: 991px) {
        .navbar-nav {
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #e2e8f0;
        }

        .nav-link {
            margin: 4px 0;
        }

        .dropdown-menu {
            border: none;
            box-shadow: none;
            padding-left: 16px;
        }
    }

    @media (max-width: 576px) {
        .brand-title {
            font-size: 13px;
        }

        .brand-subtitle {
            font-size: 11px;
        }

        .logo-img {
            width: 55px;
            height: 60px;
        }
    }

    /* Active page indicator */
    .nav-item.active .nav-link {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(37, 99, 235, 0.1));
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light modern-navbar">
  <div class="container-fluid px-4">

    <!-- LOGO + TEKS -->
    <a class="navbar-brand d-flex align-items-center" href="/">
      <img src="{{ asset('Logo/logodpmptsp.png') }}" alt="Logo DPMPTSP" 
           class="logo-img">

      <div class="brand-text-container">
        <span class="brand-title">PEMERINTAH KABUPATEN BANTUL</span>
        <span class="brand-subtitle">DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</span>
      </div>
    </a>

    <!-- BUTTON MOBILE -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- MENU KANAN -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto me-3">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Beranda</a>
        </li>

        <!-- DROPDOWN -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" 
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('perangkatutama') }}">Perangkat Utama</a></li>
            <li><a class="dropdown-item" href="{{ route('periferal.index') }}">Periferal</a></li>
            <li><a class="dropdown-item" href="{{ route('request.pemeliharaan') }}">Pemeliharaan Perangkat</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('riwayat') }}">Riwayat</a>
        </li>

      </ul>
      
    </div>

  </div>
</nav>