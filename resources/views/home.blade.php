<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Anggota | ARUM Digital Platform</title>
    
    <!-- Google Fonts & FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --linkedin-blue: #0a66c2;
            --linkedin-blue-hover: #004182;
            --warm-heading: #8f583b;
            --bg-light: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #475569;
            --border-color: #0000001a;
        }

        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
        body { background-color: #f8fafc; color: var(--text-dark); min-height: 100vh; position: relative; overflow-x: hidden; }

        /* --- ANIMATED BACKGROUND CANVAS & AURORA ORBS --- */
        #particle-canvas { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none; }
        .bg-aurora-wrapper { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none; overflow: hidden; }
        .aurora-orb { position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.22; animation: orbFloat 18s ease-in-out infinite alternate; }
        .orb-1 { width: 550px; height: 550px; background: radial-gradient(circle, #0a66c2 0%, rgba(10, 102, 194, 0) 70%); top: -15%; left: -10%; }
        .orb-2 { width: 600px; height: 600px; background: radial-gradient(circle, #38bdf8 0%, rgba(56, 189, 248, 0) 70%); bottom: -20%; right: -10%; animation-delay: -6s; }

        @keyframes orbFloat {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(80px, 40px) scale(1.1); }
            100% { transform: translate(-50px, 90px) scale(0.95); }
        }

        .main-content-layer { position: relative; z-index: 1; }

        /* --- TOP NAVBAR --- */
        .navbar-custom { background-color: rgba(255, 255, 255, 0.88); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(0, 0, 0, 0.08); padding: 12px 0; position: sticky; top: 0; z-index: 100; }
        .brand-logo { height: 38px; width: auto; border-radius: 6px; }
        .brand-text { font-weight: 800; font-size: 1.1rem; color: var(--linkedin-blue); }
        .user-profile-badge { display: flex; align-items: center; gap: 10px; padding: 6px 14px; border-radius: 20px; background: rgba(10, 102, 194, 0.06); border: 1px solid rgba(10, 102, 194, 0.15); }
        .avatar-circle { width: 36px; height: 36px; border-radius: 50%; background: var(--linkedin-blue); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.9rem; overflow: hidden; }
        .avatar-circle img { width: 100%; height: 100%; object-fit: cover; }

        /* --- DASHBOARD LAYOUT --- */
        .dashboard-container { padding: 30px 0 60px 0; }
        .profile-card { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(12px); border-radius: 16px; border: 1px solid var(--border-color); overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.03); margin-bottom: 24px; }
        .profile-banner { height: 80px; background: linear-gradient(135deg, #0a66c2 0%, #004182 100%); }
        .profile-info { padding: 0 20px 20px 20px; text-align: center; margin-top: -40px; }
        .avatar-main { width: 80px; height: 80px; border-radius: 50%; background: #ffffff; border: 4px solid #ffffff; color: var(--linkedin-blue); display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 800; margin: 0 auto 10px auto; box-shadow: 0 4px 12px rgba(0,0,0,0.12); overflow: hidden; }
        .avatar-main img { width: 100%; height: 100%; object-fit: cover; }
        .user-bio-text { font-size: 0.83rem; color: var(--text-muted); font-style: italic; margin: 8px 0 14px 0; line-height: 1.4; }
        .welcome-banner-card { background: linear-gradient(135deg, #0a66c2 0%, #004182 100%); color: #ffffff; border-radius: 16px; padding: 28px 32px; margin-bottom: 24px; box-shadow: 0 8px 20px rgba(10, 102, 194, 0.2); }
        
        .feature-card { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(12px); border: 1px solid var(--border-color); border-radius: 16px; padding: 24px; transition: all 0.25s ease; height: 100%; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 12px rgba(0,0,0,0.02); text-decoration: none; color: inherit; cursor: pointer; }
        .feature-card:hover { transform: translateY(-5px); border-color: var(--linkedin-blue); box-shadow: 0 12px 25px rgba(10, 102, 194, 0.12); color: inherit; }
        .feature-icon-box { width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; margin-bottom: 18px; }
        .icon-kas { background: rgba(16, 185, 129, 0.12); color: #059669; }
        .icon-absensi { background: rgba(10, 102, 194, 0.12); color: var(--linkedin-blue); }
        .icon-kelola-pengurus { background: rgba(245, 158, 11, 0.15); color: #d97706; }
        .icon-rekap-kas { background: rgba(139, 92, 246, 0.12); color: #7c3aed; }
        .icon-riwayat-absen { background: rgba(236, 72, 153, 0.12); color: #db2777; }
        .icon-dokumentasi { background: rgba(14, 165, 233, 0.12); color: #0284c7; }
        .icon-aspirasi { background: rgba(249, 115, 22, 0.12); color: #f97316; }
        .icon-donasi { background: rgba(217, 119, 6, 0.15); color: #d97706; }
        .icon-pengumuman-admin { background: rgba(13, 110, 253, 0.15); color: #0d6efd; }
        .icon-program-admin { background: rgba(20, 184, 166, 0.15); color: #0d9488; }
        
        .feature-title { font-weight: 700; font-size: 1.12rem; margin-bottom: 8px; color: var(--text-dark); }
        .feature-desc { font-size: 0.88rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 18px; }
        .feature-action-text { font-size: 0.85rem; font-weight: 700; color: var(--linkedin-blue); display: flex; align-items: center; gap: 6px; }
        .notice-card { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(12px); border-radius: 16px; border: 1px solid var(--border-color); padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.02); }

        /* --- STYLING MODAL & TABEL --- */
        .modal-header-banner { background: linear-gradient(135deg, #0a66c2 0%, #004182 100%); color: #ffffff; padding: 24px 28px; border-radius: 16px 16px 0 0; position: relative; }
        .modal-edit-avatar-box { width: 90px; height: 90px; border-radius: 50%; background: #ffffff; border: 4px solid #ffffff; box-shadow: 0 6px 16px rgba(0,0,0,0.15); margin: -45px auto 12px auto; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; color: var(--linkedin-blue); }
        .modal-edit-avatar-box img { width: 100%; height: 100%; object-fit: cover; }
        
        .camera-preview-box { width: 100%; height: 240px; background: #0f172a; border-radius: 12px; overflow: hidden; position: relative; display: flex; align-items: center; justify-content: center; }
        #webcamVideo, #snapshotCanvas { width: 100%; height: 100%; object-fit: cover; }
        .camera-placeholder { color: #94a3b8; font-size: 0.9rem; text-align: center; position: absolute; }

        .table-custom th { background-color: #f1f5f9; color: var(--text-dark); font-weight: 700; font-size: 0.85rem; }
        .table-custom td { vertical-align: middle; font-size: 0.88rem; }
        .member-table-avatar { width: 40px; height: 40px; border-radius: 50%; background: #e2e8f0; display: flex; align-items: center; justify-content: center; font-weight: 700; color: #64748b; overflow: hidden; }
        .member-table-avatar img { width: 100%; height: 100%; object-fit: cover; }

        /* --- DOKUMENTASI ALBUM CARD --- */
        .album-card { background: #ffffff; border: 1px solid var(--border-color); border-radius: 14px; overflow: hidden; transition: all 0.25s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.03); cursor: pointer; height: 100%; display: flex; flex-direction: column; justify-content: space-between; }
        .album-card:hover { transform: translateY(-4px); border-color: var(--linkedin-blue); box-shadow: 0 10px 20px rgba(10, 102, 194, 0.12); }
        .album-cover { height: 160px; width: 100%; background: #e2e8f0; object-fit: cover; }
        .gallery-photo-card { position: relative; border-radius: 12px; overflow: hidden; height: 180px; background: #0f172a; border: 1px solid var(--border-color); }
        .gallery-photo-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease; }
        .gallery-photo-card:hover img { transform: scale(1.05); }
        .photo-actions-overlay { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); padding: 10px; display: flex; justify-content: flex-end; gap: 6px; opacity: 0; transition: opacity 0.2s ease; }
        .gallery-photo-card:hover .photo-actions-overlay { opacity: 1; }

        #appToastContainer { position: fixed; bottom: 25px; right: 25px; z-index: 1055; }

        @media print {
            body * { visibility: hidden; }
            #printableKasSection, #printableKasSection *, #printableAbsenSection, #printableAbsenSection *, #printableAspirasiAdminSection, #printableAspirasiAdminSection *, #printableDonasiSection, #printableDonasiSection * { visibility: visible; }
            #printableKasSection, #printableAbsenSection, #printableAspirasiAdminSection, #printableDonasiSection { position: absolute; left: 0; top: 0; width: 100%; }
            .no-print { display: none !important; }
        }
    
/* ============================================================
   ARUM VISUAL REFRESH — TAMPILAN SAJA
   Tidak mengubah ID, form, data, tombol, fungsi, atau alur JS.
   ============================================================ */
:root {
    --arum-blue: #0a66c2;
    --arum-blue-dark: #004182;
    --arum-cyan: #38bdf8;
    --arum-purple: #7c3aed;
    --arum-green: #10b981;
    --arum-gold: #f59e0b;
    --glass: rgba(255,255,255,.78);
    --glass-strong: rgba(255,255,255,.91);
}

body {
    background:
        radial-gradient(circle at 8% 10%, rgba(10,102,194,.08), transparent 28%),
        radial-gradient(circle at 92% 78%, rgba(56,189,248,.08), transparent 30%),
        linear-gradient(135deg,#f8fbff 0%,#f5f8fc 45%,#eef7ff 100%) !important;
}

.bg-aurora-wrapper::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(10,102,194,.035) 1px, transparent 1px),
        linear-gradient(90deg, rgba(10,102,194,.035) 1px, transparent 1px);
    background-size: 42px 42px;
    mask-image: linear-gradient(to bottom, black, transparent 90%);
    animation: arumGridMove 24s linear infinite;
}

.bg-aurora-wrapper::after {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    left: 45%;
    top: 35%;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(124,58,237,.08), transparent 68%);
    filter: blur(35px);
    animation: arumPulse 10s ease-in-out infinite alternate;
}

@keyframes arumGridMove {
    from { transform: translate3d(0,0,0); }
    to { transform: translate3d(42px,42px,0); }
}

@keyframes arumPulse {
    0% { transform: scale(.8) translate(0,0); opacity:.45; }
    100% { transform: scale(1.25) translate(35px,-25px); opacity:.9; }
}

.navbar-custom {
    background: rgba(255,255,255,.72) !important;
    border-bottom: 1px solid rgba(10,102,194,.12) !important;
    box-shadow: 0 8px 30px rgba(15,23,42,.06);
}

.brand-logo { box-shadow: 0 5px 15px rgba(10,102,194,.16); transition: transform .3s ease, box-shadow .3s ease; }
.brand-logo:hover { transform: rotate(-2deg) scale(1.05); box-shadow: 0 9px 24px rgba(10,102,194,.25); }

.profile-card,
.feature-card,
.notice-card,
.album-card {
    background: var(--glass) !important;
    border-color: rgba(255,255,255,.72) !important;
    box-shadow: 0 12px 35px rgba(15,23,42,.07), inset 0 1px 0 rgba(255,255,255,.75) !important;
}

.profile-card,
.feature-card,
.notice-card,
.album-card,
.welcome-banner-card {
    position: relative;
    isolation: isolate;
}

.profile-card::before,
.feature-card::before,
.notice-card::before,
.album-card::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    padding: 1px;
    background: linear-gradient(120deg, rgba(10,102,194,.25), rgba(56,189,248,.04), rgba(124,58,237,.16));
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    pointer-events: none;
    opacity: .65;
}

.feature-card {
    overflow: hidden;
    transition: transform .35s cubic-bezier(.2,.8,.2,1), box-shadow .35s ease, border-color .35s ease !important;
}

.feature-card::after {
    content: "";
    position: absolute;
    width: 130px;
    height: 130px;
    right: -55px;
    top: -55px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(56,189,248,.13), transparent 68%);
    transition: transform .45s ease;
    z-index: -1;
}

.feature-card:hover {
    transform: translateY(-8px) scale(1.012) !important;
    box-shadow: 0 22px 45px rgba(10,102,194,.14), 0 4px 12px rgba(15,23,42,.05) !important;
}

.feature-card:hover::after { transform: scale(2.3); }

.feature-icon-box {
    box-shadow: 0 8px 18px rgba(15,23,42,.08);
    transition: transform .35s ease, box-shadow .35s ease;
}
.feature-card:hover .feature-icon-box { transform: translateY(-3px) rotate(-4deg) scale(1.07); box-shadow: 0 12px 24px rgba(10,102,194,.14); }

.welcome-banner-card {
    overflow: hidden;
    background: linear-gradient(135deg,#0758aa 0%,#0a66c2 45%,#004182 100%) !important;
    box-shadow: 0 20px 45px rgba(10,102,194,.22) !important;
}
.welcome-banner-card::before {
    content: "";
    position: absolute;
    width: 320px;
    height: 320px;
    right: -100px;
    top: -170px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.18);
    box-shadow: 0 0 0 35px rgba(255,255,255,.035), 0 0 0 70px rgba(255,255,255,.025);
    animation: arumRing 12s linear infinite;
}
.welcome-banner-card::after {
    content: "";
    position: absolute;
    left: -10%;
    bottom: -85px;
    width: 120%;
    height: 120px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,.08), transparent);
    transform: rotate(-4deg);
    animation: arumShine 7s ease-in-out infinite;
}
@keyframes arumRing { to { transform: rotate(360deg); } }
@keyframes arumShine { 0%,25% { transform: translateX(-60%) rotate(-4deg); } 65%,100% { transform: translateX(60%) rotate(-4deg); } }

.modal-content {
    border: 1px solid rgba(255,255,255,.75) !important;
    border-radius: 20px !important;
    box-shadow: 0 28px 80px rgba(15,23,42,.2) !important;
    overflow: hidden;
}

.modal-header-banner {
    background: linear-gradient(135deg,#0758aa,#0a66c2 50%,#004182) !important;
}

.btn-primary {
    border: 0 !important;
    background: linear-gradient(135deg,#0a66c2,#0758aa) !important;
    box-shadow: 0 7px 18px rgba(10,102,194,.2);
    transition: transform .25s ease, box-shadow .25s ease;
}
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 11px 24px rgba(10,102,194,.3); }

.form-control, .form-select {
    border-color: rgba(100,116,139,.22) !important;
    box-shadow: 0 3px 10px rgba(15,23,42,.025);
    transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease;
}
.form-control:focus, .form-select:focus {
    border-color: rgba(10,102,194,.55) !important;
    box-shadow: 0 0 0 4px rgba(10,102,194,.09) !important;
}

.table-custom,
.table-transparansi {
    border-radius: 14px;
    overflow: hidden;
}
.table-custom thead th,
.table-transparansi th {
    background: linear-gradient(135deg,#eef6ff,#f5f9ff) !important;
}
.table-custom tbody tr,
.table-transparansi tbody tr { transition: background-color .2s ease, transform .2s ease; }
.table-custom tbody tr:hover,
.table-transparansi tbody tr:hover { background: rgba(10,102,194,.035) !important; }

#appToastContainer { filter: drop-shadow(0 10px 22px rgba(15,23,42,.12)); }

@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after { animation-duration: .001ms !important; animation-iteration-count: 1 !important; scroll-behavior: auto !important; transition-duration: .001ms !important; }
}

@media print {
    .bg-aurora-wrapper, #particle-canvas { display:none !important; }
    .feature-card::before, .profile-card::before, .notice-card::before, .album-card::before { display:none !important; }
}

    </style>
</head>
<body>

    <canvas id="particle-canvas"></canvas>
    <div class="bg-aurora-wrapper">
        <div class="aurora-orb orb-1"></div>
        <div class="aurora-orb orb-2"></div>
    </div>

    <div class="main-content-layer">
        <!-- TOP NAVBAR -->
        <nav class="navbar navbar-custom">
            <div class="container d-flex align-items-center justify-content-between">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/home') }}">
                    <img src="{{ asset('images/logo-arum.png') }}" alt="Logo ARUM" class="brand-logo">
                    <span class="brand-text ms-1">ARUM DIGITAL PLATFORM</span>
                </a>
                <div class="d-flex align-items-center gap-3">
                    <div class="user-profile-badge d-none d-sm-flex">
                        <div class="avatar-circle" id="topNavAvatarBox"><i class="fa-solid fa-user"></i></div>
                        <div>
                            <div class="fw-bold fs-7 text-dark" id="topNavUserName">{{ Auth::user()->name ?? 'Anggota ARUM' }}</div>
                            <div class="text-muted" style="font-size: 0.72rem;" id="topNavRtText">RT 01 / RW 01 (KPK)</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-bold">
                            <i class="fa-solid fa-right-from-bracket me-1"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="dashboard-container">
            <div class="container">
                <div class="row g-4">
                    <!-- SIDEBAR PROFILE & KARTU PENGUMUMAN DINAMIS -->
                    <div class="col-lg-3">
                        <div class="profile-card">
                            <div class="profile-banner"></div>
                            <div class="profile-info">
                                <div class="avatar-main" id="sidebarAvatarBox"><i class="fa-solid fa-user"></i></div>
                                <h5 class="fw-bold text-dark mb-0" id="sidebarUserName">{{ Auth::user()->name ?? 'Anggota ARUM' }}</h5>
                                <p class="text-muted fs-7 mb-1" id="sidebarEmail">{{ Auth::user()->email ?? 'email@arum.com' }}</p>
                                <span class="badge bg-primary rounded-pill px-3 py-1 mb-2 fw-semibold fs-8" id="sidebarJabatan">Anggota Aktif</span>
                                <p class="user-bio-text" id="displayBio">"Semangat berkarya dan menjalin silaturahmi untuk pemuda Barepan."</p>
                                
                                <div class="text-start border-top pt-3 mb-3 fs-7">
                                    <div class="mb-2 text-muted"><i class="fa-solid fa-venus-mars text-primary me-2"></i><span id="sidebarGender">Laki-laki</span></div>
                                    <div class="mb-2 text-muted"><i class="fa-solid fa-cake-candles text-warning me-2"></i><span id="sidebarUmur">18 Tahun</span></div>
                                    <div class="text-muted"><i class="fa-solid fa-location-dot text-danger me-2"></i><span id="sidebarRt">RT 01 / RW 01</span></div>
                                </div>

                                <button class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold w-100 mb-2" data-bs-toggle="modal" data-bs-target="#editProfileModal" onclick="populateProfileModal()">
                                    <i class="fa-solid fa-user-pen me-1"></i> Edit Profil & Biodata
                                </button>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-semibold w-100">
                                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout Akun
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- KARTU PENGUMUMAN UTAMA -->
                        <div class="notice-card" id="sidebarNoticeCardContainer">
                            <h6 class="fw-bold text-dark mb-3 fs-7 text-uppercase d-flex align-items-center justify-content-between">
                                <span><i class="fa-solid fa-bell me-2 text-primary animate-bounce"></i> Pengumuman Penting</span>
                                <span class="badge bg-danger rounded-pill fs-8" id="badgeTotalPengumuman">0</span>
                            </h6>
                            <div id="sidebarDynamicAnnouncementsList">
                                <p class="fs-8 text-muted fst-italic mb-0">Memuat pengumuman...</p>
                            </div>
                        </div>
                    </div>

                    <!-- MAIN CONTENT -->
                    <div class="col-lg-9">
                        <div class="welcome-banner-card">
                            <h2 class="fw-extrabold mb-1">Halo, <span id="bannerUserName">{{ Auth::user()->name ?? 'Anggota ARUM' }}</span>! 👋</h2>
                            <p class="mb-0 opacity-90 fs-6" id="welcomeSubtitleText">Selamat datang di portal anggota Karang Taruna ARUM. Akses layanan internal, cek kas, absensi digital, dan transparansi aduan di sini.</p>
                        </div>

                        <div class="row g-3" id="mainFeatureCardsContainer">
                            <!-- PEMBAYARAN KAS -->
                            <div class="col-md-6 col-lg-4" id="cardMenuKas">
                                <div class="feature-card" onclick="openKasModal()">
                                    <div>
                                        <div class="feature-icon-box icon-kas"><i class="fa-solid fa-wallet"></i></div>
                                        <h3 class="feature-title">Pembayaran Kas</h3>
                                        <p class="feature-desc">Setor iuran kas, pilih tanggal/bulan iuran, nominal min. Rp 10.000, & TTD elektronik.</p>
                                    </div>
                                    <div class="feature-action-text"><span>Buka Portal Kas</span> <i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>

                            <!-- ABSENSI DIGITAL -->
                            <div class="col-md-6 col-lg-4" id="cardMenuAbsen">
                                <div class="feature-card" onclick="openAbsensiModal()">
                                    <div>
                                        <div class="feature-icon-box icon-absensi"><i class="fa-solid fa-clipboard-user"></i></div>
                                        <h3 class="feature-title">Absensi Digital</h3>
                                        <p class="feature-desc">Absen kehadiran rapat/kegiatan pemuda menggunakan kamera, deteksi lokasi, & keterangan.</p>
                                    </div>
                                    <div class="feature-action-text"><span>Absen Sekarang</span> <i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>

                            <!-- KOTAK ASPIRASI & PENGADUAN WARGA -->
                            <div class="col-md-6 col-lg-4" id="cardMenuAspirasi">
                                <div class="feature-card" onclick="openAspirasiAdminModal()">
                                    <div>
                                        <div class="feature-icon-box icon-aspirasi"><i class="fa-solid fa-comments"></i></div>
                                        <h3 class="feature-title">Aspirasi & Pengaduan</h3>
                                        <p class="feature-desc">Kelola aduan warga, perbarui status (Menunggu/Diproses/Selesai), & tulis keterangan tindak lanjut.</p>
                                    </div>
                                    <div class="feature-action-text"><span>Kelola Aduan</span> <i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>

                            <!-- PAPAN DONASI & WAKAF PRODUKTIF (KHUSUS ALUMNI / SENIOR) -->
                            <div class="col-md-6 col-lg-4 d-none" id="cardMenuDonasiAlumni">
                                <div class="feature-card" onclick="openDonasiAlumniModal()">
                                    <div>
                                        <div class="feature-icon-box icon-donasi"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                                        <h3 class="feature-title">Donasi & Wakaf Senior</h3>
                                        <p class="feature-desc">Papan donasi sukarela via QRIS untuk fasilitas pemuda, beasiswa, & pembangunan desa.</p>
                                    </div>
                                    <div class="feature-action-text"><span>Buka Papan Donasi</span> <i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>

                            <!-- MENU KELOLA DATA ANGGOTA (KHUSUS PENGURUS INTI) -->
                            <div class="col-md-6 col-lg-4 d-none" id="pengurusManagementCard">
                                <div class="feature-card" onclick="openPengurusManagementModal()">
                                    <div>
                                        <div class="feature-icon-box icon-kelola-pengurus"><i class="fa-solid fa-users-gear"></i></div>
                                        <h3 class="feature-title">Kelola Data Anggota</h3>
                                        <p class="feature-desc">Halaman khusus Pengurus Inti untuk menambah, mengedit, dan menghapus data anggota.</p>
                                    </div>
                                    <div class="feature-action-text">
                                        <span class="badge bg-warning text-dark px-2 py-1 rounded-pill me-1 fs-8"><i class="fa-solid fa-shield-halved"></i> Khusus Pengurus</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- MENU INFORMASI PENGUMUMAN (KHUSUS PENGURUS INTI) -->
                            <div class="col-md-6 col-lg-4 d-none" id="pengumumanAdminCard">
                                <div class="feature-card" onclick="openPengumumanAdminModal()">
                                    <div>
                                        <div class="feature-icon-box icon-pengumuman-admin"><i class="fa-solid fa-bullhorn"></i></div>
                                        <h3 class="feature-title">Kelola Pengumuman</h3>
                                        <p class="feature-desc">Tambah, edit, dan hapus informasi pengumuman penting (rapat, lomba, perkumpulan) untuk anggota.</p>
                                    </div>
                                    <div class="feature-action-text">
                                        <span class="badge bg-primary text-white px-2 py-1 rounded-pill me-1 fs-8"><i class="fa-solid fa-shield-halved"></i> Fitur Pengurus</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- MENU KELOLA PROGRAM KEPEMUDAAN (KHUSUS PENGURUS INTI) -->
                            <div class="col-md-6 col-lg-4 d-none" id="kelolaProgramCard">
                                <div class="feature-card" onclick="openKelolaProgramModal()">
                                    <div>
                                        <div class="feature-icon-box icon-program-admin"><i class="fa-solid fa-list-check"></i></div>
                                        <h3 class="feature-title">Kelola Program Kepemudaan</h3>
                                        <p class="feature-desc">Tambah, edit, atau hapus kategori program dan jadwal kegiatan kepemudaan organisasi.</p>
                                    </div>
                                    <div class="feature-action-text">
                                        <span class="badge text-white px-2 py-1 rounded-pill me-1 fs-8" style="background:#0d9488;"><i class="fa-solid fa-shield-halved"></i> Khusus Pengurus</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- REKAP KAS -->
                            <div class="col-md-6 col-lg-4 d-none" id="rekapKasCard">
                                <div class="feature-card" onclick="openRekapKasModal()">
                                    <div>
                                        <div class="feature-icon-box icon-rekap-kas"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                                        <h3 class="feature-title">Rekap Kas</h3>
                                        <p class="feature-desc">Arsip rekapitulasi riwayat iuran kas bulanan, tanggal pembayaran, TTD, edit/hapus, & cetak.</p>
                                    </div>
                                    <div class="feature-action-text">
                                        <span class="badge bg-primary text-white px-2 py-1 rounded-pill me-1 fs-8"><i class="fa-solid fa-print"></i> Khusus Pengurus</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- TRANSPARANSI KEUANGAN (KHUSUS PENGURUS INTI) -->
                            <div class="col-md-6 col-lg-4 d-none" id="transparansiKeuanganCard">
                                <div class="feature-card" onclick="openTransparansiKeuanganModal()">
                                    <div>
                                        <div class="feature-icon-box icon-rekap-kas"><i class="fa-solid fa-chart-line"></i></div>
                                        <h3 class="feature-title">Transparansi Keuangan</h3>
                                        <p class="feature-desc">Pemasukan kas dihitung otomatis dari Riwayat Kas, pengeluaran dapat diinput manual, serta tersedia edit, hapus, rekap harian, dan cetak laporan.</p>
                                    </div>
                                    <div class="feature-action-text"><span class="badge bg-success text-white px-2 py-1 rounded-pill me-1 fs-8"><i class="fa-solid fa-shield-halved"></i> Khusus Pengurus</span><i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>

                            <!-- RIWAYAT ABSENSI -->
                            <div class="col-md-6 col-lg-4 d-none" id="riwayatAbsensiCard">
                                <div class="feature-card" onclick="openRiwayatAbsensiModal()">
                                    <div>
                                        <div class="feature-icon-box icon-riwayat-absen"><i class="fa-solid fa-clock-rotate-left"></i></div>
                                        <h3 class="feature-title">Riwayat Absensi</h3>
                                        <p class="feature-desc">Laporan dan rekapitulasi daftar kehadiran anggota pada seluruh agenda kegiatan.</p>
                                    </div>
                                    <div class="feature-action-text">
                                        <span class="badge bg-secondary text-white px-2 py-1 rounded-pill me-1 fs-8"><i class="fa-solid fa-calendar-check"></i> Khusus Pengurus</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- REKAP DONASI ALUMNI -->
                            <div class="col-md-6 col-lg-4 d-none" id="rekapDonasiCard">
                                <div class="feature-card" onclick="openRekapDonasiModal()">
                                    <div>
                                        <div class="feature-icon-box" style="background: rgba(217, 119, 6, 0.12); color: #d97706;"><i class="fa-solid fa-receipt"></i></div>
                                        <h3 class="feature-title">Rekap Donasi Senior</h3>
                                        <p class="feature-desc">Daftar transparansi donasi wakaf sukarela dari para alumni & senior.</p>
                                    </div>
                                    <div class="feature-action-text">
                                        <span class="badge bg-warning text-dark px-2 py-1 rounded-pill me-1 fs-8"><i class="fa-solid fa-print"></i> Laporan Donasi</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- DOKUMENTASI DIGITAL -->
                            <div class="col-md-6 col-lg-4">
                                <div class="feature-card" onclick="openDokumentasiModal()">
                                    <div>
                                        <div class="feature-icon-box icon-dokumentasi"><i class="fa-solid fa-images"></i></div>
                                        <h3 class="feature-title">Dokumentasi</h3>
                                        <p class="feature-desc">Arsip foto liputan kegiatan, acara kebudayaan, dan momen kebersamaan desa.</p>
                                    </div>
                                    <div class="feature-action-text"><span>Buka Galeri</span> <i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="appToastContainer"></div>

    <!-- MODAL KELOLA PROGRAM KEPEMUDAAN (KHUSUS PENGURUS INTI) -->
    <div class="modal fade" id="kelolaProgramModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-list-check me-2"></i> Kelola Program & Jadwal Kepemudaan</h5>
                        <p class="fs-7 text-white opacity-75 mb-0">Tambah, ubah kategori, atau atur ulang jadwal program organisasi karang taruna</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                        <div class="fw-bold fs-6 text-dark">
                            Total Program Aktif: <span class="badge rounded-pill px-3 py-2 ms-1 text-white" id="totalProgramAdminCount" style="background:#0d9488;">0 Program</span>
                        </div>
                        <button class="btn btn-warning text-white rounded-pill px-4 fw-bold" onclick="openFormAddProgram()">
                            <i class="fa-solid fa-plus-circle me-1"></i> Tambah Program Baru
                        </button>
                    </div>

                    <!-- Form Tambah/Edit Program -->
                    <div class="card border-0 bg-light rounded-4 p-3 mb-4 d-none" id="formProgramEditor">
                        <h6 class="fw-bold mb-3" id="formProgramEditorTitle" style="color:#0d9488;"><i class="fa-solid fa-pen-to-square me-2"></i> Form Program Kepemudaan</h6>
                        <form id="manageProgramForm">
                            <input type="hidden" id="editProgramId" value="">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold fs-7 mb-1">Judul Program / Kegiatan</label>
                                    <input type="text" id="progTitle" class="form-control rounded-3" placeholder="Contoh: Olahraga & Seni Kebudayaan" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold fs-7 mb-1">Kategori / Badge</label>
                                    <input type="text" id="progBadge" class="form-control rounded-3" placeholder="Contoh: Minat & Bakat Pemuda" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold fs-7 mb-1">Icon FontAwesome</label>
                                    <select id="progIcon" class="form-select rounded-3">
                                        <option value="fa-solid fa-volleyball">Volahraga / Bola (fa-volleyball)</option>
                                        <option value="fa-solid fa-book-open">Pendidikan & Literasi (fa-book-open)</option>
                                        <option value="fa-solid fa-hands-holding-child">Sosial & Kemasyarakatan (fa-hands-holding-child)</option>
                                        <option value="fa-solid fa-laptop-code">Teknologi & Digital (fa-laptop-code)</option>
                                        <option value="fa-solid fa-guitar">Seni & Budaya (fa-guitar)</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold fs-7 mb-1">Jadwal Pelaksanaan</label>
                                    <input type="text" id="progSchedule" class="form-control rounded-3" placeholder="Contoh: Selasa & Jumat sore di lapangan desa." required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold fs-7 mb-1">Deskripsi Program</label>
                                    <textarea id="progDesc" class="form-control rounded-3" rows="2" placeholder="Tuliskan keterangan detail program..." required></textarea>
                                </div>
                                <div class="col-12 d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-secondary rounded-pill px-3 fw-semibold" onclick="closeProgramEditor()">Batal</button>
                                    <button type="button" class="btn rounded-pill px-4 fw-bold text-white" style="background:#0d9488;" onclick="saveProgramFromAdmin()">
                                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Program
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive rounded-3 border">
                        <table class="table table-hover align-middle mb-0 table-custom">
                            <thead>
                                <tr>
                                    <th class="ps-3" style="width: 50px;">No</th>
                                    <th>Judul & Kategori</th>
                                    <th>Deskripsi Program</th>
                                    <th>Jadwal Pelaksanaan</th>
                                    <th class="text-center" style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pengurusProgramTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL KELOLA INFORMASI PENGUMUMAN (KHUSUS PENGURUS INTI) -->
    <div class="modal fade" id="pengumumanAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-bullhorn me-2"></i> Manajemen Informasi Pengumuman Organisasi</h5>
                        <p class="fs-7 text-white opacity-75 mb-0">Buat, edit, dan atur tenggat waktu pengumuman yang otomatis tersiar ke anggota aktif</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                        <div class="fw-bold fs-6 text-dark">
                            Total Pengumuman Aktif: <span class="badge bg-primary rounded-pill px-3 py-2 ms-1" id="totalPengumumanAdminCount">0 Pengumuman</span>
                        </div>
                        <button class="btn btn-warning text-white rounded-pill px-4 fw-bold" onclick="openFormAddPengumuman()">
                            <i class="fa-solid fa-plus-circle me-1"></i> Buat Pengumuman Baru
                        </button>
                    </div>

                    <div class="card border-0 bg-light rounded-4 p-3 mb-4 d-none" id="formPengumumanEditor">
                        <h6 class="fw-bold text-primary mb-3" id="formPengumumanEditorTitle"><i class="fa-solid fa-pen-to-square me-2"></i> Form Pengumuman</h6>
                        <form id="managePengumumanForm">
                            <input type="hidden" id="editPengumumanId" value="">
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold fs-7 mb-1">Judul Pengumuman</label>
                                    <input type="text" id="pTitle" class="form-control rounded-3" placeholder="Contoh: Rapat Pleno Bulanan / Pengumuman Lomba 17-an" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold fs-7 mb-1">Tenggat Waktu (Deadline Berakhir)</label>
                                    <input type="date" id="pDeadline" class="form-control rounded-3" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold fs-7 mb-1">Isi Pesan / Keterangan Pengumuman</label>
                                    <textarea id="pContent" class="form-control rounded-3" rows="3" placeholder="Tuliskan detail pengumuman, lokasi, waktu, dan informasi penting lainnya..." required></textarea>
                                </div>
                                <div class="col-12 d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-secondary rounded-pill px-3 fw-semibold" onclick="closePengumumanEditor()">Batal</button>
                                    <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold" onclick="savePengumumanFromAdmin()">
                                        <i class="fa-solid fa-floppy-disk me-1"></i> Publikasikan Pengumuman
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive rounded-3 border">
                        <table class="table table-hover align-middle mb-0 table-custom">
                            <thead>
                                <tr>
                                    <th class="ps-3" style="width: 50px;">No</th>
                                    <th>Judul & Isi Pengumuman</th>
                                    <th style="width: 150px;">Tanggal Dibuat</th>
                                    <th style="width: 150px;">Tenggat Waktu</th>
                                    <th class="text-center" style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pengurusPengumumanTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PAPAN DONASI & WAKAF QRIS -->
    <div class="modal fade" id="donasiAlumniModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner text-center">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-hand-holding-dollar me-2"></i> Papan Donasi & Wakaf Produktif Senior</h5>
                    <p class="fs-7 text-white opacity-75 mb-0">Dukungan sukarela untuk pembangunan fasilitas pemuda & kemajuan desa</p>
                </div>
                
                <div class="modal-body p-4">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-5 text-center">
                            <div class="p-3 bg-light border rounded-4 shadow-sm">
                                <h6 class="fw-bold text-dark mb-2 fs-7"><i class="fa-solid fa-qrcode text-primary me-1"></i> Scan QRIS Karang Taruna ARUM</h6>
                                <img src="{{ asset('images/qris-arum.png') }}" alt="QRIS ARUM" class="img-fluid rounded-3 border mb-2" style="max-height: 220px;" onerror="this.onerror=null; this.src='https://via.placeholder.com/220x220?text=QRIS+ARUM';">
                                <p class="text-muted fs-8 mb-0">Scan menggunakan M-Banking atau E-Wallet (GoPay, OVO, Dana, QRIS)</p>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <form id="formDonasiAlumni">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold fs-7 mb-1">Nama Donatur / Senior</label>
                                    <input type="text" id="donasiNama" class="form-control rounded-3" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold fs-7 mb-1">Pilihan Program Donasi / Wakaf</label>
                                    <select id="donasiProgram" class="form-select rounded-3" required>
                                        <option value="Pembangunan Fasilitas Pemuda / Balai Pertemuan">Pembangunan Fasilitas Pemuda / Balai Pertemuan</option>
                                        <option value="Beasiswa Anak Yatim & Warga Sekitar">Beasiswa Anak Yatim & Warga Sekitar</option>
                                        <option value="Pengadaan Alat Olahraga & Seni">Pengadaan Alat Olahraga & Seni</option>
                                        <option value="Kas Umum Purna Bakti & Sosial">Kas Umum Purna Bakti & Sosial</option>
                                        <option value="Bantuan Sosial & Kesejahteraan Warga">Bantuan Sosial & Kesejahteraan Warga</option>
                                        <option value="Pengembangan IT & Digitalisasi Desa">Pengembangan IT & Digitalisasi Desa</option>
                                        <option value="Lainnya ">Lainnya </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold fs-7 mb-1">Nominal Donasi (Rp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold text-success">Rp</span>
                                        <input type="number" id="donasiNominal" class="form-control rounded-end-3" placeholder="50000" min="10000" step="5000" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold fs-7 mb-1">Pesan / Doa / Catatan </label>
                                    <textarea id="donasiPesan" class="form-control rounded-3" rows="2" placeholder="Tuliskan pesan penyemangat untuk pengurus dan pemuda aktif..."></textarea>
                                </div>
                                <button type="button" class="btn btn-success rounded-pill fw-bold w-100 py-2 shadow-sm" onclick="submitDonasiAlumni()">
                                    <i class="fa-solid fa-circle-check me-1"></i> Konfirmasi Transfer QRIS Selesai
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL REKAP & CETAK LAPORAN DONASI -->
    <div class="modal fade" id="rekapDonasiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" id="printableDonasiSection">
                <div class="modal-header-banner d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-receipt me-2"></i> Rekapitulasi Donasi & Wakaf Produktif Senior</h5>
                        <p class="fs-7 text-white opacity-75 mb-0">Daftar transparansi kontribusi materiil sukarela dari para alumni & senior</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-light text-primary btn-sm rounded-pill px-3 fw-bold no-print" onclick="window.print()">
                            <i class="fa-solid fa-print me-1"></i> Cetak Laporan
                        </button>
                        <button type="button" class="btn-close btn-close-white no-print" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold text-dark m-0"><i class="fa-solid fa-table-list me-2 text-primary"></i> Tabel Transparansi Donasi Masuk</h6>
                        <span class="badge bg-success px-3 py-2 rounded-pill fs-7" id="totalDonasiCollected">Total Donasi: Rp 0</span>
                    </div>

                    <div class="table-responsive rounded-3 border">
                        <table class="table table-hover align-middle mb-0 table-custom">
                            <thead>
                                <tr>
                                    <th class="ps-3" style="width: 45px;">No</th>
                                    <th>Tanggal & Nama Donatur</th>
                                    <th>Program Pilihan</th>
                                    <th>Nominal (Rp)</th>
                                    <th>Pesan / Doa Senior</th>
                                    <th class="text-center no-print" style="width: 80px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="donasiHistoryTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3 no-print">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PENGELOLAAN ASPIRASI & PENGADUAN WARGA -->
    <div class="modal fade" id="aspirasiAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" id="printableAspirasiAdminSection">
                <div class="modal-header-banner d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-comments me-2"></i> Manajemen Aspirasi & Aduan Warga</h5>
                        <p class="fs-7 text-white opacity-75 mb-0">Tinjau laporan warga, perbarui status penanganan, dan berikan keterangan tanggapan</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-light text-primary btn-sm rounded-pill px-3 fw-bold no-print" onclick="window.print()">
                            <i class="fa-solid fa-print me-1"></i> Cetak Laporan
                        </button>
                        <button type="button" class="btn-close btn-close-white no-print" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold text-dark m-0"><i class="fa-solid fa-clipboard-list me-2 text-primary"></i> Daftar Transparansi Pengaduan Masuk</h6>
                        <span class="badge bg-primary px-3 py-2 rounded-pill fs-7" id="totalAspirasiAdminBadge">Total: 0 Laporan</span>
                    </div>

                    <div class="table-responsive rounded-3 border">
                        <table class="table table-hover align-middle mb-0 table-custom">
                            <thead>
                                <tr>
                                    <th class="ps-3" style="width: 45px;">No</th>
                                    <th>Tanggal & Pelapor</th>
                                    <th>Kategori & Wilayah</th>
                                    <th>Isi Aspirasi / Aduan</th>
                                    <th>Status Penanganan</th>
                                    <th>Keterangan / Tindak Lanjut</th>
                                    <th class="text-center no-print" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="aspirasiAdminTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3 no-print">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT STATUS & Tanggapan Aspirasi -->
    <div class="modal fade" id="editAspirasiStatusModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner text-center py-3">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h6 class="fw-bold mb-0 text-white"><i class="fa-solid fa-pen-to-square me-2"></i> Perbarui Status & Keterangan Aduan</h6>
                </div>
                <div class="modal-body p-4">
                    <form id="editAspirasiForm">
                        <input type="hidden" id="editAspId" value="">
                        <div class="mb-3">
                            <label class="form-label fw-semibold fs-7 mb-1">Status Penanganan</label>
                            <select id="editAspStatus" class="form-select rounded-3" required>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold fs-7 mb-1">Keterangan / Tindak Lanjut Pengurus</label>
                            <textarea id="editAspKeterangan" class="form-control rounded-3" rows="3" placeholder="Tuliskan progres atau keterangan pelaksanaan..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light border-top-0 p-3">
                    <button type="button" class="btn btn-light rounded-pill px-3 fw-semibold" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold" onclick="saveAspirasiStatusUpdate()">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DOKUMENTASI UTAMA -->
    <div class="modal fade" id="dokumentasiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-images me-2"></i> Galeri Dokumentasi Kegiatan ARUM</h5>
                        <p class="fs-7 text-white opacity-75 mb-0">Arsip album liputan foto & kebersamaan pemuda desa</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-warning text-white btn-sm rounded-pill px-3 fw-bold" onclick="openAddCategoryModal()">
                            <i class="fa-solid fa-folder-plus me-1"></i> Tambah Kategori / Album
                        </button>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <div class="row g-4" id="albumGridContainer"></div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DETAIL ISI FOTO ALBUM -->
    <div class="modal fade" id="albumDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-0 text-white" id="albumDetailTitle"><i class="fa-solid fa-folder-open me-2"></i> Detail Album</h5>
                        <p class="fs-7 text-white opacity-75 mb-0" id="albumDetailDesc">Koleksi foto kegiatan</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <input type="file" id="inputNewPhoto" accept="image/*" class="d-none" onchange="uploadNewPhotoToAlbum(event)">
                        <button type="button" class="btn btn-light text-primary btn-sm rounded-pill px-3 fw-bold" onclick="document.getElementById('inputNewPhoto').click()">
                            <i class="fa-solid fa-cloud-arrow-up me-1"></i> Tambah Foto
                        </button>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <div class="row g-3" id="photoGridContainer"></div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3 justify-content-between">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold" onclick="backToAlbumList()">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar Album
                    </button>
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH / EDIT KATEGORI ALBUM -->
    <div class="modal fade" id="categoryEditorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner text-center py-3">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h6 class="fw-bold mb-0 text-white" id="categoryModalTitle"><i class="fa-solid fa-folder-plus me-2"></i> Form Kategori Album</h6>
                </div>
                <div class="modal-body p-4">
                    <form id="categoryForm">
                        <input type="hidden" id="editCategoryId" value="">
                        <div class="mb-3">
                            <label class="form-label fw-semibold fs-7 mb-1">Judul Kategori / Kegiatan</label>
                            <input type="text" id="catTitle" class="form-control rounded-3" placeholder="Contoh: Kegiatan Memperingati Hari Kemerdekaan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold fs-7 mb-1">Deskripsi Singkat</label>
                            <textarea id="catDesc" class="form-control rounded-3" rows="2" placeholder="Penjelasan singkat..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold fs-7 mb-1">Foto Sampul Kategori</label>
                            <input type="file" id="catCoverInput" accept="image/*" class="form-control rounded-3">
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light border-top-0 p-3">
                    <button type="button" class="btn btn-light rounded-pill px-3 fw-semibold" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold" onclick="saveCategoryAlbum()">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Kategori
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL ABSENSI DIGITAL -->
    <div class="modal fade" id="absensiModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner text-center">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" onclick="stopWebcam()"></button>
                    <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-clipboard-user me-2"></i> Portal Absensi Digital Karang Taruna</h5>
                    <p class="fs-7 text-white opacity-75 mb-0">Verifikasi kehadiran menggunakan kamera perangkat & deteksi lokasi</p>
                </div>
                
                <div class="modal-body p-4 pt-3">
                    <div id="absenSuccessAlert" class="alert alert-success d-none align-items-center gap-2 rounded-3 shadow-sm mb-3" role="alert">
                        <i class="fa-solid fa-circle-check fs-4"></i>
                        <div>
                            <strong>Absensi Berhasil Tercatat!</strong> Data kehadiran & foto snapshot Anda telah tersimpan otomatis ke sistem.
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold fs-7 mb-1">Kamera Verifikasi Wajah</label>
                            <div class="camera-preview-box">
                                <div class="camera-placeholder" id="camPlaceholder">
                                    <i class="fa-solid fa-camera-rotate fs-2 mb-2 d-block"></i> Kamera Aktif
                                </div>
                                <video id="webcamVideo" autoplay playsinline></video>
                                <canvas id="snapshotCanvas" class="d-none"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex flex-column justify-content-between">
                            <div>
                                <label class="form-label fw-semibold fs-7 mb-1">Nama Anggota</label>
                                <input type="text" id="absenNama" class="form-control rounded-3 mb-2" readonly>

                                <label class="form-label fw-semibold fs-7 mb-1">Keterangan Kehadiran</label>
                                <select id="absenKeterangan" class="form-select rounded-3 mb-2">
                                    <option value="Hadir Tepat Waktu">Hadir Tepat Waktu</option>
                                    <option value="Izin ">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                </select>

                                <label class="form-label fw-semibold fs-7 mb-1">Lokasi Terdeteksi </label>
                                <div class="input-group mb-2">
                                    <input type="text" id="absenLokasi" class="form-control rounded-start-3 bg-light fs-8" value="Mendeteksi lokasi asli Anda..." readonly>
                                    <button class="btn btn-outline-primary btn-sm rounded-end-3" type="button" onclick="detectRealGPSLocation()"><i class="fa-solid fa-location-crosshairs"></i></button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary rounded-pill fw-bold w-100 mt-2 py-2 shadow-sm" onclick="submitAbsensi()">
                                <i class="fa-solid fa-camera me-1"></i> Ambil Absen Sekarang
                            </button>
                        </div>
                    </div>

                    <div class="border-top pt-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold text-dark m-0 fs-7"><i class="fa-solid fa-calendar-days text-primary me-2"></i> Riwayat Absensi Bulan Ini</h6>
                            <span class="badge bg-primary text-white fw-bold px-3 py-1.5 fs-8 rounded-pill shadow-sm" id="currentMonthYearBadge">Oktober 2026</span>
                        </div>
                        <div class="table-responsive rounded-3 border" style="max-height: 220px; overflow-y: auto;">
                            <table class="table table-sm table-hover align-middle mb-0 table-custom">
                                <thead class="sticky-top">
                                    <tr>
                                        <th class="ps-3" style="width: 70px;">Foto</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Lokasi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody id="monthlyAbsenWidgetTable"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal" onclick="stopWebcam()">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PEMBAYARAN KAS -->
    <div class="modal fade" id="kasPaymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner text-center">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-wallet me-2"></i> Form Pembayaran Iuran Kas Karang Taruna</h5>
                    <p class="fs-7 text-white opacity-75 mb-0">Pilih tanggal/bulan iuran, minimal nominal Rp 10.000, & Tanda Tangan Elektronik</p>
                </div>
                
                <div class="modal-body p-4 pt-3">
                    <form id="kasPaymentForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold fs-7 mb-1">Nama Lengkap</label>
                                <input type="text" id="kasNama" class="form-control rounded-3" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold fs-7 mb-1">Wilayah RT / RW</label>
                                <select id="kasRt" class="form-select rounded-3" required>
                                    <option value="RT 01 / RW 01">RT 01 / RW 01 </option>
                                    <option value="RT 02 / RW 01">RT 02 / RW 01 </option>
                                    <option value="RT 03 / RW 02">RT 03 / RW 02 </option>
                                    <option value="RT 04 / RW 02">RT 04 / RW 02 </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold fs-7 mb-1">Tanggal & Bulan Iuran</label>
                                <input type="date" id="kasTanggalIuran" class="form-control rounded-3" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold fs-7 mb-1">Nominal Pembayaran (Min. Rp 10.000)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light fw-bold text-success">Rp</span>
                                    <input type="number" id="kasNominal" class="form-control rounded-end-3" placeholder="10000" min="10000" step="1000" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label class="form-label fw-semibold fs-7 mb-0">Tanda Tangan Elektronik</label>
                                    <button type="button" class="btn btn-sm btn-outline-danger py-0 px-2 fs-8 rounded-pill" onclick="clearSignatureCanvas()">
                                        <i class="fa-solid fa-rotate-right me-1"></i> Ulangi TTD
                                    </button>
                                </div>
                                <div class="signature-pad-container" style="border: 1px dashed #cbd5e1; border-radius: 8px; background: #fff;">
                                    <canvas id="signatureCanvas" style="width: 100%; height: 150px; display: block;"></canvas>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3 px-4">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-semibold" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success rounded-pill px-4 fw-bold" onclick="submitKasPayment()">
                        <i class="fa-solid fa-paper-plane me-1"></i> Kirim Pembayaran Kas
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL REKAP KAS -->
    <div class="modal fade" id="rekapKasModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" id="printableKasSection">
                <div class="modal-header-banner d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-file-invoice-dollar me-2"></i> Rekapitulasi Data Kas Organisasi</h5>
                        <p class="fs-7 text-white opacity-75 mb-0">Laporan resmi riwayat setoran iuran kas seluruh anggota Karang Taruna ARUM</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-light text-primary btn-sm rounded-pill px-3 fw-bold no-print" onclick="window.print()">
                            <i class="fa-solid fa-print me-1"></i> Cetak Dokumen
                        </button>
                        <button type="button" class="btn-close btn-close-white no-print" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold text-dark m-0"><i class="fa-solid fa-table-list me-2 text-primary"></i> Tabel Rekap Pembayaran Kas</h6>
                        <span class="badge bg-success px-3 py-2 rounded-pill fs-7" id="totalKasCollected">Total Terkumpul: Rp 0</span>
                    </div>

                    <div class="table-responsive rounded-3 border">
                        <table class="table table-hover align-middle mb-0 table-custom">
                            <thead>
                                <tr>
                                    <th class="ps-3" style="width: 45px;">No</th>
                                    <th>Nama Anggota</th>
                                    <th>Wilayah RT/RW</th>
                                    <th>Tgl/Bulan Iuran</th>
                                    <th>Nominal (Rp)</th>
                                    <th>Waktu Transaksi</th>
                                    <th class="text-center" style="width: 100px;">Tanda Tangan</th>
                                    <th class="text-center no-print" style="width: 110px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="kasHistoryTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3 no-print">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT TRANSAKSI KAS -->
    <div class="modal fade" id="editKasModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner text-center py-3">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h6 class="fw-bold mb-0 text-white"><i class="fa-solid fa-pen-to-square me-2"></i> Edit Data Transaksi Kas</h6>
                </div>
                <div class="modal-body p-4">
                    <form id="editKasForm">
                        <input type="hidden" id="editKasIndex" value="-1">
                        <div class="mb-3">
                            <label class="form-label fw-semibold fs-7 mb-1">Nama Anggota</label>
                            <input type="text" id="editKasNama" class="form-control rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold fs-7 mb-1">Wilayah RT / RW</label>
                            <select id="editKasRt" class="form-select rounded-3" required>
                                <option value="RT 01 / RW 01">RT 01 / RW 01 </option>
                                <option value="RT 02 / RW 01">RT 02 / RW 01 </option>
                                <option value="RT 03 / RW 02">RT 03 / RW 02 </option>
                                <option value="RT 04 / RW 02">RT 04 / RW 02 </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold fs-7 mb-1">Tanggal / Bulan Iuran</label>
                            <input type="text" id="editKasTanggalIuran" class="form-control rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold fs-7 mb-1">Nominal Pembayaran (Min. Rp 10.000)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light fw-bold text-success">Rp</span>
                                <input type="number" id="editKasNominal" class="form-control rounded-end-3" min="10000" step="1000" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light border-top-0 p-3">
                    <button type="button" class="btn btn-light rounded-pill px-3 fw-semibold" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold" onclick="saveEditedKasTransaction()">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL TRANSPARANSI KEUANGAN -->
    <div class="modal fade" id="transparansiKeuanganModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" id="printableFinanceSection">
                <div class="modal-header-banner d-flex align-items-center justify-content-between">
                    <div><h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-chart-line me-2"></i> Transparansi Keuangan Karang Taruna</h5><p class="fs-7 text-white opacity-75 mb-0">Kas dan donasi alumni/senior masuk otomatis. Pemasukan lain dan pengeluaran dapat dicatat manual oleh Pengurus Inti.</p></div>
                    <div class="d-flex align-items-center gap-2 no-print"><button type="button" class="btn btn-light text-primary btn-sm rounded-pill px-3 fw-bold" onclick="printFinanceReport()"><i class="fa-solid fa-print me-1"></i> Cetak Laporan</button><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button></div>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3 mb-4">
                        <div class="col-md-3"><div class="p-3 rounded-4 border bg-success bg-opacity-10 h-100"><div class="text-muted fs-8 fw-semibold">TOTAL PEMASUKAN</div><div class="fs-4 fw-extrabold text-success mt-1" id="financeTotalIncome">Rp 0</div><small class="text-muted">Kas + donasi otomatis + input manual</small></div></div>
                        <div class="col-md-3"><div class="p-3 rounded-4 border bg-danger bg-opacity-10 h-100"><div class="text-muted fs-8 fw-semibold">TOTAL PENGELUARAN</div><div class="fs-4 fw-extrabold text-danger mt-1" id="financeTotalExpense">Rp 0</div><small class="text-muted">Input manual Pengurus</small></div></div>
                        <div class="col-md-3"><div class="p-3 rounded-4 border bg-primary bg-opacity-10 h-100"><div class="text-muted fs-8 fw-semibold">SALDO BERJALAN</div><div class="fs-4 fw-extrabold text-primary mt-1" id="financeCurrentBalance">Rp 0</div><small class="text-muted">Pemasukan - Pengeluaran</small></div></div>
                        <div class="col-md-3"><div class="p-3 rounded-4 border bg-light h-100"><div class="text-muted fs-8 fw-semibold">FILTER TANGGAL</div><input type="date" id="financeDateFilter" class="form-control form-control-sm mt-2" onchange="renderFinanceTable()"><button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mt-2 w-100" onclick="clearFinanceDateFilter()">Semua Tanggal</button></div></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3"><div><h6 class="fw-bold text-dark m-0"><i class="fa-solid fa-calendar-days me-2 text-primary"></i> Rekap Keuangan</h6><p class="text-muted fs-8 mb-0 mt-1">Kas dan donasi alumni/senior masuk otomatis. Pemasukan lainnya bisa ditambahkan manual.</p></div><div class="d-flex gap-2 no-print"><button type="button" class="btn btn-success rounded-pill px-3 fw-bold" onclick="openFinanceIncomeModal()"><i class="fa-solid fa-plus me-1"></i> Tambah Pemasukan</button><button type="button" class="btn btn-danger rounded-pill px-3 fw-bold" onclick="openFinanceExpenseModal()"><i class="fa-solid fa-minus me-1"></i> Tambah Pengeluaran</button></div></div>
                    <div class="table-responsive rounded-3 border mb-4"><table class="table table-hover align-middle mb-0 table-custom"><thead><tr><th class="ps-3">Tanggal</th><th>Pemasukan Kas</th><th>Pengeluaran</th><th>Saldo Hari Itu</th><th>Saldo Berjalan</th></tr></thead><tbody id="financeDailyTableBody"></tbody></table></div>
                    <h6 class="fw-bold text-dark m-0 mb-3"><i class="fa-solid fa-circle-plus me-2 text-success"></i> Pemasukan Manual</h6>
                    <div class="table-responsive rounded-3 border mb-4"><table class="table table-hover align-middle mb-0 table-custom"><thead><tr><th class="ps-3">Tanggal</th><th>Keterangan</th><th>Kategori</th><th>Nominal</th><th>Catatan</th><th class="text-center no-print">Aksi</th></tr></thead><tbody id="financeIncomeTableBody"></tbody></table></div>
                    <h6 class="fw-bold text-dark m-0 mb-3"><i class="fa-solid fa-receipt me-2 text-danger"></i> Pengeluaran Manual</h6>
                    <div class="table-responsive rounded-3 border"><table class="table table-hover align-middle mb-0 table-custom"><thead><tr><th class="ps-3">Tanggal</th><th>Keterangan</th><th>Kategori</th><th>Nominal</th><th>Catatan</th><th class="text-center no-print">Aksi</th></tr></thead><tbody id="financeExpenseTableBody"></tbody></table></div>
                </div>
                <div class="modal-footer bg-light border-top-0 p-3 no-print"><button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button></div>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH/EDIT PEMASUKAN KEUANGAN -->
    <div class="modal fade" id="financeIncomeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"><div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header-banner text-center py-3"><button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button><h6 class="fw-bold mb-0 text-white" id="financeIncomeModalTitle"><i class="fa-solid fa-circle-plus me-2"></i> Tambah Pemasukan</h6></div>
            <div class="modal-body p-4"><form id="financeIncomeForm"><input type="hidden" id="financeIncomeIndex" value="-1">
                <div class="mb-3"><label class="form-label fw-semibold fs-7 mb-1">Tanggal</label><input type="date" id="financeIncomeDate" class="form-control rounded-3" required></div>
                <div class="mb-3"><label class="form-label fw-semibold fs-7 mb-1">Keterangan Pemasukan</label><input type="text" id="financeIncomeDescription" class="form-control rounded-3" placeholder="Contoh: Bantuan kegiatan dari warga" required></div>
                <div class="mb-3"><label class="form-label fw-semibold fs-7 mb-1">Kategori</label><select id="financeIncomeCategory" class="form-select rounded-3" required><option value="Bantuan">Bantuan</option><option value="Sponsor">Sponsor</option><option value="Kegiatan">Kegiatan</option><option value="Penjualan">Penjualan</option><option value="Lainnya">Lainnya</option></select></div>
                <div class="mb-3"><label class="form-label fw-semibold fs-7 mb-1">Nominal</label><div class="input-group"><span class="input-group-text bg-light fw-bold text-success">Rp</span><input type="number" id="financeIncomeAmount" class="form-control rounded-end-3" min="1" step="1000" required></div></div>
                <div><label class="form-label fw-semibold fs-7 mb-1">Catatan </label><textarea id="financeIncomeNote" class="form-control rounded-3" rows="2" placeholder="Catatan tambahan"></textarea></div>
            </form></div>
            <div class="modal-footer bg-light border-top-0 p-3"><button type="button" class="btn btn-light rounded-pill px-3 fw-semibold" data-bs-dismiss="modal">Batal</button><button type="button" class="btn btn-success rounded-pill px-4 fw-bold" onclick="saveFinanceIncome()"><i class="fa-solid fa-floppy-disk me-1"></i> Simpan Pemasukan</button></div>
        </div></div>
    </div>

    <!-- MODAL TAMBAH/EDIT PENGELUARAN KEUANGAN -->
    <div class="modal fade" id="financeExpenseModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"><div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header-banner text-center py-3"><button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button><h6 class="fw-bold mb-0 text-white" id="financeExpenseModalTitle"><i class="fa-solid fa-money-bill-transfer me-2"></i> Tambah Pengeluaran</h6></div>
            <div class="modal-body p-4"><form id="financeExpenseForm"><input type="hidden" id="financeExpenseIndex" value="-1">
                <div class="mb-3"><label class="form-label fw-semibold fs-7 mb-1">Tanggal</label><input type="date" id="financeExpenseDate" class="form-control rounded-3" required></div>
                <div class="mb-3"><label class="form-label fw-semibold fs-7 mb-1">Keterangan Pengeluaran</label><input type="text" id="financeExpenseDescription" class="form-control rounded-3" placeholder="Contoh: Konsumsi rapat" required></div>
                <div class="mb-3"><label class="form-label fw-semibold fs-7 mb-1">Kategori</label><select id="financeExpenseCategory" class="form-select rounded-3" required><option value="Konsumsi">Konsumsi</option><option value="Perlengkapan">Perlengkapan</option><option value="Kegiatan">Kegiatan</option><option value="Transportasi">Transportasi</option><option value="Administrasi">Administrasi</option><option value="Lainnya">Lainnya</option></select></div>
                <div class="mb-3"><label class="form-label fw-semibold fs-7 mb-1">Nominal</label><div class="input-group"><span class="input-group-text bg-light fw-bold text-danger">Rp</span><input type="number" id="financeExpenseAmount" class="form-control rounded-end-3" min="1" step="1000" required></div></div>
                <div><label class="form-label fw-semibold fs-7 mb-1">Catatan </label><textarea id="financeExpenseNote" class="form-control rounded-3" rows="2" placeholder="Catatan tambahan"></textarea></div>
            </form></div>
            <div class="modal-footer bg-light border-top-0 p-3"><button type="button" class="btn btn-light rounded-pill px-3 fw-semibold" data-bs-dismiss="modal">Batal</button><button type="button" class="btn btn-danger rounded-pill px-4 fw-bold" onclick="saveFinanceExpense()"><i class="fa-solid fa-floppy-disk me-1"></i> Simpan Pengeluaran</button></div>
        </div></div>
    </div>

    <!-- MODAL RIWAYAT ABSENSI -->
    <div class="modal fade" id="riwayatAbsensiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" id="printableAbsenSection">
                <div class="modal-header-banner d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-clock-rotate-left me-2"></i> Rekapitulasi Riwayat Absensi Digital</h5>
                        <p class="fs-7 text-white opacity-75 mb-0">Laporan resmi kehadiran pemuda dalam rapat, musyawarah, dan kegiatan lapangan</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-light text-primary btn-sm rounded-pill px-3 fw-bold no-print" onclick="window.print()">
                            <i class="fa-solid fa-print me-1"></i> Cetak Dokumen
                        </button>
                        <button type="button" class="btn-close btn-close-white no-print" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
                        <h6 class="fw-bold text-dark m-0"><i class="fa-solid fa-table-list me-2 text-primary"></i> Tabel Keseluruhan Riwayat Absensi</h6>
                        <div class="d-flex align-items-center gap-2 no-print">
                            <label class="fw-bold fs-7 text-muted mb-0"><i class="fa-solid fa-filter text-primary me-1"></i> Filter Periode:</label>
                            <select id="filterAbsenMonthYear" class="form-select form-select-sm rounded-pill px-3" style="width: auto;" onchange="renderPermanentAbsenTable()"></select>
                            <span class="badge bg-success px-3 py-2 rounded-pill fs-7 ms-2" id="totalAbsenCountBadge">Total Kehadiran: 0</span>
                        </div>
                    </div>

                    <div class="table-responsive rounded-3 border">
                        <table class="table table-hover align-middle mb-0 table-custom">
                            <thead>
                                <tr>
                                    <th class="ps-3" style="width: 50px;">No</th>
                                    <th>Nama Anggota</th>
                                    <th>Wilayah RT/RW</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Foto</th>
                                    <th>Lokasi</th>
                                    <th>Keterangan</th>
                                    <th class="text-center no-print" style="width: 80px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="permanentAbsenTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3 no-print">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL ONBOARDING PENGISIAN BIODATA AWAL -->
    <div class="modal fade" id="onboardingBioModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner text-center">
                    <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-id-card me-2"></i> Lengkapi Biodata Akun Anda</h5>
                    <p class="fs-7 text-white opacity-75 mb-0">Silakan isi data diri Anda sebelum masuk ke Portal Utama Karang Taruna ARUM</p>
                </div>
                
                <div class="modal-body p-4 pt-3">
                    <form id="onboardingForm">
                        <div class="text-center mb-3">
                            <div class="modal-edit-avatar-box" id="onboardAvatarPreview">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <label for="inputOnboardPhoto" class="btn btn-sm btn-primary rounded-pill px-3 fw-bold">
                                <i class="fa-solid fa-camera me-1"></i> Unggah Foto Profil 
                            </label>
                            <input type="file" id="inputOnboardPhoto" accept="image/*" class="d-none" onchange="previewOnboardPhoto(event)">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold fs-7 mb-1">Nama Lengkap</label>
                                <input type="text" id="onboardName" class="form-control rounded-3" value="{{ Auth::user()->name ?? '' }}" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold fs-7 mb-1">Jenis Kelamin</label>
                                <select id="onboardGender" class="form-select rounded-3" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold fs-7 mb-1">Umur (Tahun)</label>
                                <input type="number" id="onboardUmur" class="form-control rounded-3" placeholder="18" min="12" max="80" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold fs-7 mb-1">Wilayah RT / RW</label>
                                <select id="onboardRt" class="form-select rounded-3" required>
                                    <option value="RT 01 / RW 01">RT 01 / RW 01 </option>
                                    <option value="RT 02 / RW 01">RT 02 / RW 01 </option>
                                    <option value="RT 03 / RW 02">RT 03 / RW 02 </option>
                                    <option value="RT 04 / RW 02">RT 04 / RW 02 </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold fs-7 mb-1">Jabatan / Peran di Organisasi</label>
                                <select id="onboardJabatan" class="form-select rounded-3" required>
                                    <option value="Anggota Aktif">Anggota Aktif</option>
                                    <option value="Ketua Karang Taruna">Ketua Karang Taruna</option>
                                    <option value="Wakil Ketua">Wakil Ketua</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Seksi Konsumsi">Seksi Konsumsi</option>
                                    <option value="Seksi Humas">Seksi Humas</option>
                                    <option value="Senior / Alumni Pemuda">Senior / Alumni Pemuda</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold fs-7 mb-1">Bio / Moto Hidup</label>
                                <textarea id="onboardBio" class="form-control rounded-3" rows="2">Semangat berkarya dan menjalin silaturahmi untuk pemuda Barepan.</textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3 px-4">
                    <button type="button" class="btn btn-warning text-white rounded-pill px-5 fw-bold w-100" onclick="submitOnboardingBio()">
                        <i class="fa-solid fa-circle-check me-1"></i> Simpan & Masuk ke Dashboard
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT PROFIL USER -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner text-center">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-user-gear me-2"></i> Edit Profil & Biodata Anggota</h5>
                    <p class="fs-7 text-white opacity-75 mb-0">Perbarui informasi diri dan foto profil akun Anda</p>
                </div>
                
                <div class="modal-body p-4 pt-2">
                    <form id="profileForm">
                        <div class="text-center mb-4">
                            <div class="modal-edit-avatar-box" id="modalAvatarPreview">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="d-flex justify-content-center gap-2 align-items-center">
                                <label for="inputProfilePhoto" class="btn btn-sm btn-primary rounded-pill px-3 fw-bold">
                                    <i class="fa-solid fa-camera me-1"></i> Unggah Foto Baru
                                </label>
                                <input type="file" id="inputProfilePhoto" accept="image/*" class="d-none" onchange="previewUserPhoto(event)">
                                <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-semibold" onclick="removeUserPhoto()">
                                    <i class="fa-solid fa-trash me-1"></i> Hapus Foto
                                </button>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold fs-7 mb-1">Nama Lengkap</label>
                                <input type="text" id="inputEditName" class="form-control rounded-3" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold fs-7 mb-1">Email</label>
                                <input type="email" id="inputEditEmail" class="form-control rounded-3" required readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold fs-7 mb-1">Jenis Kelamin</label>
                                <select id="inputEditGender" class="form-select rounded-3" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold fs-7 mb-1">Umur</label>
                                <input type="number" id="inputEditUmur" class="form-control rounded-3" required min="12" max="80">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold fs-7 mb-1">Wilayah RT / RW</label>
                                <select id="inputEditRt" class="form-select rounded-3" required>
                                    <option value="RT 01 / RW 01">RT 01 / RW 01 </option>
                                    <option value="RT 02 / RW 01">RT 02 / RW 01 </option>
                                    <option value="RT 03 / RW 02">RT 03 / RW 02 </option>
                                    <option value="RT 04 / RW 02">RT 04 / RW 02 </option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold fs-7 mb-1">Jabatan / Peran</label>
                                <select id="inputEditJabatan" class="form-select rounded-3" required onchange="handleJabatanChange(this.value)">
                                    <option value="Anggota Aktif">Anggota Aktif</option>
                                    <option value="Ketua Karang Taruna">Ketua Karang Taruna</option>
                                    <option value="Wakil Ketua">Wakil Ketua</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Seksi Konsumsi">Seksi Konsumsi</option>
                                    <option value="Seksi Humas">Seksi Humas</option>
                                    <option value="Senior / Alumni Pemuda">Senior / Alumni Pemuda</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold fs-7 mb-1">Bio / Moto Hidup</label>
                                <textarea id="inputEditBio" class="form-control rounded-3" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3 px-4">
                    <button type="button" class="btn btn-light rounded-pill px-4 fw-semibold" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold" onclick="saveProfileChanges()">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL MANAJEMEN DATABASE ANGGOTA (KHUSUS PENGURUS INTI) -->
    <div class="modal fade" id="pengurusManagementModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header-banner d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-users-gear me-2"></i> Manajemen Database Anggota ARUM</h5>
                        <p class="fs-7 text-white opacity-75 mb-0">Portal Khusus Pengurus Inti — Tambah, Edit, dan Hapus Data Pemuda</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                        <div class="fw-bold fs-6 text-dark">
                            Total Terdaftar: <span class="badge bg-primary rounded-pill px-3 py-2 ms-1" id="totalMembersCount">0 Anggota</span>
                        </div>
                        <button class="btn btn-warning text-white rounded-pill px-4 fw-bold" onclick="openFormAddMember()">
                            <i class="fa-solid fa-user-plus me-1"></i> Tambah Anggota Baru
                        </button>
                    </div>

                    <div class="card border-0 bg-light rounded-4 p-3 mb-4 d-none" id="formMemberEditor">
                        <h6 class="fw-bold text-primary mb-3" id="formEditorTitle"><i class="fa-solid fa-pen-to-square me-2"></i> Form Data Anggota</h6>
                        <form id="manageMemberForm">
                            <input type="hidden" id="editMemberIndex" value="-1">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold fs-7 mb-1">Nama Lengkap</label>
                                    <input type="text" id="mName" class="form-control rounded-3" placeholder="Nama pemuda" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label fw-semibold fs-7 mb-1">Umur</label>
                                    <input type="number" id="mAge" class="form-control rounded-3" placeholder="18" min="12" max="80" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold fs-7 mb-1">Wilayah RT/RW</label>
                                    <select id="mRt" class="form-select rounded-3" required>
                                        <option value="RT 01 / RW 01">RT 01 / RW 01 </option>
                                        <option value="RT 02 / RW 01">RT 02 / RW 01 </option>
                                        <option value="RT 03 / RW 02">RT 03 / RW 02 </option>
                                        <option value="RT 04 / RW 02">RT 04 / RW 02 </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold fs-7 mb-1">Jabatan / Peran</label>
                                    <select id="mJabatan" class="form-select rounded-3" required>
                                        <option value="Anggota Aktif">Anggota Karang Taruna</option>
                                        <option value="Ketua Karang Taruna">Ketua Karang Taruna</option>
                                        <option value="Wakil Ketua">Wakil Ketua</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Bendahara">Bendahara</option>
                                        <option value="Seksi Konsumsi">Seksi Konsumsi</option>
                                        <option value="Seksi Humas & Pemuda">Seksi Humas</option>
                                        <option value="Senior / Alumni Pemuda">Senior / Alumni Pemuda</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold fs-7 mb-1">Foto Profil </label>
                                    <input type="file" id="mPhoto" class="form-control rounded-3" accept="image/*">
                                </div>
                                <div class="col-md-4 d-flex align-items-end gap-2">
                                    <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold w-100" onclick="saveMemberFromPengurus()">
                                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Data
                                    </button>
                                    <button type="button" class="btn btn-secondary rounded-pill px-3 fw-semibold" onclick="closeFormEditor()">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive rounded-3 border">
                        <table class="table table-hover align-middle mb-0 table-custom">
                            <thead>
                                <tr>
                                    <th class="ps-3" style="width: 60px;">No</th>
                                    <th style="width: 80px;">Foto</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jabatan / Peran</th>
                                    <th>Umur</th>
                                    <th>Wilayah</th>
                                    <th class="text-center" style="width: 140px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pengurusMemberTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer bg-light border-top-0 p-3">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const authUserEmail = "{{ Auth::user()->email ?? 'guest@arum.com' }}";
        const authUserName = "{{ Auth::user()->name ?? 'Admin Karang Taruna' }}";
        const storageKey = `arum_user_profile_${authUserEmail}`;

        let currentUserData = {
            nama: authUserName,
            email: authUserEmail,
            gender: "Laki-laki",
            umur: "18",
            rt: "RT 01 / RW 01",
            jabatan: "Anggota Aktif",
            bio: "Semangat berkarya dan menjalin silaturahmi untuk pemuda Barepan.",
            foto: null
        };

        let tempUploadedPhoto = null;
        let tempOnboardPhoto = null;
        let canvasCtx = null;
        let isDrawing = false;
        let mediaStream = null;
        let currentRealLocation = "Blok KPK Barepan (GPS Aktif)";
        let activeAlbumId = null;

        function initInitialData() {
            let kasHistory = JSON.parse(localStorage.getItem('arum_kas_history'));
            if (!kasHistory || kasHistory.length === 0) {
                const initialSeed = [
                    { nama: "Anastasya Ayu", rt: "RT 01 / RW 01", tanggal_iuran: "13 Oktober 2026", nominal: 80000, ttd: "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='80' height='30'><path d='M10 20 Q 30 5, 50 20 T 70 10' stroke='%230f172a' stroke-width='2' fill='none'/></svg>", tanggal_transaksi: "13 Oktober 2026 pukul 19.11" },
                    { nama: authUserName, rt: "RT 01 / RW 01", tanggal_iuran: "13 Oktober 2026", nominal: 15000, ttd: "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='80' height='30'><path d='M10 15 C 20 5, 40 25, 70 15' stroke='%230f172a' stroke-width='2' fill='none'/></svg>", tanggal_transaksi: "13 Oktober 2026 pukul 19.10" }
                ];
                localStorage.setItem('arum_kas_history', JSON.stringify(initialSeed));
            }

            let donasiHistory = JSON.parse(localStorage.getItem('arum_donasi_alumni_history'));
            if (!donasiHistory) {
                const initialDonasiSeed = [
                    { nama: "Bapak H. Sutrisno (Senior)", program: "Pembangunan Fasilitas Pemuda / Balai Pertemuan", nominal: 500000, pesan: "Semoga fasilitas balai pertemuan semakin bermanfaat untuk pemuda.", tanggal: "14 Oktober 2026 pukul 10.00" }
                ];
                localStorage.setItem('arum_donasi_alumni_history', JSON.stringify(initialDonasiSeed));
            }

            let dbAbsen = JSON.parse(localStorage.getItem('arum_db_absensi'));
            let widgetAbsen = JSON.parse(localStorage.getItem('arum_widget_absensi'));
            
            if (!dbAbsen || dbAbsen.length === 0) {
                const initialAbsenSeed = [
                    { nama_anggota: authUserName, email: authUserEmail, rt: "RT 01 / RW 01", tanggal: "14 Oktober 2026", jam: "04.02 WIB", lokasi: "Barepan, Klaten (GPS)", keterangan: "Hadir Tepat Waktu", snapshot_foto: "", month_key: "2026-10", timestamp: Date.now() - 1000 }
                ];
                localStorage.setItem('arum_db_absensi', JSON.stringify(initialAbsenSeed));
                
                if (!widgetAbsen) {
                    localStorage.setItem('arum_widget_absensi', JSON.stringify({ "2026-10": initialAbsenSeed }));
                }
            }

            let announcements = JSON.parse(localStorage.getItem('arum_dynamic_announcements'));
            if (!announcements) {
                const futureDate = new Date();
                futureDate.setDate(futureDate.getDate() + 7);
                const futureStr = futureDate.toISOString().split('T')[0];

                const seedAnnouncements = [
                    {
                        id: 'ann_1',
                        title: 'Musyawarah Bulanan',
                        content: 'Sabtu malam Minggu di Balai Pertemuan KPK.',
                        created_at: '14 Oktober 2026',
                        deadline: futureStr
                    },
                    {
                        id: 'ann_2',
                        title: 'Jadwal Voli',
                        content: 'Selasa & Jumat jam 16.00 WIB di lapangan desa.',
                        created_at: '14 Oktober 2026',
                        deadline: futureStr
                    }
                ];
                localStorage.setItem('arum_dynamic_announcements', JSON.stringify(seedAnnouncements));
            }

            let aspirasiList = JSON.parse(localStorage.getItem('arum_kotak_aspirasi'));
            if (!aspirasiList || aspirasiList.length === 0) {
                const seedAspirasi = [
                    {
                        id: 'asp_1',
                        nama: 'Bapak Slamet',
                        rt: 'RT 01',
                        rw: 'RW 01',
                        wa: '08123456789',
                        kategori: 'Fasilitas Umum',
                        isi: 'Mohon peninjauan lampu penerangan jalan di blok utara RT 01 yang sudah mati sejak minggu lalu.',
                        foto: '',
                        status: 'Diproses',
                        keterangan_admin: 'Tim peralatan sedang mengecek bohlam pengganti',
                        tanggal: '14 Oktober 2026',
                        is_anonymous: false
                    }
                ];
                localStorage.setItem('arum_kotak_aspirasi', JSON.stringify(seedAspirasi));
            }

            let albums = getDocumentationAlbums();
            if (!albums || albums.length === 0) {
                const defaultAlbums = [
                    {
                        id: "alb_1",
                        title: "Kegiatan Memperingati Hari Kemerdekaan 17 Agustus",
                        desc: "Lomba-lomba pemuda, jalan sehat, dan tirakatan malam 17-an desa Barepan.",
                        cover: "https://images.unsplash.com/photo-1532629345422-7515f3d16bb0?w=500&auto=format&fit=crop&q=60",
                        photos: [
                            "https://images.unsplash.com/photo-1532629345422-7515f3d16bb0?w=600&auto=format&fit=crop&q=60"
                        ]
                    }
                ];
                saveDocumentationAlbums(defaultAlbums);
            }

            let programs = JSON.parse(localStorage.getItem('arum_public_programs'));
            if (!programs || programs.length === 0) {
                const defaultPrograms = [
                    {
                        id: 'prog_1',
                        title: 'Olahraga & Seni Kebudayaan',
                        badge: 'Minat & Bakat Pemuda',
                        icon: 'fa-solid fa-volleyball',
                        desc: 'Jadwal latihan voli dan turnamen antar RT.',
                        schedule: 'Selasa & Jumat sore di lapangan desa.'
                    }
                ];
                localStorage.setItem('arum_public_programs', JSON.stringify(defaultPrograms));
            }
        }

        function loadUserProfileFromStorage() {
            initInitialData();
            cleanExpiredAnnouncements();
            const saved = localStorage.getItem(storageKey);
            if (saved) {
                currentUserData = JSON.parse(saved);
                if (!currentUserData.nama || currentUserData.nama === "undefined") {
                    currentUserData.nama = authUserName;
                }
                applyUserProfileToUI();
                syncUserToPublicDatabase();
            } else {
                const onboardModal = new bootstrap.Modal(document.getElementById('onboardingBioModal'));
                onboardModal.show();
            }
            initSignaturePad();
        }

        function cleanExpiredAnnouncements() {
            let announcements = JSON.parse(localStorage.getItem('arum_dynamic_announcements')) || [];
            const todayStr = new Date().toISOString().split('T')[0];
            
            const validAnnouncements = announcements.filter(item => {
                if (!item.deadline) return true;
                return item.deadline >= todayStr;
            });

            if (validAnnouncements.length !== announcements.length) {
                localStorage.setItem('arum_dynamic_announcements', JSON.stringify(validAnnouncements));
            }
        }

        function previewOnboardPhoto(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    tempOnboardPhoto = e.target.result;
                    document.getElementById('onboardAvatarPreview').innerHTML = `<img src="${tempOnboardPhoto}" alt="Preview">`;
                };
                reader.readAsDataURL(file);
            }
        }

        function submitOnboardingBio() {
            const name = document.getElementById('onboardName').value.trim() || authUserName;
            const gender = document.getElementById('onboardGender').value;
            const umur = document.getElementById('onboardUmur').value.trim();
            const rt = document.getElementById('onboardRt').value;
            const jabatan = document.getElementById('onboardJabatan').value;
            const bio = document.getElementById('onboardBio').value.trim();

            if (!name || !umur) {
                showNotification('Mohon isi Nama Lengkap dan Umur Anda!', 'error');
                return;
            }

            currentUserData = {
                nama: name,
                email: authUserEmail,
                gender: gender,
                umur: umur,
                rt: rt,
                jabatan: jabatan,
                bio: bio || "Pemuda Aktif Blok KPK Barepan",
                foto: tempOnboardPhoto
            };

            localStorage.setItem(storageKey, JSON.stringify(currentUserData));
            syncUserToPublicDatabase();
            applyUserProfileToUI();

            bootstrap.Modal.getInstance(document.getElementById('onboardingBioModal')).hide();
            showNotification('Biodata berhasil disimpan & masuk ke Database Utama!', 'success');
        }

        function syncUserToPublicDatabase() {
            let members = JSON.parse(localStorage.getItem('arum_custom_members')) || [];
            const existingIndex = members.findIndex(m => m.email === authUserEmail);

            const record = {
                nama: currentUserData.nama,
                email: currentUserData.email,
                jabatan: currentUserData.jabatan,
                umur: currentUserData.umur + " Tahun",
                rt: currentUserData.rt,
                foto: currentUserData.foto
            };

            if (existingIndex >= 0) {
                members[existingIndex] = record;
            } else {
                members.push(record);
            }

            localStorage.setItem('arum_custom_members', JSON.stringify(members));
        }

        function isPengurusIntiUser() {
            const listPengurusKeywords = ["ketua", "wakil", "sekretaris", "bendahara", "seksi konsumsi", "pengurus", "admin"];
            const jLower = (currentUserData.jabatan || "").toLowerCase();
            return listPengurusKeywords.some(kw => jLower.includes(kw));
        }

        function isAlumniOrSenior() {
            const jLower = (currentUserData.jabatan || "").toLowerCase();
            return jLower.includes("alumni") || jLower.includes("senior") || jLower.includes("penasihat") || jLower.includes("pembina");
        }

        function applyUserProfileToUI() {
            document.getElementById('topNavUserName').textContent = currentUserData.nama;
            document.getElementById('sidebarUserName').textContent = currentUserData.nama;
            document.getElementById('bannerUserName').textContent = currentUserData.nama;
            document.getElementById('sidebarEmail').textContent = currentUserData.email;
            document.getElementById('sidebarGender').textContent = currentUserData.gender || 'Laki-laki';
            document.getElementById('sidebarUmur').textContent = (currentUserData.umur || '18') + ' Tahun';
            document.getElementById('sidebarRt').textContent = currentUserData.rt;
            document.getElementById('topNavRtText').textContent = currentUserData.rt;
            document.getElementById('sidebarJabatan').textContent = currentUserData.jabatan;
            document.getElementById('displayBio').textContent = `"${currentUserData.bio}"`;

            const topNavBox = document.getElementById('topNavAvatarBox');
            const sidebarBox = document.getElementById('sidebarAvatarBox');

            if (currentUserData.foto) {
                topNavBox.innerHTML = `<img src="${currentUserData.foto}" alt="Avatar">`;
                sidebarBox.innerHTML = `<img src="${currentUserData.foto}" alt="Avatar">`;
            } else {
                topNavBox.innerHTML = `<i class="fa-solid fa-user"></i>`;
                sidebarBox.innerHTML = `<i class="fa-solid fa-user"></i>`;
            }

            const cardKas = document.getElementById('cardMenuKas');
            const cardAbsen = document.getElementById('cardMenuAbsen');
            const cardAspirasi = document.getElementById('cardMenuAspirasi');
            const cardDonasiAlumni = document.getElementById('cardMenuDonasiAlumni');
            const sidebarNoticeCardContainer = document.getElementById('sidebarNoticeCardContainer');
            const welcomeSubtitle = document.getElementById('welcomeSubtitleText');

            const pengurusCard = document.getElementById('pengurusManagementCard');
            const pengumumanAdminCard = document.getElementById('pengumumanAdminCard');
            const kelolaProgramCard = document.getElementById('kelolaProgramCard');
            const rekapKasCard = document.getElementById('rekapKasCard');
            const transparansiKeuanganCard = document.getElementById('transparansiKeuanganCard');
            const riwayatAbsensiCard = document.getElementById('riwayatAbsensiCard');
            const rekapDonasiCard = document.getElementById('rekapDonasiCard');

            if (isAlumniOrSenior()) {
                cardKas.classList.add('d-none');
                cardAbsen.classList.add('d-none');
                cardAspirasi.classList.add('d-none');
                
                sidebarNoticeCardContainer.classList.add('d-none');
                cardDonasiAlumni.classList.remove('d-none');

                if (isPengurusIntiUser()) {
                    rekapDonasiCard.classList.remove('d-none');
                    sidebarNoticeCardContainer.classList.remove('d-none');
                } else {
                    rekapDonasiCard.classList.add('d-none');
                }

                welcomeSubtitle.textContent = "Selamat Datang di Portal Kehormatan Senior & Alumni Karang Taruna ARUM. Terima kasih atas dedikasi dan dukungan wakaf/donasi produktif Anda untuk desa.";
            } else {
                cardKas.classList.remove('d-none');
                cardAbsen.classList.remove('d-none');
                cardAspirasi.classList.remove('d-none');
                sidebarNoticeCardContainer.classList.remove('d-none');
                cardDonasiAlumni.classList.add('d-none');
                rekapDonasiCard.classList.add('d-none');

                welcomeSubtitle.textContent = "Selamat datang di portal anggota Karang Taruna ARUM. Akses layanan internal, cek kas, absensi digital, dan transparansi aduan di sini.";
            }

            if (isPengurusIntiUser()) {
                pengurusCard.classList.remove('d-none');
                pengumumanAdminCard.classList.remove('d-none');
                kelolaProgramCard.classList.remove('d-none');
                rekapKasCard.classList.remove('d-none');
                transparansiKeuanganCard.classList.remove('d-none');
                riwayatAbsensiCard.classList.remove('d-none');
                rekapDonasiCard.classList.remove('d-none');
                sidebarNoticeCardContainer.classList.remove('d-none');
            } else if (!isAlumniOrSenior()) {
                pengurusCard.classList.add('d-none');
                pengumumanAdminCard.classList.add('d-none');
                kelolaProgramCard.classList.add('d-none');
                rekapKasCard.classList.add('d-none');
                transparansiKeuanganCard.classList.add('d-none');
                riwayatAbsensiCard.classList.add('d-none');
            }

            renderSidebarAnnouncementsWidget();
        }

        /* --- FITUR KELOLA PROGRAM KEPEMUDAAN (KHUSUS PENGURUS INTI) --- */
        function openKelolaProgramModal() {
            if (!isPengurusIntiUser()) {
                showNotification('Akses Ditolak!', 'error');
                return;
            }
            renderPengurusProgramTable();
            closeProgramEditor();
            const modal = new bootstrap.Modal(document.getElementById('kelolaProgramModal'));
            modal.show();
        }

        function renderPengurusProgramTable() {
            let programs = JSON.parse(localStorage.getItem('arum_public_programs')) || [];
            const tbody = document.getElementById('pengurusProgramTableBody');
            document.getElementById('totalProgramAdminCount').textContent = `${programs.length} Program`;

            if (programs.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5" class="text-center py-4 text-muted fs-7">Belum ada program kepemudaan yang dibuat.</td></tr>`;
                return;
            }

            let html = '';
            programs.forEach((item) => {
                html += `
                    <tr>
                        <td class="ps-3 fw-bold text-muted">${item.id}</td>
                        <td>
                            <div class="fw-bold text-dark"><i class="${item.icon || 'fa-solid fa-star'} me-1 text-teal"></i> ${item.title}</div>
                            <span class="badge bg-light border mt-1" style="border-color:#0d9488 !important; color:#0d9488;">${item.badge}</span>
                        </td>
                        <td class="text-muted fs-8" style="line-height: 1.4;">${item.desc}</td>
                        <td class="fs-8 text-dark"><i class="fa-solid fa-calendar-days text-primary me-1"></i> ${item.schedule}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1" onclick="deleteProgram('${item.id}')" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
        }

        function openFormAddProgram() {
            document.getElementById('formProgramEditorTitle').innerHTML = `<i class="fa-solid fa-plus-circle me-2"></i> Tambah Program Kepemudaan Baru`;
            document.getElementById('editProgramId').value = "";
            document.getElementById('manageProgramForm').reset();
            document.getElementById('formProgramEditor').classList.remove('d-none');
        }

        function closeProgramEditor() {
            document.getElementById('formProgramEditor').classList.add('d-none');
            document.getElementById('manageProgramForm').reset();
            document.getElementById('editProgramId').value = "";
        }

        function saveProgramFromAdmin() {
            const title = document.getElementById('progTitle').value.trim();
            const badge = document.getElementById('progBadge').value.trim();
            const icon = document.getElementById('progIcon').value;
            const schedule = document.getElementById('progSchedule').value.trim();
            const desc = document.getElementById('progDesc').value.trim();

            if (!title || !badge || !schedule || !desc) {
                showNotification('Gagal! Judul, badge, jadwal, dan deskripsi wajib diisi.', 'error');
                return;
            }

            let programs = JSON.parse(localStorage.getItem('arum_public_programs')) || [];
            const newProg = {
                id: 'prog_' + Date.now(),
                title: title,
                badge: badge,
                icon: icon,
                desc: desc,
                schedule: schedule
            };

            programs.unshift(newProg);
            localStorage.setItem('arum_public_programs', JSON.stringify(programs));
            renderPengurusProgramTable();
            closeProgramEditor();
            showNotification('Program kepemudaan berhasil ditambahkan!', 'success');
        }

        function deleteProgram(id) {
            let programs = JSON.parse(localStorage.getItem('arum_public_programs')) || [];
            if (confirm("Yakin ingin menghapus program kepemudaan ini?")) {
                programs = programs.filter(p => p.id !== id);
                localStorage.setItem('arum_public_programs', JSON.stringify(programs));
                renderPengurusProgramTable();
                showNotification('Program kepemudaan berhasil dihapus.', 'success');
            }
        }

        function renderSidebarAnnouncementsWidget() {
            cleanExpiredAnnouncements();
            const container = document.getElementById('sidebarDynamicAnnouncementsList');
            const badgeCount = document.getElementById('badgeTotalPengumuman');
            const announcements = JSON.parse(localStorage.getItem('arum_dynamic_announcements')) || [];

            badgeCount.textContent = announcements.length;

            if (announcements.length === 0) {
                container.innerHTML = `<p class="fs-8 text-muted fst-italic mb-0">Belum ada pengumuman aktif saat ini.</p>`;
                return;
            }

            let html = '';
            announcements.forEach((item, index) => {
                html += `
                    <div class="mb-2 ${index < announcements.length - 1 ? 'border-bottom pb-2' : ''}">
                        <div class="fw-bold text-dark fs-8"><i class="fa-solid fa-thumbtack text-primary me-1"></i> ${item.title}</div>
                        <div class="fs-8 text-muted" style="line-height: 1.4;">${item.content}</div>
                        <div class="text-secondary fs-9 mt-1"><i class="fa-regular fa-clock me-1"></i> Tenggat: ${item.deadline || 'Tidak ada batas'}</div>
                    </div>
                `;
            });
            container.innerHTML = html;
        }

        /* --- FITUR KELOLA PENGUMUMAN ORGANISASI (PENGURUS INTI) --- */
        function openPengumumanAdminModal() {
            if (!isPengurusIntiUser()) {
                showNotification('Akses Ditolak!', 'error');
                return;
            }
            renderPengurusAnnouncementsTable();
            closePengumumanEditor();
            const modal = new bootstrap.Modal(document.getElementById('pengumumanAdminModal'));
            modal.show();
        }

        function renderPengurusAnnouncementsTable() {
            cleanExpiredAnnouncements();
            const announcements = JSON.parse(localStorage.getItem('arum_dynamic_announcements')) || [];
            const tbody = document.getElementById('pengurusPengumumanTableBody');
            document.getElementById('totalPengumumanAdminCount').textContent = `${announcements.length} Pengumuman`;

            if (announcements.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5" class="text-center py-4 text-muted fs-7">Belum ada pengumuman yang dibuat.</td></tr>`;
                return;
            }

            let html = '';
            announcements.forEach((item, idx) => {
                html += `
                    <tr>
                        <td class="ps-3 fw-bold text-muted">${idx + 1}</td>
                        <td>
                            <div class="fw-bold text-dark">${item.title}</div>
                            <div class="text-muted fs-8 mt-1" style="line-height: 1.4;">${item.content}</div>
                        </td>
                        <td class="fs-8 text-muted"><i class="fa-solid fa-calendar-days me-1"></i> ${item.created_at}</td>
                        <td><span class="badge bg-light text-danger border px-2 py-1 fs-8"><i class="fa-regular fa-hourglass-half me-1"></i> ${item.deadline || '-'}</span></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 me-1" onclick="editPengumuman('${item.id}')" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1" onclick="deletePengumuman('${item.id}')" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
        }

        function openFormAddPengumuman() {
            document.getElementById('formPengumumanEditorTitle').innerHTML = `<i class="fa-solid fa-plus-circle me-2"></i> Buat Pengumuman Baru`;
            document.getElementById('editPengumumanId').value = "";
            document.getElementById('managePengumumanForm').reset();
            
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 7);
            document.getElementById('pDeadline').value = tomorrow.toISOString().split('T')[0];

            document.getElementById('formPengumumanEditor').classList.remove('d-none');
        }

        function editPengumuman(id) {
            const announcements = JSON.parse(localStorage.getItem('arum_dynamic_announcements')) || [];
            const target = announcements.find(a => a.id === id);
            if (!target) return;

            document.getElementById('formPengumumanEditorTitle').innerHTML = `<i class="fa-solid fa-pen-to-square me-2"></i> Edit Pengumuman`;
            document.getElementById('editPengumumanId').value = target.id;
            document.getElementById('pTitle').value = target.title;
            document.getElementById('pContent').value = target.content;
            document.getElementById('pDeadline').value = target.deadline || '';
            document.getElementById('formPengumumanEditor').classList.remove('d-none');
        }

        function closePengumumanEditor() {
            document.getElementById('formPengumumanEditor').classList.add('d-none');
            document.getElementById('managePengumumanForm').reset();
            document.getElementById('editPengumumanId').value = "";
        }

        function savePengumumanFromAdmin() {
            const id = document.getElementById('editPengumumanId').value;
            const title = document.getElementById('pTitle').value.trim();
            const content = document.getElementById('pContent').value.trim();
            const deadline = document.getElementById('pDeadline').value;

            if (!title || !content || !deadline) {
                showNotification('Gagal! Judul, isi, dan tenggat waktu wajib diisi.', 'error');
                return;
            }

            let announcements = JSON.parse(localStorage.getItem('arum_dynamic_announcements')) || [];
            const now = new Date();
            const createdStr = now.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

            if (id) {
                const idx = announcements.findIndex(a => a.id === id);
                if (idx >= 0) {
                    announcements[idx].title = title;
                    announcements[idx].content = content;
                    announcements[idx].deadline = deadline;
                }
            } else {
                const newAnn = {
                    id: 'ann_' + Date.now(),
                    title: title,
                    content: content,
                    created_at: createdStr,
                    deadline: deadline
                };
                announcements.unshift(newAnn);
            }

            localStorage.setItem('arum_dynamic_announcements', JSON.stringify(announcements));
            renderPengurusAnnouncementsTable();
            renderSidebarAnnouncementsWidget();
            closePengumumanEditor();
            showNotification('Pengumuman berhasil dipublikasikan dan langsung tersiar ke anggota!', 'success');
        }

        function deletePengumuman(id) {
            let announcements = JSON.parse(localStorage.getItem('arum_dynamic_announcements')) || [];
            if (confirm("Yakin ingin menghapus pengumuman ini?")) {
                announcements = announcements.filter(a => a.id !== id);
                localStorage.setItem('arum_dynamic_announcements', JSON.stringify(announcements));
                renderPengurusAnnouncementsTable();
                renderSidebarAnnouncementsWidget();
                showNotification('Pengumuman berhasil dihapus.', 'success');
            }
        }

        function populateProfileModal() {
            document.getElementById('inputEditName').value = currentUserData.nama;
            document.getElementById('inputEditEmail').value = currentUserData.email;
            document.getElementById('inputEditGender').value = currentUserData.gender || "Laki-laki";
            document.getElementById('inputEditUmur').value = currentUserData.umur || "18";
            document.getElementById('inputEditRt').value = currentUserData.rt;
            document.getElementById('inputEditJabatan').value = currentUserData.jabatan;
            document.getElementById('inputEditBio').value = currentUserData.bio;
            tempUploadedPhoto = currentUserData.foto;

            updateModalAvatarPreview();
        }

        function handleJabatanChange(val) {}

        function previewUserPhoto(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    tempUploadedPhoto = e.target.result;
                    updateModalAvatarPreview();
                };
                reader.readAsDataURL(file);
            }
        }

        function removeUserPhoto() {
            tempUploadedPhoto = null;
            document.getElementById('inputProfilePhoto').value = "";
            updateModalAvatarPreview();
        }

        function updateModalAvatarPreview() {
            const modalPreview = document.getElementById('modalAvatarPreview');
            if (tempUploadedPhoto) {
                modalPreview.innerHTML = `<img src="${tempUploadedPhoto}" alt="Preview">`;
            } else {
                modalPreview.innerHTML = `<i class="fa-solid fa-user"></i>`;
            }
        }

        function saveProfileChanges() {
            const name = document.getElementById('inputEditName').value.trim() || authUserName;
            const gender = document.getElementById('inputEditGender').value;
            const umur = document.getElementById('inputEditUmur').value.trim();
            const rt = document.getElementById('inputEditRt').value;
            const jabatan = document.getElementById('inputEditJabatan').value;
            const bio = document.getElementById('inputEditBio').value.trim();

            if (!name || !umur) {
                showNotification('Gagal! Nama Lengkap dan Umur wajib diisi.', 'error');
                return;
            }

            currentUserData = {
                nama: name,
                email: authUserEmail,
                gender: gender,
                umur: umur,
                rt: rt,
                jabatan: jabatan || "Anggota Aktif",
                bio: bio || "Pemuda Aktif Blok KPK Barepan",
                foto: tempUploadedPhoto
            };

            localStorage.setItem(storageKey, JSON.stringify(currentUserData));
            syncUserToPublicDatabase();
            applyUserProfileToUI();

            const editModalEl = document.getElementById('editProfileModal');
            const editModalInstance = bootstrap.Modal.getInstance(editModalEl) || new bootstrap.Modal(editModalEl);
            editModalInstance.hide();
            
            showNotification('Profil & biodata berhasil diperbarui!', 'success');
        }

        /* --- FITUR DONASI & WAKAF PRODUKTIF (ALUMNI / SENIOR) --- */
        function openDonasiAlumniModal() {
            document.getElementById('donasiNama').value = currentUserData.nama;
            document.getElementById('donasiNominal').value = "";
            document.getElementById('donasiPesan').value = "";

            const modal = new bootstrap.Modal(document.getElementById('donasiAlumniModal'));
            modal.show();
        }

        function submitDonasiAlumni() {
            const nama = document.getElementById('donasiNama').value.trim();
            const program = document.getElementById('donasiProgram').value;
            const nominal = parseInt(document.getElementById('donasiNominal').value);
            const pesan = document.getElementById('donasiPesan').value.trim();

            if (!nama || isNaN(nominal) || nominal <= 0) {
                showNotification('Mohon isi nama dan nominal donasi dengan benar!', 'error');
                return;
            }

            const now = new Date();
            const tglStr = now.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) + " pukul " + now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

            const newDonasi = {
                nama: nama,
                program: program,
                nominal: nominal,
                pesan: pesan || "Dukungan penuh untuk kemajuan pemuda Blok KPK.",
                tanggal: tglStr
            };

            let donasiHistory = JSON.parse(localStorage.getItem('arum_donasi_alumni_history')) || [];
            donasiHistory.unshift(newDonasi);
            localStorage.setItem('arum_donasi_alumni_history', JSON.stringify(donasiHistory));

            let notifs = JSON.parse(localStorage.getItem('arum_pengurus_notifications')) || [];
            notifs.unshift({
                title: "Donasi Wakaf Senior Masuk!",
                desc: `${nama} telah menyumbangkan donasi sebesar Rp ${nominal.toLocaleString('id-ID')} untuk program "${program}".`,
                tanggal: tglStr,
                read: false
            });
            localStorage.setItem('arum_pengurus_notifications', JSON.stringify(notifs));

            bootstrap.Modal.getInstance(document.getElementById('donasiAlumniModal')).hide();
            showNotification(`Terima kasih! Donasi sebesar Rp ${nominal.toLocaleString('id-ID')} berhasil dikonfirmasi dan masuk ke sistem pengurus.`, 'success');
        }

        function openRekapDonasiModal() {
            renderDonasiHistoryTable();
            const modal = new bootstrap.Modal(document.getElementById('rekapDonasiModal'));
            modal.show();
        }

        function renderDonasiHistoryTable() {
            let donasiHistory = JSON.parse(localStorage.getItem('arum_donasi_alumni_history')) || [];
            const tbody = document.getElementById('donasiHistoryTableBody');
            let total = 0;

            if (donasiHistory.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-muted fs-7">Belum ada catatan donasi wakaf senior yang masuk.</td></tr>`;
                document.getElementById('totalDonasiCollected').textContent = `Total Donasi: Rp 0`;
                return;
            }

            let html = '';
            donasiHistory.forEach((item, idx) => {
                total += item.nominal;
                html += `
                    <tr>
                        <td class="ps-3 fw-bold text-muted">${idx + 1}</td>
                        <td>
                            <div class="fw-bold text-dark">${item.nama}</div>
                            <div class="text-muted fs-8"><i class="fa-solid fa-calendar-days me-1"></i> ${item.tanggal}</div>
                        </td>
                        <td><span class="badge bg-light text-primary border px-2 py-1 fs-8">${item.program}</span></td>
                        <td class="fw-bold text-success">Rp ${item.nominal.toLocaleString('id-ID')}</td>
                        <td class="text-dark fst-italic fs-8">"${item.pesan}"</td>
                        <td class="text-center no-print">
                            <button class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1" onclick="deleteDonasiItem(${idx})" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
            document.getElementById('totalDonasiCollected').textContent = `Total Donasi: Rp ${total.toLocaleString('id-ID')}`;
        }

        function deleteDonasiItem(index) {
            let donasiHistory = JSON.parse(localStorage.getItem('arum_donasi_alumni_history')) || [];
            if (confirm("Yakin ingin menghapus catatan donasi ini?")) {
                donasiHistory.splice(index, 1);
                localStorage.setItem('arum_donasi_alumni_history', JSON.stringify(donasiHistory));
                renderDonasiHistoryTable();
                showNotification('Catatan donasi berhasil dihapus.', 'success');
            }
        }

        /* --- KELOLA KOTAK ASPIRASI & PENGADUAN WARGA --- */
        function openAspirasiAdminModal() {
            renderAspirasiAdminTable();
            const modal = new bootstrap.Modal(document.getElementById('aspirasiAdminModal'));
            modal.show();
        }

        function renderAspirasiAdminTable() {
            let list = JSON.parse(localStorage.getItem('arum_kotak_aspirasi')) || [];
            const tbody = document.getElementById('aspirasiAdminTableBody');
            document.getElementById('totalAspirasiAdminBadge').textContent = `Total: ${list.length} Laporan`;

            if (list.length === 0) {
                tbody.innerHTML = `<tr><td colspan="7" class="text-center py-4 text-muted fs-7">Belum ada aduan atau aspirasi warga yang masuk.</td></tr>`;
                return;
            }

            let html = '';
            list.forEach((item, idx) => {
                let badgeStatusClass = 'bg-secondary';
                if (item.status === 'Menunggu') badgeStatusClass = 'bg-warning text-dark';
                else if (item.status === 'Diproses') badgeStatusClass = 'bg-info text-dark';
                else if (item.status === 'Selesai') badgeStatusClass = 'bg-success text-white';

                let fotoThumb = item.foto ? `<div class="mt-2"><a href="${item.foto}" target="_blank"><img src="${item.foto}" alt="Bukti" style="max-height: 50px; border-radius: 6px; border: 1px solid #cbd5e1;"></a></div>` : '';
                let ketAdmin = item.keterangan_admin ? `<div class="text-secondary fs-8 mt-1"><i class="fa-solid fa-comment-dots me-1 text-info"></i> <strong>Tanggapan:</strong> ${item.keterangan_admin}</div>` : `<span class="text-muted fs-8 fst-italic">Belum ada keterangan</span>`;

                html += `
                    <tr>
                        <td class="ps-3 fw-bold text-muted">${idx + 1}</td>
                        <td>
                            <div class="fw-bold text-dark">${item.nama}</div>
                            <div class="text-muted fs-8"><i class="fa-solid fa-calendar-days me-1"></i> ${item.tanggal}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-primary border px-2 py-1 fs-8 fw-semibold">${item.kategori}</span>
                            <div class="text-muted fs-8 mt-1"><i class="fa-solid fa-location-dot text-danger me-1"></i> ${item.rt} / ${item.rw}</div>
                        </td>
                        <td>
                            <div class="text-dark" style="line-height: 1.4;">${item.isi}</div>
                            ${fotoThumb}
                        </td>
                        <td style="text-align: center;">
                            <span class="badge ${badgeStatusClass} px-3 py-2 rounded-pill fw-bold" style="font-size: 0.78rem;">${item.status}</span>
                        </td>
                        <td>${ketAdmin}</td>
                        <td class="text-center no-print">
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 me-1" onclick="openEditAspirasiModal('${item.id}')" title="Ubah Status & Keterangan">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1" onclick="deleteAspirasiItem('${item.id}')" title="Hapus Laporan">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
        }

        function openEditAspirasiModal(id) {
            let list = JSON.parse(localStorage.getItem('arum_kotak_aspirasi')) || [];
            const target = list.find(item => item.id === id);
            if (!target) return;

            document.getElementById('editAspId').value = target.id;
            document.getElementById('editAspStatus').value = target.status || 'Menunggu';
            document.getElementById('editAspKeterangan').value = target.keterangan_admin || '';

            const editModal = new bootstrap.Modal(document.getElementById('editAspirasiStatusModal'));
            editModal.show();
        }

        function saveAspirasiStatusUpdate() {
            const id = document.getElementById('editAspId').value;
            const newStatus = document.getElementById('editAspStatus').value;
            const newKet = document.getElementById('editAspKeterangan').value.trim();

            let list = JSON.parse(localStorage.getItem('arum_kotak_aspirasi')) || [];
            const idx = list.findIndex(item => item.id === id);

            if (idx >= 0) {
                list[idx].status = newStatus;
                list[idx].keterangan_admin = newKet;

                localStorage.setItem('arum_kotak_aspirasi', JSON.stringify(list));
                renderAspirasiAdminTable();

                bootstrap.Modal.getInstance(document.getElementById('editAspirasiStatusModal')).hide();
                showNotification('Status dan keterangan aduan berhasil diperbarui!', 'success');
            }
        }

        function deleteAspirasiItem(id) {
            let list = JSON.parse(localStorage.getItem('arum_kotak_aspirasi')) || [];
            if (confirm("Apakah Anda yakin ingin menghapus laporan aduan/aspirasi warga ini?")) {
                list = list.filter(item => item.id !== id);
                localStorage.setItem('arum_kotak_aspirasi', JSON.stringify(list));
                renderAspirasiAdminTable();
                showNotification('Laporan aduan berhasil dihapus.', 'success');
            }
        }

        /* --- FITUR GALERI DOKUMENTASI DIGITAL --- */
        function openDokumentasiModal() {
            renderAlbumGrid();
            const modal = new bootstrap.Modal(document.getElementById('dokumentasiModal'));
            modal.show();
        }

        function renderAlbumGrid() {
            const albums = getDocumentationAlbums();
            const container = document.getElementById('albumGridContainer');

            if (albums.length === 0) {
                container.innerHTML = `
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fa-solid fa-images fs-1 mb-2 d-block opacity-50"></i>
                        Belum ada kategori/album dokumentasi. Klik tombol "+ Tambah Kategori / Album" untuk membuat baru.
                    </div>
                `;
                return;
            }

            let html = '';
            albums.forEach(alb => {
                const coverSrc = alb.cover || 'https://via.placeholder.com/500x300?text=No+Cover';
                const photoCount = alb.photos ? alb.photos.length : 0;
                
                html += `
                    <div class="col-md-6 col-lg-4">
                        <div class="album-card" onclick="openAlbumDetail('${alb.id}')">
                            <div>
                                <img src="${coverSrc}" class="album-cover" alt="${alb.title}">
                                <div class="p-3">
                                    <h6 class="fw-bold text-dark mb-1">${alb.title}</h6>
                                    <p class="text-muted fs-8 mb-2 text-truncate">${alb.desc}</p>
                                    <span class="badge bg-light text-primary border rounded-pill fs-8"><i class="fa-solid fa-image me-1"></i> ${photoCount} Foto</span>
                                </div>
                            </div>
                            <div class="border-top p-2 bg-light d-flex justify-content-end gap-1" onclick="event.stopPropagation()">
                                <button class="btn btn-sm btn-outline-primary rounded-circle p-1 px-2 fs-8" onclick="openEditCategoryModal('${alb.id}')" title="Edit Judul Kategori">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger rounded-circle p-1 px-2 fs-8" onclick="deleteCategoryAlbum('${alb.id}')" title="Hapus Kategori">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
            container.innerHTML = html;
        }

        function openAddCategoryModal() {
            document.getElementById('categoryModalTitle').innerHTML = `<i class="fa-solid fa-folder-plus me-2"></i> Tambah Kategori / Album Baru`;
            document.getElementById('editCategoryId').value = "";
            document.getElementById('categoryForm').reset();

            // Sembunyikan modal galeri utama terlebih dahulu agar modal form kategori tampil rapi di atasnya
            const dokumentasiModalEl = document.getElementById('dokumentasiModal');
            const dokumentasiModalInstance = bootstrap.Modal.getInstance(dokumentasiModalEl);
            if (dokumentasiModalInstance) {
                dokumentasiModalInstance.hide();
            }

            const editModal = new bootstrap.Modal(document.getElementById('categoryEditorModal'));
            editModal.show();
        }

        function openEditCategoryModal(id) {
            const albums = getDocumentationAlbums();
            const target = albums.find(a => a.id === id);
            if (!target) return;

            document.getElementById('categoryModalTitle').innerHTML = `<i class="fa-solid fa-pen-to-square me-2"></i> Edit Judul Kategori Album`;
            document.getElementById('editCategoryId').value = target.id;
            document.getElementById('catTitle').value = target.title;
            document.getElementById('catDesc').value = target.desc;

            const dokumentasiModalEl = document.getElementById('dokumentasiModal');
            const dokumentasiModalInstance = bootstrap.Modal.getInstance(dokumentasiModalEl);
            if (dokumentasiModalInstance) {
                dokumentasiModalInstance.hide();
            }

            const editModal = new bootstrap.Modal(document.getElementById('categoryEditorModal'));
            editModal.show();
        }

        /* --- BANTUAN FOTO DOKUMENTASI ---
         * Foto dari HP/kamera sering berukuran beberapa MB.
         * Karena data galeri disimpan di localStorage, foto diperkecil
         * terlebih dahulu agar tidak gagal disimpan karena batas browser.
         */
        function compressDocumentationImage(file, maxWidth = 1400, maxHeight = 1000, quality = 0.78) {
            return new Promise((resolve, reject) => {
                if (!file || !file.type || !file.type.startsWith('image/')) {
                    reject(new Error('File yang dipilih bukan gambar.'));
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = new Image();

                    img.onload = function() {
                        let width = img.naturalWidth;
                        let height = img.naturalHeight;

                        const scale = Math.min(
                            1,
                            maxWidth / width,
                            maxHeight / height
                        );

                        width = Math.max(1, Math.round(width * scale));
                        height = Math.max(1, Math.round(height * scale));

                        const canvas = document.createElement('canvas');
                        canvas.width = width;
                        canvas.height = height;

                        const ctx = canvas.getContext('2d');

                        if (!ctx) {
                            reject(new Error('Browser tidak dapat memproses gambar.'));
                            return;
                        }

                        ctx.fillStyle = '#ffffff';
                        ctx.fillRect(0, 0, width, height);
                        ctx.drawImage(img, 0, 0, width, height);

                        const compressedData = canvas.toDataURL('image/jpeg', quality);

                        if (!compressedData || compressedData === 'data:,') {
                            reject(new Error('Gambar gagal diproses.'));
                            return;
                        }

                        resolve(compressedData);
                    };

                    img.onerror = function() {
                        reject(new Error('Gambar tidak dapat dibaca.'));
                    };

                    img.src = e.target.result;
                };

                reader.onerror = function() {
                    reject(new Error('File gambar gagal dibaca.'));
                };

                reader.readAsDataURL(file);
            });
        }

        function getDocumentationAlbums() {
            try {
                const raw = localStorage.getItem('arum_galeri_albums_shared')
                    || localStorage.getItem('arum_galeri_albums');

                if (!raw) return [];

                const albums = JSON.parse(raw);
                return Array.isArray(albums) ? albums : [];
            } catch (error) {
                console.error('Gagal membaca galeri dokumentasi:', error);
                return [];
            }
        }

        function saveDocumentationAlbums(albums) {
            try {
                const serializedAlbums = JSON.stringify(albums);
                // Key bersama dibaca oleh welcome.blade.php.
                localStorage.setItem('arum_galeri_albums_shared', serializedAlbums);
                // Key lama tetap disinkronkan agar alur lama tetap kompatibel.
                localStorage.setItem('arum_galeri_albums', serializedAlbums);
                return true;
            } catch (error) {
                console.error('Gagal menyimpan galeri dokumentasi:', error);
                showNotification(
                    'Foto terlalu besar atau penyimpanan browser penuh. Silakan pilih foto lain yang lebih kecil.',
                    'error'
                );
                return false;
            }
        }

        function saveCategoryAlbum() {
            const id = document.getElementById('editCategoryId').value;
            const title = document.getElementById('catTitle').value.trim();
            const desc = document.getElementById('catDesc').value.trim();
            const coverInput = document.getElementById('catCoverInput');

            if (!title || !desc) {
                showNotification('Mohon lengkapi Judul dan Deskripsi Album!', 'error');
                return;
            }

            let albums = getDocumentationAlbums();

            const saveProcess = (coverData) => {
                if (id) {
                    const idx = albums.findIndex(a => a.id === id);

                    if (idx >= 0) {
                        albums[idx].title = title;
                        albums[idx].desc = desc;

                        if (coverData) {
                            albums[idx].cover = coverData;
                            albums[idx].cover_is_custom = true;
                        }
                    }
                } else {
                    const newAlb = {
                        id: 'alb_' + Date.now(),
                        title: title,
                        desc: desc,
                        cover: coverData || 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb0?w=500&auto=format&fit=crop&q=60',
                        cover_is_custom: !!coverData,
                        photos: []
                    };

                    albums.unshift(newAlb);
                }

                if (!saveDocumentationAlbums(albums)) {
                    return;
                }

                const editorModalEl = document.getElementById('categoryEditorModal');
                const editorModalInstance = bootstrap.Modal.getInstance(editorModalEl);

                if (editorModalInstance) {
                    editorModalInstance.hide();
                }

                openDokumentasiModal();
                showNotification('Kategori album berhasil disimpan!', 'success');

                coverInput.value = "";
            };

            if (coverInput.files && coverInput.files[0]) {
                compressDocumentationImage(coverInput.files[0], 1400, 1000, 0.78)
                    .then(saveProcess)
                    .catch(error => {
                        console.error(error);
                        showNotification('Foto sampul gagal diproses. Silakan pilih file gambar lain.', 'error');
                    });
            } else {
                saveProcess(null);
            }
        }

        function deleteCategoryAlbum(id) {
            let albums = getDocumentationAlbums();
            if (confirm("Apakah Anda yakin ingin menghapus kategori album ini beserta seluruh foto di dalamnya?")) {
                albums = albums.filter(a => a.id !== id);
                saveDocumentationAlbums(albums);
                renderAlbumGrid();
                showNotification('Kategori album berhasil dihapus!', 'success');
            }
        }

        function openAlbumDetail(id) {
            activeAlbumId = id;
            const albums = getDocumentationAlbums();
            const alb = albums.find(a => a.id === id);
            if (!alb) return;

            document.getElementById('albumDetailTitle').innerHTML = `<i class="fa-solid fa-folder-open me-2"></i> ${alb.title}`;
            document.getElementById('albumDetailDesc').textContent = alb.desc;

            renderPhotoGrid(alb);

            const mainModalEl = document.getElementById('dokumentasiModal');
            const mainModalInstance = bootstrap.Modal.getInstance(mainModalEl);
            if (mainModalInstance) mainModalInstance.hide();

            const detailModalEl = document.getElementById('albumDetailModal');
            let detailModalInstance = bootstrap.Modal.getInstance(detailModalEl);
            if (!detailModalInstance) {
                detailModalInstance = new bootstrap.Modal(detailModalEl);
            }
            detailModalInstance.show();
        }

        function renderPhotoGrid(alb) {
            const container = document.getElementById('photoGridContainer');
            if (!alb.photos || alb.photos.length === 0) {
                container.innerHTML = `
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fa-solid fa-image fs-1 mb-2 d-block opacity-50"></i>
                        Belum ada foto di dalam album ini. Klik "+ Tambah Foto" untuk mengunggah.
                    </div>
                `;
                return;
            }

            let html = '';
            alb.photos.forEach((photoUrl, photoIdx) => {
                html += `
                    <div class="col-md-4 col-lg-3">
                        <div class="gallery-photo-card">
                            <img src="${photoUrl}" alt="Foto ${photoIdx + 1}">
                            <div class="photo-actions-overlay">
                                <input type="file" id="changePhotoInput_${photoIdx}" accept="image/*" class="d-none" onchange="replacePhotoInAlbum(event, ${photoIdx})">
                                <button class="btn btn-sm btn-light text-primary rounded-circle p-1 px-2 fs-8" onclick="document.getElementById('changePhotoInput_${photoIdx}').click()" title="Ganti Foto">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </button>
                                <button class="btn btn-sm btn-danger rounded-circle p-1 px-2 fs-8" onclick="deletePhotoFromAlbum(${photoIdx})" title="Hapus Foto">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
            container.innerHTML = html;
        }

        function uploadNewPhotoToAlbum(event) {
            const input = event.target;
            const file = input.files && input.files[0];

            if (!file) return;

            if (!activeAlbumId) {
                input.value = "";
                showNotification('Album belum dipilih. Silakan buka album terlebih dahulu.', 'error');
                return;
            }

            compressDocumentationImage(file, 1600, 1200, 0.78)
                .then(photoData => {
                    let albums = getDocumentationAlbums();
                    const idx = albums.findIndex(a => a.id === activeAlbumId);

                    if (idx < 0) {
                        throw new Error('Album tidak ditemukan.');
                    }

                    if (!albums[idx].photos) {
                        albums[idx].photos = [];
                    }

                    albums[idx].photos.unshift(photoData);

                    // Jika album belum mempunyai sampul custom, foto pertama menjadi sampul.
                    if (!albums[idx].cover_is_custom) {
                        albums[idx].cover = photoData;
                    }

                    if (!saveDocumentationAlbums(albums)) {
                        return;
                    }

                    renderPhotoGrid(albums[idx]);
                    renderAlbumGrid();

                    input.value = "";
                    showNotification('Foto baru berhasil ditambahkan!', 'success');
                })
                .catch(error => {
                    console.error(error);
                    input.value = "";
                    showNotification('Foto gagal ditambahkan. Silakan pilih foto lain.', 'error');
                });
        }

        function replacePhotoInAlbum(event, photoIdx) {
            const input = event.target;
            const file = input.files && input.files[0];

            if (!file || !activeAlbumId) {
                input.value = "";
                return;
            }

            compressDocumentationImage(file, 1600, 1200, 0.78)
                .then(photoData => {
                    let albums = getDocumentationAlbums();
                    const idx = albums.findIndex(a => a.id === activeAlbumId);

                    if (idx >= 0 && albums[idx].photos && albums[idx].photos[photoIdx] !== undefined) {
                        albums[idx].photos[photoIdx] = photoData;

                        if (!saveDocumentationAlbums(albums)) {
                            return;
                        }

                        renderPhotoGrid(albums[idx]);
                        renderAlbumGrid();
                        input.value = "";
                        showNotification('Foto berhasil diganti!', 'success');
                    } else {
                        input.value = "";
                        showNotification('Foto yang akan diganti tidak ditemukan.', 'error');
                    }
                })
                .catch(error => {
                    console.error(error);
                    input.value = "";
                    showNotification('Foto gagal diproses. Silakan pilih file gambar lain.', 'error');
                });
        }

        function deletePhotoFromAlbum(photoIdx) {
            if (!activeAlbumId) return;
            let albums = getDocumentationAlbums();
            const idx = albums.findIndex(a => a.id === activeAlbumId);

            if (idx >= 0 && confirm("Apakah Anda yakin ingin menghapus foto ini?")) {
                albums[idx].photos.splice(photoIdx, 1);
                saveDocumentationAlbums(albums);
                renderPhotoGrid(albums[idx]);
                showNotification('Foto berhasil dihapus!', 'success');
            }
        }

        function backToAlbumList() {
            const detailModalEl = document.getElementById('albumDetailModal');
            const detailModalInstance = bootstrap.Modal.getInstance(detailModalEl);
            if (detailModalInstance) detailModalInstance.hide();

            openDokumentasiModal();
        }

        /* --- DETEKSI LOKASI ASLI PERANGKAT (GPS) --- */
        function detectRealGPSLocation() {
            const locationInput = document.getElementById('absenLokasi');
            locationInput.value = "Mendeteksi lokasi asli Anda...";

            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const lat = position.coords.latitude.toFixed(5);
                        const lng = position.coords.longitude.toFixed(5);
                        currentRealLocation = `Barepan, Klaten (${lat}, ${lng})`;
                        locationInput.value = currentRealLocation;
                    },
                    (error) => {
                        console.warn("GPS permission error:", error);
                        currentRealLocation = "Blok KPK Barepan (GPS Aktif)";
                        locationInput.value = currentRealLocation;
                    },
                    { enableHighAccuracy: true, timeout: 8000, maximumAge: 0 }
                );
            } else {
                currentRealLocation = "Blok KPK Barepan (GPS Aktif)";
                locationInput.value = currentRealLocation;
            }
        }

        /* --- LOGIKA ABSENSI DIGITAL --- */
        function openAbsensiModal() {
            const displayName = (currentUserData.nama && currentUserData.nama !== "undefined") ? currentUserData.nama : authUserName;
            document.getElementById('absenNama').value = displayName;
            document.getElementById('absenSuccessAlert').classList.add('d-none');
            
            const now = new Date();
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            document.getElementById('currentMonthYearBadge').textContent = `${monthNames[now.getMonth()]} ${now.getFullYear()}`;

            detectRealGPSLocation();
            renderMonthlyAbsenWidget();

            const modal = new bootstrap.Modal(document.getElementById('absensiModal'));
            modal.show();
            startWebcam();
        }

        function startWebcam() {
            const videoElement = document.getElementById('webcamVideo');
            const placeholder = document.getElementById('camPlaceholder');

            if (!videoElement || !placeholder) return;

            // Pastikan tidak ada stream lama yang masih menempel.
            if (mediaStream) {
                mediaStream.getTracks().forEach(track => track.stop());
                mediaStream = null;
            }

            videoElement.srcObject = null;
            placeholder.innerHTML = `<i class="fa-solid fa-camera-rotate fs-2 mb-2 d-block"></i> Kamera Aktif`;
            placeholder.style.display = 'block';

            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: { width: 640, height: 480 } })
                .then(stream => {
                    mediaStream = stream;
                    videoElement.srcObject = stream;
                    videoElement.play().catch(() => {});
                    placeholder.style.display = 'none';
                })
                .catch(err => {
                    console.warn("Kamera tidak diizinkan atau tidak tersedia:", err);
                    placeholder.innerHTML = `<i class="fa-solid fa-triangle-exclamation fs-3 mb-1 d-block"></i> Kamera tidak aktif/tidak diizinkan`;
                    placeholder.style.display = 'block';
                });
            } else {
                placeholder.innerHTML = `<i class="fa-solid fa-triangle-exclamation fs-3 mb-1 d-block"></i> Browser tidak mendukung kamera`;
            }
        }

        function stopWebcam() {
            if (mediaStream) {
                mediaStream.getTracks().forEach(track => track.stop());
                mediaStream = null;
            }
        }

        function compressAbsensiSnapshot(dataUrl, maxWidth = 720, maxHeight = 540, quality = 0.72) {
            return new Promise((resolve, reject) => {
                if (!dataUrl) {
                    resolve("");
                    return;
                }

                const img = new Image();

                img.onload = function() {
                    let width = img.naturalWidth || img.width;
                    let height = img.naturalHeight || img.height;

                    const scale = Math.min(
                        1,
                        maxWidth / width,
                        maxHeight / height
                    );

                    width = Math.max(1, Math.round(width * scale));
                    height = Math.max(1, Math.round(height * scale));

                    const outputCanvas = document.createElement('canvas');
                    outputCanvas.width = width;
                    outputCanvas.height = height;

                    const ctx = outputCanvas.getContext('2d');

                    if (!ctx) {
                        reject(new Error('Canvas foto tidak tersedia.'));
                        return;
                    }

                    ctx.drawImage(img, 0, 0, width, height);

                    // Simpan sebagai JPEG agar foto tidak terlalu besar untuk localStorage.
                    const compressed = outputCanvas.toDataURL('image/jpeg', quality);

                    if (!compressed || compressed === 'data:,') {
                        reject(new Error('Foto gagal dikompres.'));
                        return;
                    }

                    resolve(compressed);
                };

                img.onerror = function() {
                    reject(new Error('Snapshot kamera gagal dibaca.'));
                };

                img.src = dataUrl;
            });
        }

        function submitAbsensi() {
            const video = document.getElementById('webcamVideo');
            const canvas = document.getElementById('snapshotCanvas');
            const keteranganInput = document.getElementById('absenKeterangan');
            const lokasiInput = document.getElementById('absenLokasi');

            // Keterangan dipilih terlebih dahulu sebelum absensi disimpan.
            const keterangan = keteranganInput ? keteranganInput.value.trim() : '';

            if (!keterangan) {
                showNotification('Silakan pilih keterangan kehadiran terlebih dahulu.', 'error');
                return;
            }

            let snapshotDataUrl = "";

            // Ambil foto dari kamera saat tombol "Ambil Absen Sekarang" ditekan.
            if (video && video.videoWidth > 0 && canvas) {
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;

                const ctx = canvas.getContext('2d');

                if (ctx) {
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    snapshotDataUrl = canvas.toDataURL('image/jpeg', 0.78);
                }
            }

            if (!snapshotDataUrl) {
                showNotification('Foto kamera belum tersedia. Pastikan kamera aktif sebelum mengambil absen.', 'error');
                return;
            }

            const now = new Date();
            const dateStr = now.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            const timeStr = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            }) + " WIB";

            const monthKey =
                `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}`;

            const validNama =
                (currentUserData.nama && currentUserData.nama !== "undefined")
                    ? currentUserData.nama
                    : authUserName;

            const newRecord = {
                nama_anggota: validNama,
                email: currentUserData.email,
                rt: currentUserData.rt,
                tanggal: dateStr,
                jam: timeStr,
                lokasi: (lokasiInput && lokasiInput.value)
                    ? lokasiInput.value
                    : currentRealLocation,
                keterangan: keterangan,
                snapshot_foto: snapshotDataUrl,
                month_key: monthKey,
                timestamp: now.getTime()
            };

            /*
             * PENYIMPANAN 1:
             * Riwayat absensi permanen pada sisi aplikasi.
             */
            let dbAbsen = JSON.parse(localStorage.getItem('arum_db_absensi')) || [];
            dbAbsen.unshift(newRecord);

            /*
             * PENYIMPANAN 2:
             * Riwayat absensi berdasarkan bulan untuk widget
             * "Riwayat Absensi Bulan Ini".
             */
            let widgetAbsen =
                JSON.parse(localStorage.getItem('arum_widget_absensi')) || {};

            if (!widgetAbsen[monthKey]) {
                widgetAbsen[monthKey] = [];
            }

            widgetAbsen[monthKey].unshift(newRecord);

            try {
                localStorage.setItem('arum_db_absensi', JSON.stringify(dbAbsen));
                localStorage.setItem('arum_widget_absensi', JSON.stringify(widgetAbsen));
            } catch (error) {
                console.error('Gagal menyimpan data absensi:', error);
                showNotification(
                    'Data absensi gagal disimpan. Penyimpanan browser penuh.',
                    'error'
                );
                return;
            }

            document.getElementById('absenSuccessAlert').classList.remove('d-none');

            showNotification(
                'Absensi berhasil direkam. Foto tersimpan di riwayat absensi.',
                'success'
            );

            // Perbarui dua tampilan setelah data berhasil disimpan.
            renderMonthlyAbsenWidget();

            const permanentTable =
                document.getElementById('permanentAbsenTableBody');

            if (permanentTable) {
                populateAbsenMonthYearFilter();
                renderPermanentAbsenTable();
            }

            // Kamera TETAP aktif setelah absensi berhasil agar pengguna
            // dapat melakukan absensi berikutnya tanpa layar menjadi hitam.
            // Stream hanya dihentikan ketika modal absensi ditutup.
            if (!mediaStream) {
                startWebcam();
            }

            setTimeout(() => {
                document.getElementById('absenSuccessAlert').classList.add('d-none');
            }, 5000);
        }

        function renderMonthlyAbsenWidget() {
            const now = new Date();
            const monthKey = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}`;
            let widgetAbsen = JSON.parse(localStorage.getItem('arum_widget_absensi')) || {};
            const currentMonthRecords = widgetAbsen[monthKey] || [];
            const tbody = document.getElementById('monthlyAbsenWidgetTable');

            if (currentMonthRecords.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5" class="text-center py-3 text-muted fs-8">Belum ada riwayat absensi pada bulan ini.</td></tr>`;
                return;
            }

            let html = '';
            currentMonthRecords.forEach(r => {
                const fotoImg = r.snapshot_foto ? `<img src="${r.snapshot_foto}" alt="Foto" style="width: 50px; height: 38px; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;">` : `<i class="fa-solid fa-user text-secondary fs-5"></i>`;
                html += `
                    <tr>
                        <td class="ps-3">${fotoImg}</td>
                        <td class="fw-bold">${r.tanggal}</td>
                        <td><span class="badge bg-light text-dark border">${r.jam}</span></td>
                        <td>${r.lokasi}</td>
                        <td><span class="badge bg-success px-2 py-1">${r.keterangan}</span></td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
        }

        /* --- RIWAYAT ABSENSI KHUSUS PENGURUS --- */
        function openRiwayatAbsensiModal() {
            if (!isPengurusIntiUser()) {
                showNotification('Akses Ditolak! Fitur Riwayat Absensi khusus bagi Pengurus Inti.', 'error');
                return;
            }
            populateAbsenMonthYearFilter();
            renderPermanentAbsenTable();
            const modal = new bootstrap.Modal(document.getElementById('riwayatAbsensiModal'));
            modal.show();
        }

        function populateAbsenMonthYearFilter() {
            const select = document.getElementById('filterAbsenMonthYear');
            const dbAbsen = JSON.parse(localStorage.getItem('arum_db_absensi')) || [];
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            
            const periods = new Set();
            const now = new Date();
            const currentMonthKey = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}`;
            periods.add(currentMonthKey);

            dbAbsen.forEach(item => {
                if (item.month_key) {
                    periods.add(item.month_key);
                }
            });

            let optionsHtml = `<option value="ALL">Semua Periode</option>`;
            Array.from(periods).sort().reverse().forEach(key => {
                const parts = key.split('-');
                if (parts.length === 2) {
                    const year = parts[0];
                    const monthIdx = parseInt(parts[1]) - 1;
                    const label = `${monthNames[monthIdx]} ${year}`;
                    optionsHtml += `<option value="${key}" ${key === currentMonthKey ? 'selected' : ''}>${label}</option>`;
                }
            });

            select.innerHTML = optionsHtml;
        }

        function renderPermanentAbsenTable() {
            const dbAbsen = JSON.parse(localStorage.getItem('arum_db_absensi')) || [];
            const filterKey = document.getElementById('filterAbsenMonthYear').value;
            const tbody = document.getElementById('permanentAbsenTableBody');

            let filteredRecords = dbAbsen;
            if (filterKey && filterKey !== "ALL") {
                filteredRecords = dbAbsen.filter(item => {
                    if (item.month_key) return item.month_key === filterKey;
                    return true;
                });
            }

            document.getElementById('totalAbsenCountBadge').textContent = `Total Kehadiran: ${filteredRecords.length}`;

            if (filteredRecords.length === 0) {
                tbody.innerHTML = `<tr><td colspan="9" class="text-center py-4 text-muted fs-7">Belum ada data kehadiran pada periode bulan/tahun yang dipilih.</td></tr>`;
                return;
            }

            let html = '';
            filteredRecords.forEach((item, idx) => {
                const realIndex = dbAbsen.indexOf(item);
                const displayName = (item.nama_anggota && item.nama_anggota !== "undefined") ? item.nama_anggota : authUserName;
                
                html += `
                    <tr>
                        <td class="ps-3 fw-bold text-muted">${idx + 1}</td>
                        <td class="fw-bold text-dark">${displayName}</td>
                        <td>${item.rt || 'RT 01 / RW 01'}</td>
                        <td>${item.tanggal}</td>
                        <td><span class="badge bg-light text-dark border">${item.jam}</span></td>
                        <td>
                            ${item.snapshot_foto
                                ? `<img src="${item.snapshot_foto}" alt="Foto Absensi" style="width:55px;height:42px;object-fit:cover;border-radius:7px;border:1px solid #cbd5e1;">`
                                : `<i class="fa-solid fa-user text-secondary fs-5"></i>`
                            }
                        </td>
                        <td>${item.lokasi || 'GPS Aktif'}</td>
                        <td><span class="badge bg-success px-2 py-1 fs-8">${item.keterangan}</span></td>
                        <td class="text-center no-print">
                            <button class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1" onclick="deleteAbsenRecord(${realIndex})" title="Hapus Data">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
        }

        function deleteAbsenRecord(originalIndex) {
            let dbAbsen = JSON.parse(localStorage.getItem('arum_db_absensi')) || [];

            if (originalIndex < 0 || originalIndex >= dbAbsen.length) {
                showNotification("Data absensi tidak ditemukan.", "error");
                return;
            }

            if (!confirm("Apakah Anda yakin ingin menghapus data riwayat absensi ini?")) {
                return;
            }

            const targetDeleted = dbAbsen[originalIndex];

            // 1. Hapus dari riwayat keseluruhan/permanen.
            dbAbsen.splice(originalIndex, 1);
            localStorage.setItem('arum_db_absensi', JSON.stringify(dbAbsen));

            // 2. Hapus juga record yang sama dari riwayat absensi bulan ini.
            //    Timestamp dipakai sebagai ID unik karena setiap absensi
            //    dibuat dengan Date.now().
            let widgetAbsen = JSON.parse(localStorage.getItem('arum_widget_absensi')) || {};
            const monthKey = targetDeleted && targetDeleted.month_key
                ? targetDeleted.month_key
                : null;

            if (monthKey && Array.isArray(widgetAbsen[monthKey])) {
                widgetAbsen[monthKey] = widgetAbsen[monthKey].filter(w => {
                    if (targetDeleted.timestamp && w.timestamp) {
                        return w.timestamp !== targetDeleted.timestamp;
                    }

                    // Fallback untuk data lama yang belum mempunyai timestamp.
                    return !(
                        w.tanggal === targetDeleted.tanggal &&
                        w.jam === targetDeleted.jam &&
                        w.nama_anggota === targetDeleted.nama_anggota &&
                        w.lokasi === targetDeleted.lokasi
                    );
                });

                // Bersihkan key bulan jika sudah kosong.
                if (widgetAbsen[monthKey].length === 0) {
                    delete widgetAbsen[monthKey];
                }
            }

            localStorage.setItem('arum_widget_absensi', JSON.stringify(widgetAbsen));

            // 3. Render ulang kedua tampilan agar perubahan langsung terlihat.
            populateAbsenMonthYearFilter();
            renderPermanentAbsenTable();
            renderMonthlyAbsenWidget();

            showNotification("Data riwayat absensi berhasil dihapus dari riwayat keseluruhan dan riwayat bulan ini!", "success");
        }

        /* --- PEMBAYARAN KAS & SIGNATURE PAD --- */
        function openKasModal() {
            document.getElementById('kasNama').value = currentUserData.nama;
            document.getElementById('kasRt').value = currentUserData.rt;
            document.getElementById('kasNominal').value = "";
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('kasTanggalIuran').value = today;

            clearSignatureCanvas();
            const kasModal = new bootstrap.Modal(document.getElementById('kasPaymentModal'));
            kasModal.show();
            setTimeout(resizeSignatureCanvas, 300);
        }

        function initSignaturePad() {
            const canvas = document.getElementById('signatureCanvas');
            if (!canvas) return;
            canvasCtx = canvas.getContext('2d');

            const startDraw = (e) => {
                isDrawing = true;
                canvasCtx.beginPath();
                const rect = canvas.getBoundingClientRect();
                const clientX = e.clientX || (e.touches && e.touches[0].clientX);
                const clientY = e.clientY || (e.touches && e.touches[0].clientY);
                canvasCtx.moveTo(clientX - rect.left, clientY - rect.top);
            };

            const draw = (e) => {
                if (!isDrawing) return;
                const rect = canvas.getBoundingClientRect();
                const clientX = e.clientX || (e.touches && e.touches[0].clientX);
                const clientY = e.clientY || (e.touches && e.touches[0].clientY);
                canvasCtx.lineTo(clientX - rect.left, clientY - rect.top);
                canvasCtx.strokeStyle = '#0f172a';
                canvasCtx.lineWidth = 2.5;
                canvasCtx.lineCap = 'round';
                canvasCtx.stroke();
            };

            const stopDraw = () => { isDrawing = false; };

            canvas.addEventListener('mousedown', startDraw);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mouseup', stopDraw);
            canvas.addEventListener('mouseleave', stopDraw);
            canvas.addEventListener('touchstart', startDraw);
            canvas.addEventListener('touchmove', draw);
            canvas.addEventListener('touchend', stopDraw);
        }

        function resizeSignatureCanvas() {
            const canvas = document.getElementById('signatureCanvas');
            if (!canvas) return;
            canvas.width = canvas.parentElement.clientWidth;
            canvas.height = 150;
        }

        function clearSignatureCanvas() {
            if (!canvasCtx) return;
            const canvas = document.getElementById('signatureCanvas');
            canvasCtx.clearRect(0, 0, canvas.width, canvas.height);
        }

        function submitKasPayment() {
            const nama = document.getElementById('kasNama').value.trim();
            const rt = document.getElementById('kasRt').value;
            const tanggalIuranVal = document.getElementById('kasTanggalIuran').value;
            const nominal = parseInt(document.getElementById('kasNominal').value);
            const canvas = document.getElementById('signatureCanvas');

            if (!nama || !tanggalIuranVal || isNaN(nominal)) {
                showNotification('Gagal! Nama, Tanggal/Bulan Iuran, dan Nominal wajib diisi.', 'error');
                return;
            }

            if (nominal < 10000) {
                showNotification('Peringatan! Minimal nominal pembayaran iuran kas adalah Rp 10.000.', 'error');
                return;
            }

            const dateObj = new Date(tanggalIuranVal);
            const formattedTglIuran = dateObj.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
            const ttdDataUrl = canvas.toDataURL('image/png');

            let kasHistory = JSON.parse(localStorage.getItem('arum_kas_history')) || [];
            const newKas = {
                nama: nama,
                rt: rt,
                tanggal_iuran: formattedTglIuran,
                tanggal_iuran_iso: tanggalIuranVal,
                nominal: nominal,
                ttd: ttdDataUrl,
                tanggal_transaksi: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) + " pukul " + new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })
            };

            kasHistory.unshift(newKas);
            localStorage.setItem('arum_kas_history', JSON.stringify(kasHistory));

            bootstrap.Modal.getInstance(document.getElementById('kasPaymentModal')).hide();
            showNotification(`Pembayaran kas iuran ${formattedTglIuran} sebesar Rp ${nominal.toLocaleString('id-ID')} berhasil tersimpan!`, 'success');
        }

        function openRekapKasModal() {
            if (!isPengurusIntiUser()) {
                showNotification('Akses Ditolak! Fitur Rekap Kas khusus bagi Pengurus Inti.', 'error');
                return;
            }
            renderKasHistoryTable();
            const modal = new bootstrap.Modal(document.getElementById('rekapKasModal'));
            modal.show();
        }

        function renderKasHistoryTable() {
            const kasHistory = JSON.parse(localStorage.getItem('arum_kas_history')) || [];
            const tbody = document.getElementById('kasHistoryTableBody');
            let total = 0;

            if (kasHistory.length === 0) {
                tbody.innerHTML = `<tr><td colspan="8" class="text-center py-4 text-muted fs-7">Belum ada riwayat pembayaran kas yang tercatat.</td></tr>`;
                document.getElementById('totalKasCollected').textContent = `Total Terkumpul: Rp 0`;
                return;
            }

            let html = '';
            kasHistory.forEach((item, idx) => {
                total += item.nominal;
                html += `
                    <tr>
                        <td class="ps-3 fw-bold text-muted">${idx + 1}</td>
                        <td class="fw-bold text-dark">${item.nama}</td>
                        <td>${item.rt}</td>
                        <td><span class="badge bg-light text-dark border">${item.tanggal_iuran || '-'}</span></td>
                        <td class="fw-bold text-success">Rp ${item.nominal.toLocaleString('id-ID')}</td>
                        <td class="fs-8 text-muted">${item.tanggal_transaksi || '-'}</td>
                        <td class="text-center">
                            <img src="${item.ttd}" alt="TTD" style="max-height: 38px; max-width: 90px; border: 1px solid #e2e8f0; border-radius: 6px; background: #fff;">
                        </td>
                        <td class="text-center no-print">
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 me-1" onclick="editKasTransaction(${idx})" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1" onclick="deleteKasTransaction(${idx})" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
            document.getElementById('totalKasCollected').textContent = `Total Terkumpul: Rp ${total.toLocaleString('id-ID')}`;
        }

        function editKasTransaction(index) {
            let kasHistory = JSON.parse(localStorage.getItem('arum_kas_history')) || [];
            const target = kasHistory[index];
            if (!target) return;

            document.getElementById('editKasIndex').value = index;
            document.getElementById('editKasNama').value = target.nama;
            document.getElementById('editKasRt').value = target.rt;
            document.getElementById('editKasTanggalIuran').value = target.tanggal_iuran;
            document.getElementById('editKasNominal').value = target.nominal;

            const editModal = new bootstrap.Modal(document.getElementById('editKasModal'));
            editModal.show();
        }

        function saveEditedKasTransaction() {
            const index = parseInt(document.getElementById('editKasIndex').value);
            const nama = document.getElementById('editKasNama').value.trim();
            const rt = document.getElementById('editKasRt').value;
            const tanggalIuran = document.getElementById('editKasTanggalIuran').value.trim();
            const nominal = parseInt(document.getElementById('editKasNominal').value);

            if (!nama || !tanggalIuran || isNaN(nominal) || nominal < 10000) {
                showNotification('Validasi gagal! Minimal nominal Rp 10.000.', 'error');
                return;
            }

            let kasHistory = JSON.parse(localStorage.getItem('arum_kas_history')) || [];
            if (kasHistory[index]) {
                kasHistory[index].nama = nama;
                kasHistory[index].rt = rt;
                kasHistory[index].tanggal_iuran = tanggalIuran;
                const parsedEditedDate = new Date(tanggalIuran);
                if (!isNaN(parsedEditedDate.getTime())) kasHistory[index].tanggal_iuran_iso = parsedEditedDate.toISOString().split('T')[0];
                kasHistory[index].nominal = nominal;

                localStorage.setItem('arum_kas_history', JSON.stringify(kasHistory));
                renderKasHistoryTable();
                bootstrap.Modal.getInstance(document.getElementById('editKasModal')).hide();
                showNotification(`Data kas berhasil diperbarui!`, 'success');
            }
        }

        function deleteKasTransaction(index) {
            let kasHistory = JSON.parse(localStorage.getItem('arum_kas_history')) || [];
            if (confirm(`Yakin ingin menghapus data kas ini?`)) {
                kasHistory.splice(index, 1);
                localStorage.setItem('arum_kas_history', JSON.stringify(kasHistory));
                renderKasHistoryTable();
                showNotification(`Data kas berhasil dihapus.`, 'success');
            }
        }

        /* --- TRANSPARANSI KEUANGAN --- */
        const FINANCE_EXPENSE_KEY = 'arum_keuangan_pengeluaran';
        const FINANCE_INCOME_KEY = 'arum_keuangan_pemasukan';
        function getFinanceExpenses(){try{const d=JSON.parse(localStorage.getItem(FINANCE_EXPENSE_KEY))||[];return Array.isArray(d)?d:[];}catch(e){return[];}}
        function saveFinanceExpenses(d){localStorage.setItem(FINANCE_EXPENSE_KEY,JSON.stringify(d));}
        function getFinanceIncomes(){try{const d=JSON.parse(localStorage.getItem(FINANCE_INCOME_KEY))||[];return Array.isArray(d)?d:[];}catch(e){return[];}}
        function saveFinanceIncomes(d){localStorage.setItem(FINANCE_INCOME_KEY,JSON.stringify(d));}
        function financeDateKey(date=new Date()){const y=date.getFullYear(),m=String(date.getMonth()+1).padStart(2,'0'),d=String(date.getDate()).padStart(2,'0');return `${y}-${m}-${d}`;}
        function parseKasDateKey(item){if(item?.tanggal_iuran_iso&&/^\d{4}-\d{2}-\d{2}$/.test(item.tanggal_iuran_iso))return item.tanggal_iuran_iso;const raw=String(item?.tanggal_iuran||'').trim(),months={januari:0,februari:1,maret:2,april:3,mei:4,juni:5,juli:6,agustus:7,september:8,oktober:9,november:10,desember:11},m=raw.match(/^(\d{1,2})\s+([A-Za-z]+)\s+(\d{4})$/i);if(!m)return null;const mo=months[m[2].toLowerCase()];if(mo===undefined)return null;const dt=new Date(+m[3],mo,+m[1]);return isNaN(dt.getTime())?null:financeDateKey(dt);}
        function parseDonationDateKey(item){const raw=String(item?.tanggal||'').trim();const months={januari:0,februari:1,maret:2,april:3,mei:4,juni:5,juli:6,agustus:7,september:8,oktober:9,november:10,desember:11},m=raw.match(/^(\d{1,2})\s+([A-Za-z]+)\s+(\d{4})/i);if(!m)return null;const mo=months[m[2].toLowerCase()];if(mo===undefined)return null;const dt=new Date(+m[3],mo,+m[1]);return isNaN(dt.getTime())?null:financeDateKey(dt);}
        function financeFormatDate(k){const dt=new Date(`${k}T00:00:00`);return !k||isNaN(dt.getTime())?'-':dt.toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric'});}
        function financeRp(v){return `Rp ${Number(v||0).toLocaleString('id-ID')}`;}
        function financeEscape(v){return String(v??'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#039;');}
        function getFinanceSummary(){
            let kas=[],donasi=[];try{kas=JSON.parse(localStorage.getItem('arum_kas_history'))||[];}catch(e){}try{donasi=JSON.parse(localStorage.getItem('arum_donasi_alumni_history'))||[];}catch(e){}
            const manualIncome=getFinanceIncomes(),exp=getFinanceExpenses(),income={},expense={},incomeSources={};
            const addIncome=(k,a,source)=>{if(!k||!Number.isFinite(a)||a<=0)return;income[k]=(income[k]||0)+a;if(!incomeSources[k])incomeSources[k]=[];incomeSources[k].push({source,amount:a});};
            kas.forEach(x=>addIncome(parseKasDateKey(x),Number(x?.nominal||0),'Kas'));donasi.forEach(x=>addIncome(parseDonationDateKey(x),Number(x?.nominal||0),'Donasi Alumni/Senior'));manualIncome.forEach(x=>addIncome(x?.tanggal,Number(x?.nominal||0),'Manual'));
            exp.forEach(x=>{const k=x?.tanggal,a=Number(x?.nominal||0);if(k&&a>0)expense[k]=(expense[k]||0)+a;});
            const dates=[...new Set([...Object.keys(income),...Object.keys(expense)])].sort();let running=0;const daily=dates.map(k=>{const i=income[k]||0,e=expense[k]||0,n=i-e;running+=n;return{dateKey:k,income:i,expense:e,net:n,runningBalance:running};});
            return{income,expense,daily,totalIncome:Object.values(income).reduce((a,b)=>a+b,0),totalExpense:Object.values(expense).reduce((a,b)=>a+b,0),incomeSources};
        }
        function openTransparansiKeuanganModal(){if(!isPengurusIntiUser()){showNotification('Akses Ditolak! Fitur Transparansi Keuangan khusus bagi Pengurus Inti.','error');return;}renderFinanceTable();bootstrap.Modal.getOrCreateInstance(document.getElementById('transparansiKeuanganModal')).show();}
        function renderFinanceTable(){
            const s=getFinanceSummary(),exp=getFinanceExpenses(),inc=getFinanceIncomes(),f=document.getElementById('financeDateFilter')?.value||'';const ti=f?(s.income[f]||0):s.totalIncome,te=f?(s.expense[f]||0):s.totalExpense;
            document.getElementById('financeTotalIncome').textContent=financeRp(ti);document.getElementById('financeTotalExpense').textContent=financeRp(te);document.getElementById('financeCurrentBalance').textContent=financeRp(ti-te);
            const rows=f?s.daily.filter(x=>x.dateKey===f):s.daily,body=document.getElementById('financeDailyTableBody');body.innerHTML=rows.length?rows.map(r=>`<tr><td class="ps-3 fw-semibold">${financeFormatDate(r.dateKey)}</td><td class="fw-bold text-success">${financeRp(r.income)}</td><td class="fw-bold text-danger">${financeRp(r.expense)}</td><td class="fw-bold ${r.net>=0?'text-success':'text-danger'}">${financeRp(r.net)}</td><td class="fw-bold text-primary">${financeRp(r.runningBalance)}</td></tr>`).join(''):`<tr><td colspan="5" class="text-center py-4 text-muted">Belum ada transaksi keuangan pada periode ini.</td></tr>`;
            const filteredInc=f?inc.filter(x=>x.tanggal===f):inc,ib=document.getElementById('financeIncomeTableBody');ib.innerHTML=filteredInc.length?filteredInc.map(x=>{const i=inc.indexOf(x);return`<tr><td class="ps-3 fw-semibold">${financeFormatDate(x.tanggal)}</td><td>${financeEscape(x.keterangan)}</td><td><span class="badge bg-light text-dark border">${financeEscape(x.kategori)}</span></td><td class="fw-bold text-success">${financeRp(x.nominal)}</td><td class="text-muted fs-8">${financeEscape(x.catatan||'-')}</td><td class="text-center no-print"><button class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 me-1" onclick="editFinanceIncome(${i})"><i class="fa-solid fa-pen-to-square"></i></button><button class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1" onclick="deleteFinanceIncome(${i})"><i class="fa-solid fa-trash"></i></button></td></tr>`}).join(''):`<tr><td colspan="6" class="text-center py-4 text-muted">Belum ada pemasukan manual.</td></tr>`;
            const filtered=f?exp.filter(x=>x.tanggal===f):exp,eb=document.getElementById('financeExpenseTableBody');eb.innerHTML=filtered.length?filtered.map(x=>{const i=exp.indexOf(x);return`<tr><td class="ps-3 fw-semibold">${financeFormatDate(x.tanggal)}</td><td>${financeEscape(x.keterangan)}</td><td><span class="badge bg-light text-dark border">${financeEscape(x.kategori)}</span></td><td class="fw-bold text-danger">${financeRp(x.nominal)}</td><td class="text-muted fs-8">${financeEscape(x.catatan||'-')}</td><td class="text-center no-print"><button class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 me-1" onclick="editFinanceExpense(${i})"><i class="fa-solid fa-pen-to-square"></i></button><button class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1" onclick="deleteFinanceExpense(${i})"><i class="fa-solid fa-trash"></i></button></td></tr>`}).join(''):`<tr><td colspan="6" class="text-center py-4 text-muted">Belum ada pengeluaran manual.</td></tr>`;
        }
        function openFinanceIncomeModal(index=-1){if(!isPengurusIntiUser()){showNotification('Akses Ditolak!','error');return;}document.getElementById('financeIncomeIndex').value=index;document.getElementById('financeIncomeModalTitle').innerHTML=index>=0?'<i class="fa-solid fa-pen-to-square me-2"></i> Edit Pemasukan':'<i class="fa-solid fa-circle-plus me-2"></i> Tambah Pemasukan';if(index>=0){const x=getFinanceIncomes()[index];if(!x)return;document.getElementById('financeIncomeDate').value=x.tanggal||financeDateKey();document.getElementById('financeIncomeDescription').value=x.keterangan||'';document.getElementById('financeIncomeCategory').value=x.kategori||'Lainnya';document.getElementById('financeIncomeAmount').value=x.nominal||'';document.getElementById('financeIncomeNote').value=x.catatan||'';}else{document.getElementById('financeIncomeForm').reset();document.getElementById('financeIncomeDate').value=financeDateKey();document.getElementById('financeIncomeCategory').value='Bantuan';}bootstrap.Modal.getOrCreateInstance(document.getElementById('financeIncomeModal')).show();}
        function saveFinanceIncome(){const i=+document.getElementById('financeIncomeIndex').value,tanggal=document.getElementById('financeIncomeDate').value,keterangan=document.getElementById('financeIncomeDescription').value.trim(),kategori=document.getElementById('financeIncomeCategory').value,nominal=Number(document.getElementById('financeIncomeAmount').value),catatan=document.getElementById('financeIncomeNote').value.trim();if(!tanggal||!keterangan||!kategori||!Number.isFinite(nominal)||nominal<=0){showNotification('Tanggal, keterangan, kategori, dan nominal wajib diisi.','error');return;}const d=getFinanceIncomes(),r={id:i>=0&&d[i]?.id?d[i].id:Date.now(),tanggal,keterangan,kategori,nominal,catatan};if(i>=0&&d[i])d[i]=r;else d.unshift(r);saveFinanceIncomes(d);renderFinanceTable();bootstrap.Modal.getInstance(document.getElementById('financeIncomeModal'))?.hide();showNotification(i>=0?'Pemasukan berhasil diperbarui.':'Pemasukan berhasil ditambahkan.','success');}
        function editFinanceIncome(i){openFinanceIncomeModal(i);}
        function deleteFinanceIncome(i){const d=getFinanceIncomes();if(!d[i])return;if(!confirm(`Hapus pemasukan "${d[i].keterangan}"?`))return;d.splice(i,1);saveFinanceIncomes(d);renderFinanceTable();showNotification('Pemasukan berhasil dihapus.','success');}
        function openFinanceExpenseModal(index=-1){if(!isPengurusIntiUser()){showNotification('Akses Ditolak!','error');return;}document.getElementById('financeExpenseIndex').value=index;document.getElementById('financeExpenseModalTitle').innerHTML=index>=0?'<i class="fa-solid fa-pen-to-square me-2"></i> Edit Pengeluaran':'<i class="fa-solid fa-money-bill-transfer me-2"></i> Tambah Pengeluaran';if(index>=0){const x=getFinanceExpenses()[index];if(!x)return;document.getElementById('financeExpenseDate').value=x.tanggal||financeDateKey();document.getElementById('financeExpenseDescription').value=x.keterangan||'';document.getElementById('financeExpenseCategory').value=x.kategori||'Lainnya';document.getElementById('financeExpenseAmount').value=x.nominal||'';document.getElementById('financeExpenseNote').value=x.catatan||'';}else{document.getElementById('financeExpenseForm').reset();document.getElementById('financeExpenseDate').value=financeDateKey();document.getElementById('financeExpenseCategory').value='Konsumsi';}bootstrap.Modal.getOrCreateInstance(document.getElementById('financeExpenseModal')).show();}
        function saveFinanceExpense(){const i=+document.getElementById('financeExpenseIndex').value,tanggal=document.getElementById('financeExpenseDate').value,keterangan=document.getElementById('financeExpenseDescription').value.trim(),kategori=document.getElementById('financeExpenseCategory').value,nominal=Number(document.getElementById('financeExpenseAmount').value),catatan=document.getElementById('financeExpenseNote').value.trim();if(!tanggal||!keterangan||!kategori||!Number.isFinite(nominal)||nominal<=0){showNotification('Tanggal, keterangan, kategori, dan nominal wajib diisi.','error');return;}const d=getFinanceExpenses(),r={id:i>=0&&d[i]?.id?d[i].id:Date.now(),tanggal,keterangan,kategori,nominal,catatan};if(i>=0&&d[i])d[i]=r;else d.unshift(r);saveFinanceExpenses(d);renderFinanceTable();bootstrap.Modal.getInstance(document.getElementById('financeExpenseModal'))?.hide();showNotification(i>=0?'Pengeluaran berhasil diperbarui.':'Pengeluaran berhasil ditambahkan.','success');}
        function editFinanceExpense(i){openFinanceExpenseModal(i);}
        function deleteFinanceExpense(i){const d=getFinanceExpenses();if(!d[i])return;if(!confirm(`Hapus pengeluaran "${d[i].keterangan}"?`))return;d.splice(i,1);saveFinanceExpenses(d);renderFinanceTable();showNotification('Pengeluaran berhasil dihapus.','success');}
        function clearFinanceDateFilter(){const e=document.getElementById('financeDateFilter');if(e)e.value='';renderFinanceTable();}
        function printFinanceReport(){
            const s=getFinanceSummary(),f=document.getElementById('financeDateFilter')?.value||'',rows=f?s.daily.filter(x=>x.dateKey===f):s.daily,inc=getFinanceIncomes().filter(x=>!f||x.tanggal===f),exp=getFinanceExpenses().filter(x=>!f||x.tanggal===f),ti=f?(s.income[f]||0):s.totalIncome,te=f?(s.expense[f]||0):s.totalExpense;
            const p=window.open('','_blank','width=1100,height=800');if(!p){showNotification('Pop-up diblokir browser. Izinkan pop-up untuk mencetak laporan.','error');return;}
            const rh=rows.length?rows.map(r=>`<tr><td>${financeFormatDate(r.dateKey)}</td><td class="income">${financeRp(r.income)}</td><td class="expense">${financeRp(r.expense)}</td><td class="${r.net>=0?'income':'expense'}">${financeRp(r.net)}</td><td class="balance">${financeRp(r.runningBalance)}</td></tr>`).join(''):'<tr><td colspan="5" class="empty">Tidak ada data.</td></tr>';
            const ih=inc.length?inc.map(x=>`<tr><td>${financeFormatDate(x.tanggal)}</td><td>${financeEscape(x.keterangan)}</td><td>${financeEscape(x.kategori)}</td><td class="income">${financeRp(x.nominal)}</td><td>${financeEscape(x.catatan||'-')}</td></tr>`).join(''):'<tr><td colspan="5" class="empty">Tidak ada pemasukan manual.</td></tr>';
            const eh=exp.length?exp.map(x=>`<tr><td>${financeFormatDate(x.tanggal)}</td><td>${financeEscape(x.keterangan)}</td><td>${financeEscape(x.kategori)}</td><td class="expense">${financeRp(x.nominal)}</td><td>${financeEscape(x.catatan||'-')}</td></tr>`).join(''):'<tr><td colspan="5" class="empty">Tidak ada pengeluaran manual.</td></tr>';
            p.document.write(`<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>Laporan Transparansi Keuangan</title><style>@page{size:A4 portrait;margin:12mm}*{box-sizing:border-box}body{font-family:Arial,Helvetica,sans-serif;margin:0;color:#172033;background:#f4f7fb;-webkit-print-color-adjust:exact;print-color-adjust:exact}.sheet{max-width:980px;margin:0 auto;background:#fff;min-height:100vh;padding:28px 30px}.kop{border-radius:16px;padding:22px 24px;background:linear-gradient(135deg,#0a66c2,#004182);color:#fff;position:relative;overflow:hidden}.kop:after{content:'';position:absolute;right:-60px;top:-80px;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,.10)}.kop h1{margin:0;font-size:23px;letter-spacing:.3px}.kop p{margin:7px 0 0;font-size:11px;opacity:.9}.period{margin-top:14px;padding:10px 13px;border-left:4px solid #0a66c2;background:#eef6ff;border-radius:8px;font-size:11px}.summary{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin:18px 0}.box{border-radius:12px;padding:15px;border:1px solid #dce5f0;box-shadow:0 4px 12px rgba(15,23,42,.05)}.box.green{background:#ecfdf3;border-color:#bbf7d0}.box.red{background:#fff1f2;border-color:#fecdd3}.box.blue{background:#eff6ff;border-color:#bfdbfe}.label{font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:.7px;color:#64748b}.value{font-size:18px;font-weight:800;margin-top:6px}.green .value{color:#15803d}.red .value{color:#dc2626}.blue .value{color:#1d4ed8}h2{font-size:14px;margin:22px 0 9px;color:#0f3f78;border-bottom:2px solid #dbeafe;padding-bottom:7px}table{width:100%;border-collapse:separate;border-spacing:0;overflow:hidden;border:1px solid #dbe3ee;border-radius:10px;margin-bottom:18px}th{background:#0a66c2;color:#fff;padding:9px 10px;font-size:9px;text-align:left;text-transform:uppercase;letter-spacing:.35px}td{padding:8px 10px;border-top:1px solid #e8edf3;font-size:9px}tr:nth-child(even) td{background:#f8fbff}.income{color:#15803d;font-weight:700}.expense{color:#dc2626;font-weight:700}.balance{color:#1d4ed8;font-weight:700}.empty{text-align:center;color:#64748b;padding:15px}.footer{margin-top:28px;border-top:1px solid #dbe3ee;padding-top:12px;display:flex;justify-content:space-between;font-size:9px;color:#64748b}@media print{body{background:#fff}.sheet{max-width:none;padding:0;box-shadow:none}.no-print{display:none}.summary{break-inside:avoid}h2,table{break-inside:auto}thead{display:table-header-group}tr{break-inside:avoid}}</style></head><body><div class="sheet"><div class="kop"><h1>Laporan Transparansi Keuangan</h1><p>Karang Taruna ARUM &nbsp;•&nbsp; Rekap pemasukan dan pengeluaran</p></div><div class="period"><b>Periode laporan:</b> ${f?financeFormatDate(f):'Semua tanggal'} &nbsp; | &nbsp; <b>Dicetak:</b> ${new Date().toLocaleString('id-ID')}</div><div class="summary"><div class="box green"><div class="label">Total Pemasukan</div><div class="value">${financeRp(ti)}</div></div><div class="box red"><div class="label">Total Pengeluaran</div><div class="value">${financeRp(te)}</div></div><div class="box blue"><div class="label">Saldo</div><div class="value">${financeRp(ti-te)}</div></div></div><h2>Rekap Keuangan Per Tanggal</h2><table><thead><tr><th>Tanggal</th><th>Pemasukan</th><th>Pengeluaran</th><th>Saldo Hari Itu</th><th>Saldo Berjalan</th></tr></thead><tbody>${rh}</tbody></table><h2>Pemasukan Manual</h2><table><thead><tr><th>Tanggal</th><th>Keterangan</th><th>Kategori</th><th>Nominal</th><th>Catatan</th></tr></thead><tbody>${ih}</tbody></table><h2>Pengeluaran Manual</h2><table><thead><tr><th>Tanggal</th><th>Keterangan</th><th>Kategori</th><th>Nominal</th><th>Catatan</th></tr></thead><tbody>${eh}</tbody></table><div class="footer"><span>Dokumen Transparansi Keuangan Karang Taruna ARUM</span><span>Data otomatis dari sistem</span></div></div></body></html>`);p.document.close();p.focus();setTimeout(()=>p.print(),350);
        }

        /* --- MANAJEMEN DATABASE ANGGOTA (CRUD) --- */
        function openPengurusManagementModal() {
            if (!isPengurusIntiUser()) {
                showNotification('Akses Ditolak!', 'error');
                return;
            }
            renderPengurusMemberTable();
            closeFormEditor();
            const modal = new bootstrap.Modal(document.getElementById('pengurusManagementModal'));
            modal.show();
        }

        function getStoredCustomMembers() {
            return JSON.parse(localStorage.getItem('arum_custom_members')) || [];
        }

        function renderPengurusMemberTable() {
            const members = getStoredCustomMembers();
            const tbody = document.getElementById('pengurusMemberTableBody');
            document.getElementById('totalMembersCount').textContent = `${members.length} Anggota`;

            if (members.length === 0) {
                tbody.innerHTML = `<tr><td colspan="7" class="text-center py-4 text-muted fs-7">Belum ada anggota.</td></tr>`;
                return;
            }

            let html = '';
            members.forEach((m, idx) => {
                const avatar = m.foto ? `<img src="${m.foto}" alt="${m.nama}">` : `<i class="fa-solid fa-user"></i>`;
                html += `
                    <tr>
                        <td class="ps-3 fw-bold text-muted">${idx + 1}</td>
                        <td><div class="member-table-avatar">${avatar}</div></td>
                        <td class="fw-bold text-dark">${m.nama}</td>
                        <td><span class="badge bg-light text-primary border border-info rounded-pill px-3 py-1 fs-8">${m.jabatan}</span></td>
                        <td>${m.umur}</td>
                        <td>${m.rt}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 me-1" onclick="editMemberByPengurus(${idx})"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1" onclick="deleteMemberByPengurus(${idx})"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = html;
        }

        function openFormAddMember() {
            document.getElementById('formEditorTitle').innerHTML = `<i class="fa-solid fa-user-plus me-2"></i> Tambah Anggota Baru`;
            document.getElementById('editMemberIndex').value = "-1";
            document.getElementById('manageMemberForm').reset();
            document.getElementById('formMemberEditor').classList.remove('d-none');
        }

        function editMemberByPengurus(index) {
            const members = getStoredCustomMembers();
            const m = members[index];
            if (!m) return;

            document.getElementById('formEditorTitle').innerHTML = `<i class="fa-solid fa-pen-to-square me-2"></i> Edit Data Anggota`;
            document.getElementById('editMemberIndex').value = index;
            document.getElementById('mName').value = m.nama;
            document.getElementById('mAge').value = parseInt(m.umur) || "";
            document.getElementById('mRt').value = m.rt;
            document.getElementById('mJabatan').value = m.jabatan;
            document.getElementById('formMemberEditor').classList.remove('d-none');
        }

        function closeFormEditor() {
            document.getElementById('formMemberEditor').classList.add('d-none');
            document.getElementById('manageMemberForm').reset();
            document.getElementById('editMemberIndex').value = "-1";
        }

        function saveMemberFromPengurus() {
            const index = parseInt(document.getElementById('editMemberIndex').value);
            const name = document.getElementById('mName').value.trim();
            const age = document.getElementById('mAge').value.trim();
            const rt = document.getElementById('mRt').value;
            const jabatan = document.getElementById('mJabatan').value;
            const photoInput = document.getElementById('mPhoto');

            if (!name || !age || !rt || !jabatan) {
                showNotification('Gagal! Mohon lengkapi seluruh field.', 'error');
                return;
            }

            let members = getStoredCustomMembers();
            const processSave = (photoData) => {
                let existingPhoto = (index >= 0 && members[index]) ? members[index].foto : null;
                let finalPhoto = photoData !== null ? photoData : existingPhoto;

                const memberObj = { nama: name, jabatan: jabatan, umur: age + " Tahun", rt: rt, foto: finalPhoto };
                if (index >= 0 && members[index]) {
                    members[index] = memberObj;
                } else {
                    members.push(memberObj);
                }

                localStorage.setItem('arum_custom_members', JSON.stringify(members));
                renderPengurusMemberTable();
                closeFormEditor();
                showNotification('Data anggota berhasil disimpan!', 'success');
            };

            if (photoInput.files && photoInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) { processSave(e.target.result); };
                reader.readAsDataURL(photoInput.files[0]);
            } else {
                processSave(null);
            }
        }

        function deleteMemberByPengurus(index) {
            let members = getStoredCustomMembers();
            if (confirm(`Yakin ingin menghapus anggota ini?`)) {
                members.splice(index, 1);
                localStorage.setItem('arum_custom_members', JSON.stringify(members));
                renderPengurusMemberTable();
                showNotification('Anggota berhasil dihapus.', 'success');
            }
        }

        function showNotification(message, type = 'success') {
            const container = document.getElementById('appToastContainer');
            const bgClass = type === 'success' ? 'bg-success text-white' : 'bg-danger text-white';
            const iconClass = type === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation';

            container.innerHTML = `
                <div class="toast align-items-center ${bgClass} border-0 shadow-lg rounded-4 show mb-2" role="alert">
                    <div class="d-flex">
                        <div class="toast-body fw-semibold d-flex align-items-center gap-2">
                            <i class="fa-solid ${iconClass} fs-5"></i><span>${message}</span>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            `;
            setTimeout(() => { container.innerHTML = ''; }, 4000);
        }

        window.addEventListener('DOMContentLoaded', loadUserProfileFromStorage);

        /* ANIMASI PARTIKEL CANVAS BACKGROUND */
        const canvas = document.getElementById('particle-canvas');
        const ctx = canvas.getContext('2d');
        function resizeCanvas() { canvas.width = window.innerWidth; canvas.height = window.innerHeight; }
        resizeCanvas(); window.addEventListener('resize', resizeCanvas);

        const particles = [];
        for (let i = 0; i < 35; i++) {
            particles.push({
                x: Math.random() * canvas.width, y: Math.random() * canvas.height,
                radius: Math.random() * 2 + 1, vx: (Math.random() - 0.5) * 0.4, vy: (Math.random() - 0.5) * 0.4, alpha: Math.random() * 0.35 + 0.15
            });
        }
        function drawParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            for (let i = 0; i < particles.length; i++) {
                let p = particles[i];
                p.x += p.vx; p.y += p.vy;
                if (p.x < 0) p.x = canvas.width; if (p.x > canvas.width) p.x = 0;
                if (p.y < 0) p.y = canvas.height; if (p.y > canvas.height) p.y = 0;
                ctx.beginPath(); ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(10, 102, 194, ${p.alpha})`; ctx.fill();
            }
            requestAnimationFrame(drawParticles);
        }
        drawParticles();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>