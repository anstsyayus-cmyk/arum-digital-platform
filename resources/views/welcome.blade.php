<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARUM Digital Platform | Karang Taruna ARUM Blok KPK</title>
    
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
            --footer-bg: #092c4c;
        }

        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
        body { background-color: #ffffff; color: var(--text-dark); min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow-x: hidden; }

        /* --- BACKGROUND PARTICLES CANVAS ANIMATION --- */
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
        .page-fade-anim { animation: fadeInSlide 0.45s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        @keyframes fadeInSlide {
            from { opacity: 0; transform: translateY(18px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* --- NAVBAR --- */
        .navbar-custom { padding: 16px 0; background-color: rgba(255, 255, 255, 0.88); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(0, 0, 0, 0.08); }
        .brand-logo { height: 42px; width: auto; border-radius: 6px; }
        .brand-text { font-weight: 800; font-size: 1.18rem; color: var(--linkedin-blue); }
        .nav-icon-link { display: flex; flex-direction: column; align-items: center; color: var(--text-muted); text-decoration: none; font-size: 0.8rem; font-weight: 600; padding: 0 12px; transition: color 0.2s ease; cursor: pointer; }
        .nav-icon-link i { font-size: 1.25rem; margin-bottom: 4px; }
        .nav-icon-link:hover { color: var(--linkedin-blue); }

        /* --- HERO --- */
        .hero-section { padding: 60px 0 40px 0; }
        .hero-title-main { font-size: 2.8rem; font-weight: 800; color: var(--warm-heading); line-height: 1.2; margin-bottom: 8px; }
        .hero-subtitle-sub { font-size: 2.1rem; font-weight: 400; color: var(--linkedin-blue); line-height: 1.25; margin-bottom: 28px; }
        .hero-desc { color: var(--text-muted); font-size: 1.15rem; line-height: 1.7; max-width: 600px; margin-bottom: 32px; }
        .login-card-form { max-width: 420px; }
        .form-label-custom { font-size: 0.88rem; color: var(--text-dark); margin-bottom: 6px; font-weight: 600; }
        .form-control-custom { border: 1px solid var(--border-color); border-radius: 6px; padding: 12px 14px; font-size: 0.95rem; background: rgba(255, 255, 255, 0.9); }
        .password-field { position: relative; width: 100%; }
        .password-field .form-control-custom { padding-right: 48px; width: 100%; }
        .password-toggle { position: absolute; top: 50%; right: 12px; transform: translateY(-50%); border: 0; background: transparent; color: #64748b; padding: 6px; cursor: pointer; line-height: 1; z-index: 2; }
        .password-toggle:hover, .password-toggle:focus { color: var(--linkedin-blue); outline: none; }
        .password-toggle i { font-size: 1rem; }
        /* Pastikan animasi latar terlihat menyeluruh, termasuk halaman masuk/daftar. */
        body { background: linear-gradient(135deg, #f4f9ff 0%, #eaf5ff 48%, #f6f2ff 100%); }
        .hero-section, #masukFormView, #registerFormView { background: transparent !important; }
        #masukFormView .hero-section, #registerFormView .hero-section { background: transparent !important; }
        #masukFormView .login-card-form, #registerFormView .login-card-form { background: rgba(255,255,255,.58) !important; backdrop-filter: blur(14px); }


        .btn-action-primary { background-color: var(--linkedin-blue); color: #ffffff; font-weight: 700; border-radius: 28px; padding: 12px 26px; border: none; box-shadow: 0 4px 12px rgba(10, 102, 194, 0.25); display: inline-flex; align-items: center; gap: 8px; text-decoration: none; cursor: pointer; }
        .btn-action-primary:hover { background-color: var(--linkedin-blue-hover); color: #ffffff; transform: translateY(-2px); }
        .btn-action-outline { background-color: rgba(255, 255, 255, 0.9); border: 1.5px solid var(--border-color); color: var(--text-dark); font-weight: 700; border-radius: 28px; padding: 11px 24px; display: inline-flex; align-items: center; gap: 8px; backdrop-filter: blur(5px); cursor: pointer; }
        .btn-action-outline:hover { background-color: rgba(255, 255, 255, 1); border-color: var(--text-dark); color: var(--text-dark); transform: translateY(-2px); }
        /* Tombol utama ditata konsisten dalam grid 2 kolom agar tidak berantakan. */
        .hero-action-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            width: 100%;
            max-width: 600px;
            align-items: stretch;
        }
        .hero-action-grid .btn-action-primary,
        .hero-action-grid .btn-action-outline {
            min-height: 60px;
            width: 100%;
            justify-content: center;
            text-align: center;
            padding: 14px 18px;
            border-radius: 18px;
            font-size: 1rem;
            line-height: 1.35;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.10);
            transition: transform .2s ease, box-shadow .2s ease, background-color .2s ease, border-color .2s ease;
        }
        .hero-action-grid .btn-action-primary:hover,
        .hero-action-grid .btn-action-outline:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.16);
        }
        .hero-action-grid .btn-action-primary:nth-child(2) {
            background: linear-gradient(135deg, #10a878, #047857) !important;
        }
        .hero-action-grid .btn-action-outline {
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(10, 102, 194, 0.18);
        }
        .hero-action-grid .btn-action-outline:hover {
            background: #ffffff;
            border-color: rgba(10, 102, 194, 0.5);
            color: var(--linkedin-blue);
        }
        .hero-action-grid i { font-size: 1.05em; }
        @media (max-width: 575.98px) {
            .hero-action-grid { grid-template-columns: 1fr; max-width: 100%; gap: 10px; }
            .hero-action-grid .btn-action-primary,
            .hero-action-grid .btn-action-outline { min-height: 54px; border-radius: 16px; }
        }
        
        .divider-or { display: flex; align-items: center; text-align: center; color: var(--text-muted); font-size: 0.85rem; margin: 18px 0; font-weight: 500; }
        .divider-or::before, .divider-or::after { content: ''; flex: 1; border-bottom: 1px solid var(--border-color); }
        .divider-or::before { margin-right: .5em; } .divider-or::after { margin-left: .5em; }

        .hero-img-container { position: relative; width: 100%; max-width: 480px; margin: 0 auto; }
        .hero-img-box { background-color: rgba(243, 242, 239, 0.85); border-radius: 50% 50% 0 0; padding: 40px 30px 20px 30px; text-align: center; border: 1px solid rgba(0, 0, 0, 0.06); backdrop-filter: blur(10px); animation: heroImgFloat 5s ease-in-out infinite alternate; }
        .hero-img-box img { width: 100%; max-height: 360px; object-fit: contain; }

        @keyframes heroImgFloat { 0% { transform: translateY(0px); } 100% { transform: translateY(-12px); } }

        /* --- VISI & MISI --- */
        .visimisi-section { background-color: rgba(248, 250, 252, 0.8); backdrop-filter: blur(10px); padding: 80px 0; border-top: 1px solid rgba(0, 0, 0, 0.06); border-bottom: 1px solid rgba(0, 0, 0, 0.06); }
        .section-header-tag { background: rgba(10, 102, 194, 0.08); color: var(--linkedin-blue); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; padding: 6px 16px; border-radius: 20px; display: inline-block; margin-bottom: 12px; }
        .card-visi-pro { background: linear-gradient(135deg, #0a66c2 0%, #004182 100%); color: #ffffff; border-radius: 20px; padding: 40px; box-shadow: 0 15px 35px rgba(10, 102, 194, 0.2); height: 100%; }
        .card-misi-pro { background: rgba(255, 255, 255, 0.95); border: 1px solid rgba(0, 0, 0, 0.08); border-radius: 20px; padding: 40px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04); height: 100%; backdrop-filter: blur(10px); }
        .misi-grid-item { display: flex; align-items: flex-start; gap: 16px; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px dashed rgba(0, 0, 0, 0.08); }
        .misi-grid-item:last-child { margin-bottom: 0; padding-bottom: 0; border-bottom: none; }
        .misi-icon-box { width: 42px; height: 42px; border-radius: 12px; background: rgba(10, 102, 194, 0.08); color: var(--linkedin-blue); display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }

        /* --- DIREKTORI KATEGORI CARDS --- */
        .category-card { background: rgba(255, 255, 255, 0.95); border: 1.5px solid rgba(0, 0, 0, 0.08); border-radius: 20px; padding: 35px 25px; text-align: center; transition: all 0.3s ease; cursor: pointer; height: 100%; display: flex; flex-direction: column; justify-content: space-between; align-items: center; backdrop-filter: blur(10px); }
        .category-card:hover { transform: translateY(-8px); border-color: var(--linkedin-blue); box-shadow: 0 18px 35px rgba(10, 102, 194, 0.15); }
        .avatar-circle-lg { width: 60px; height: 60px; border-radius: 50%; background: var(--linkedin-blue); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.35rem; margin-bottom: 16px; box-shadow: 0 6px 15px rgba(10, 102, 194, 0.25); }

        .member-card-exec { background: #ffffff; border-radius: 18px; border: 1px solid rgba(0,0,0,0.08); overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.04); transition: all 0.3s ease; height: 100%; }
        .member-card-exec:hover { transform: translateY(-5px); border-color: var(--linkedin-blue); box-shadow: 0 15px 30px rgba(10, 102, 194, 0.15); }
        .member-banner-exec { height: 65px; background: linear-gradient(135deg, #0a66c2 0%, #004182 100%); }
        .member-avatar-box { width: 76px; height: 76px; border-radius: 50%; border: 4px solid #ffffff; background: #e2e8f0; overflow: hidden; margin: -38px auto 12px auto; box-shadow: 0 4px 12px rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: center; font-size: 2rem; color: #94a3b8; }
        .member-avatar-box img { width: 100%; height: 100%; object-fit: cover; }
        .badge-role-vip { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: #ffffff; font-size: 0.72rem; font-weight: 800; padding: 4px 12px; border-radius: 12px; display: inline-block; margin-bottom: 8px; }
        .badge-role-regular { background: rgba(10, 102, 194, 0.1); color: var(--linkedin-blue); font-size: 0.75rem; font-weight: 700; padding: 4px 12px; border-radius: 12px; display: inline-block; margin-bottom: 8px; }

        /* --- PROGRAM KERJA --- */
        .explore-section { background-color: rgba(248, 250, 252, 0.85); padding: 70px 0; border-top: 1px solid rgba(0, 0, 0, 0.06); backdrop-filter: blur(10px); }
        .program-card-interactive { background: rgba(255, 255, 255, 0.95); border: 1px solid rgba(0, 0, 0, 0.08); border-radius: 18px; padding: 24px; transition: all 0.3s ease; height: 100%; box-shadow: 0 4px 15px rgba(0,0,0,0.02); text-decoration: none; color: inherit; display: block; cursor: pointer; }
        .program-card-interactive:hover { transform: translateY(-6px); border-color: var(--linkedin-blue); box-shadow: 0 14px 28px rgba(10, 102, 194, 0.12); color: inherit; }
        .program-icon-wrapper { width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-bottom: 16px; }

        /* --- TRANSPARANSI KEUANGAN PUBLIK --- */
        .finance-public-section { background: linear-gradient(180deg, rgba(248,250,252,0.92) 0%, rgba(255,255,255,0.96) 100%); padding: 80px 0; border-top: 1px solid rgba(0,0,0,0.06); backdrop-filter: blur(10px); }
        .finance-public-card { background:#fff; border:1px solid rgba(0,0,0,0.08); border-radius:20px; padding:24px; height:100%; box-shadow:0 8px 24px rgba(0,0,0,0.05); }
        .finance-public-value { font-size:1.55rem; font-weight:800; }
        .finance-public-table thead th { background:#f8fafc; white-space:nowrap; font-size:.78rem; }
        .finance-public-table tbody td { font-size:.82rem; }

        /* --- DOKUMENTASI & KOTAK ASPIRASI SECTION --- */
        .dokumentasi-section { background: linear-gradient(180deg, rgba(255,255,255,0.9) 0%, rgba(241,245,249,0.9) 100%); padding: 80px 0; border-top: 1px solid rgba(0,0,0,0.06); backdrop-filter: blur(10px); }
        .album-card-readonly { background: #ffffff; border: 1.5px solid var(--border-color); border-radius: 18px; overflow: hidden; transition: all 0.3s ease; box-shadow: 0 6px 20px rgba(0,0,0,0.04); cursor: pointer; height: 100%; display: flex; flex-direction: column; justify-content: space-between; }
        .album-card-readonly:hover { transform: translateY(-6px); border-color: var(--linkedin-blue); box-shadow: 0 15px 30px rgba(10, 102, 194, 0.15); }
        .album-cover-ro { height: 180px; width: 100%; background: #e2e8f0; object-fit: cover; }
        .gallery-photo-card-ro { position: relative; border-radius: 14px; overflow: hidden; height: 190px; background: #0f172a; border: 1px solid var(--border-color); box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .gallery-photo-card-ro img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.35s ease; }
        .gallery-photo-card-ro:hover img { transform: scale(1.06); }

        .modal-header-banner { background: linear-gradient(135deg, #0a66c2 0%, #004182 100%); color: #ffffff; padding: 24px 28px; border-radius: 16px 16px 0 0; position: relative; }

        /* --- TABEL TRANSPARANSI ASPIRASI MODERN --- */
        .transparansi-table-wrapper { background: #ffffff; border: 1px solid var(--border-color); border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.02); }
        .table-transparansi { width: 100%; margin-bottom: 0; border-collapse: collapse; }
        .table-transparansi th { background-color: #f1f5f9; color: var(--text-dark); font-weight: 700; font-size: 0.85rem; padding: 12px 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0; }
        .table-transparansi td { padding: 14px; vertical-align: middle; font-size: 0.9rem; border-bottom: 1px solid #f1f5f9; color: var(--text-dark); }
        .table-transparansi tbody tr:hover { background-color: #f8fafc; }
        .table-transparansi tbody tr:last-child td { border-bottom: none; }

        /* FIX BACKDROP & SCROLLING */
        body.modal-open { overflow: auto !important; padding-right: 0 !important; }
        .modal-backdrop { display: none !important; }

        /* --- FORMAT CETAK LAPORAN PROFESIONAL --- */
        .print-header-kop { display: none; }
        .print-footer-ttd { display: none; }
        
        @media print {
            @page { size: A4 portrait; margin: 12mm; }
            body { background: #ffffff !important; color: #000000 !important; font-size: 10.5pt; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            body * { visibility: hidden; }
            
            #printableAspirasiSection, #printableAspirasiSection * { visibility: visible; }
            #printableAspirasiSection { position: absolute; left: 0; top: 0; width: 100%; background: #ffffff !important; box-shadow: none !important; border: none !important; }
            
            .no-print { display: none !important; }
            .modal-header-banner { background: none !important; color: #000000 !important; padding: 0 !important; border-bottom: none !important; }
            .modal-body { padding: 0 !important; }
            
            .print-header-kop { 
                display: block !important; 
                text-align: center; 
                margin-bottom: 20px; 
                border-bottom: 3px solid #0a66c2; 
                padding-bottom: 12px; 
            }
            .print-header-kop h3 { margin: 0; font-weight: 800; font-size: 15pt; color: #0a66c2; letter-spacing: 0.5px; }
            .print-header-kop h4 { margin: 4px 0; font-weight: 700; font-size: 12pt; color: #333; }
            .print-header-kop p { margin: 2px 0 0 0; font-size: 8.5pt; color: #555; }

            .transparansi-table-wrapper { border: none !important; box-shadow: none !important; }
            .table-transparansi { width: 100% !important; border-collapse: collapse !important; margin-top: 10px; }
            .table-transparansi th { 
                background-color: #0a66c2 !important; 
                color: #ffffff !important; 
                border: 1px solid #0a66c2 !important; 
                padding: 8px 10px !important; 
                font-size: 9pt !important; 
                text-align: left;
            }
            .table-transparansi td { 
                border: 1px solid #cbd5e1 !important; 
                padding: 8px 10px !important; 
                font-size: 9pt !important; 
                color: #1e293b !important; 
                background-color: #ffffff !important;
            }
            .table-transparansi tbody tr:nth-child(even) td {
                background-color: #f8fafc !important;
            }

            .print-footer-ttd {
                display: flex !important;
                justify-content: space-between;
                margin-top: 40px;
                page-break-inside: avoid;
            }
            .print-ttd-box {
                text-align: center;
                width: 200px;
                font-size: 9.5pt;
            }
            .print-ttd-space {
                height: 60px;
            }
        }

        /* --- FOOTER --- */
        .official-footer { background-color: var(--footer-bg); color: #ffffff; padding: 60px 0 30px 0; }
        .footer-social-icons { display: flex; gap: 14px; margin-top: 18px; }
        .footer-social-icons a { color: #ffffff; font-size: 1.25rem; width: 42px; height: 42px; border-radius: 50%; background: rgba(255, 255, 255, 0.12); display: inline-flex; align-items: center; justify-content: center; transition: all 0.25s ease; text-decoration: none; }
        .footer-social-icons a:hover { background: var(--linkedin-blue); transform: translateY(-3px); box-shadow: 0 6px 15px rgba(10, 102, 194, 0.4); }
        .footer-link-list { list-style: none; padding: 0; margin: 0; }
        .footer-link-list li { margin-bottom: 10px; }
        .footer-link-list a { color: rgba(255, 255, 255, 0.85); text-decoration: none; font-size: 0.9rem; transition: color 0.2s ease; }
        .footer-link-list a:hover { color: #ffffff; }

        .hide-view { display: none !important; }
    
/* ============================================================
   ARUM PUBLIC VISUAL REFRESH — TAMPILAN SAJA
   Tidak mengubah ID, data, navigasi, form, atau fungsi JS.
   ============================================================ */
:root {
    --arum-blue: #0a66c2;
    --arum-blue-dark: #004182;
    --arum-cyan: #38bdf8;
    --arum-purple: #7c3aed;
}

body {
    background:
        radial-gradient(circle at 8% 10%, rgba(10,102,194,.08), transparent 28%),
        radial-gradient(circle at 92% 76%, rgba(56,189,248,.08), transparent 30%),
        linear-gradient(135deg,#fbfdff 0%,#f5f9ff 48%,#eef7ff 100%) !important;
}

.bg-aurora-wrapper::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(10,102,194,.035) 1px, transparent 1px),
        linear-gradient(90deg, rgba(10,102,194,.035) 1px, transparent 1px);
    background-size: 44px 44px;
    mask-image: linear-gradient(to bottom, black, transparent 90%);
    animation: publicGridMove 26s linear infinite;
}
.bg-aurora-wrapper::after {
    content: "";
    position: absolute;
    width: 430px;
    height: 430px;
    left: 45%;
    top: 32%;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(124,58,237,.07), transparent 68%);
    filter: blur(38px);
    animation: publicPulse 11s ease-in-out infinite alternate;
}
@keyframes publicGridMove { to { transform: translate3d(44px,44px,0); } }
@keyframes publicPulse { 0% { transform: scale(.82); opacity:.4; } 100% { transform: scale(1.24) translate(30px,-20px); opacity:.85; } }

.navbar-custom {
    background: rgba(255,255,255,.72) !important;
    border-bottom: 1px solid rgba(10,102,194,.12) !important;
    box-shadow: 0 8px 30px rgba(15,23,42,.06);
}
.brand-logo { box-shadow: 0 5px 15px rgba(10,102,194,.16); transition: transform .3s ease, box-shadow .3s ease; }
.brand-logo:hover { transform: rotate(-2deg) scale(1.05); box-shadow: 0 9px 24px rgba(10,102,194,.25); }

.nav-icon-link {
    position: relative;
    border-radius: 12px !important;
    transition: background .25s ease, transform .25s ease, color .25s ease !important;
}
.nav-icon-link:hover { background: rgba(10,102,194,.08); transform: translateY(-2px); }
.nav-icon-link::after {
    content: "";
    position: absolute;
    left: 16px;
    right: 16px;
    bottom: 3px;
    height: 2px;
    border-radius: 10px;
    background: linear-gradient(90deg,#0a66c2,#38bdf8);
    transform: scaleX(0);
    transition: transform .25s ease;
}
.nav-icon-link:hover::after { transform: scaleX(1); }

.hero-section {
    position: relative;
    overflow: hidden;
}
.hero-section::before {
    content: "";
    position: absolute;
    width: 520px;
    height: 520px;
    right: -220px;
    top: -210px;
    border-radius: 50%;
    border: 1px solid rgba(10,102,194,.10);
    box-shadow: 0 0 0 35px rgba(10,102,194,.025), 0 0 0 70px rgba(56,189,248,.02);
    animation: heroOrbit 18s linear infinite;
    pointer-events: none;
}
@keyframes heroOrbit { to { transform: rotate(360deg); } }

.hero-title-main { text-shadow: 0 10px 35px rgba(10,102,194,.08); }

.category-card,
.member-card-exec,
.program-card-interactive,
.album-card-readonly,
.finance-public-card,
.notice-card,
.login-card-form,
.transparansi-table-wrapper {
    position: relative;
    overflow: hidden;
    background: rgba(255,255,255,.78) !important;
    border-color: rgba(255,255,255,.78) !important;
    box-shadow: 0 12px 35px rgba(15,23,42,.065), inset 0 1px 0 rgba(255,255,255,.82) !important;
}

.category-card::before,
.member-card-exec::before,
.program-card-interactive::before,
.album-card-readonly::before,
.finance-public-card::before,
.notice-card::before,
.login-card-form::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    padding: 1px;
    background: linear-gradient(120deg, rgba(10,102,194,.24), rgba(56,189,248,.03), rgba(124,58,237,.14));
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    pointer-events: none;
    opacity: .65;
}

.category-card,
.member-card-exec,
.program-card-interactive,
.album-card-readonly {
    transition: transform .35s cubic-bezier(.2,.8,.2,1), box-shadow .35s ease, border-color .35s ease !important;
}
.category-card:hover,
.member-card-exec:hover,
.program-card-interactive:hover,
.album-card-readonly:hover {
    transform: translateY(-8px) scale(1.012) !important;
    box-shadow: 0 22px 45px rgba(10,102,194,.13), 0 4px 12px rgba(15,23,42,.05) !important;
}

.finance-public-section,
.dokumentasi-section,
.explore-section {
    position: relative;
}
.finance-public-section::before,
.dokumentasi-section::before,
.explore-section::before {
    content: "";
    position: absolute;
    width: 260px;
    height: 260px;
    left: -130px;
    top: 20%;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(10,102,194,.07), transparent 70%);
    filter: blur(15px);
    animation: sectionFloat 9s ease-in-out infinite alternate;
    pointer-events: none;
}
@keyframes sectionFloat { to { transform: translate(55px,-25px) scale(1.15); } }

.finance-public-card { transition: transform .3s ease, box-shadow .3s ease; }
.finance-public-card:hover { transform: translateY(-5px); box-shadow: 0 18px 38px rgba(10,102,194,.11) !important; }
.finance-public-value { text-shadow: 0 5px 18px rgba(10,102,194,.08); }

.album-cover-ro { transition: transform .55s cubic-bezier(.2,.8,.2,1); }
.album-card-readonly:hover .album-cover-ro { transform: scale(1.035); }

.official-footer {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg,#061d35,#092c4c 55%,#064b78) !important;
}
.official-footer::before {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    right: -160px;
    top: -260px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.12);
    box-shadow: 0 0 0 35px rgba(255,255,255,.025), 0 0 0 70px rgba(255,255,255,.018);
    animation: footerRing 18s linear infinite;
}
@keyframes footerRing { to { transform: rotate(360deg); } }

.btn-primary {
    border: 0 !important;
    background: linear-gradient(135deg,#0a66c2,#0758aa) !important;
    box-shadow: 0 7px 18px rgba(10,102,194,.2);
    transition: transform .25s ease, box-shadow .25s ease;
}
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 11px 24px rgba(10,102,194,.3); }

.form-control, .form-select {
    border-color: rgba(100,116,139,.22) !important;
    transition: border-color .2s ease, box-shadow .2s ease;
}
.form-control:focus, .form-select:focus { border-color: rgba(10,102,194,.55) !important; box-shadow: 0 0 0 4px rgba(10,102,194,.09) !important; }

@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after { animation-duration: .001ms !important; animation-iteration-count: 1 !important; scroll-behavior: auto !important; transition-duration: .001ms !important; }
}
@media print {
    .bg-aurora-wrapper, #particle-canvas { display:none !important; }
    .category-card::before, .member-card-exec::before, .program-card-interactive::before, .album-card-readonly::before, .finance-public-card::before, .notice-card::before, .login-card-form::before { display:none !important; }
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
        <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
            <div class="container d-flex align-items-center justify-content-between">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}" onclick="showDashboardView(); return false;">
                    <img src="{{ asset('images/logo-arum.png') }}" alt="Logo ARUM" class="brand-logo">
                    <span class="brand-text ms-1">ARUM DIGITAL PLATFORM</span>
                </a>
                <div class="d-none d-md-flex align-items-center ms-auto">
                    <a href="#informasi" onclick="showDashboardView()" class="nav-icon-link"><i class="fa-solid fa-newspaper"></i><span>Informasi</span></a>
                    <a href="#visimisi" onclick="showDashboardView()" class="nav-icon-link"><i class="fa-solid fa-bullseye"></i><span>Visi & Misi</span></a>
                    <a href="#anggota" onclick="showDashboardView()" class="nav-icon-link"><i class="fa-solid fa-users"></i><span>Data Anggota</span></a>
                    <a href="#kegiatan" onclick="showDashboardView()" class="nav-icon-link"><i class="fa-solid fa-calendar-check"></i><span>Program Kerja</span></a>
                    <a href="#dokumentasiPublik" onclick="showDashboardView()" class="nav-icon-link"><i class="fa-solid fa-images"></i><span>Dokumentasi</span></a>
                </div>
            </div>
        </nav>

        <main>
            <!-- 1. DASHBOARD UTAMA -->
            <div id="mainDashboardView" class="page-fade-anim">
                <section class="hero-section" id="informasi">
                    <div class="container">
                        <div class="row align-items-center g-5">
                            <div class="col-lg-7">
                                <span class="badge bg-light text-primary border border-info px-3 py-2 fs-6 fw-bold rounded-pill mb-3">
                                    <i class="fa-solid fa-users me-1"></i> Karang Taruna Blok KPK Barepan
                                </span>
                                <h1 class="hero-title-main">Selamat Datang di Arum Digital Platform</h1>
                                <p class="hero-desc">Anggayuh Rukun Utamaning Muda — Wadah digital terpadu kepemudaan Blok KPK, Desa Barepan, Kec Cawas, Kab Klaten.</p>
                                <div class="hero-action-grid">
                                    <a href="#kegiatan" class="btn-action-primary"><i class="fa-solid fa-hand-holding-heart"></i> Layanan Publik</a>
                                    <button onclick="openKotakAspirasiModal(true)" class="btn-action-primary" style="background-color: #059669;"><i class="fa-solid fa-bullhorn"></i> Kirim Aspirasi</button>
                                    <button onclick="showRegisterView()" class="btn-action-outline"><i class="fa-solid fa-user-plus"></i> Daftar Akun</button>
                                    <button onclick="showMasukView()" class="btn-action-outline"><i class="fa-solid fa-right-to-bracket"></i> Masuk Akun</button>
                                </div>
                            </div>
                            <div class="col-lg-5 text-center">
                                <div class="hero-img-container">
                                    <div class="hero-img-box"><img src="{{ asset('images/logo-arum.png') }}" alt="Logo ARUM"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="visimisi" class="visimisi-section">
                    <div class="container">
                        <div class="text-center mb-5">
                            <span class="section-header-tag">Landasan Organisasi</span>
                            <h2 class="fw-extrabold fs-2 text-dark mt-1">Arah & Komitmen Karang Taruna ARUM</h2>
                            <p class="text-muted fs-6 mb-0">Mewujudkan kepemudaan yang aktif, berkarakter, dan berdaya saing di Blok KPK Barepan</p>
                        </div>
                        <div class="row g-4 align-items-stretch">
                            <div class="col-lg-5">
                                <div class="card-visi-pro d-flex flex-column justify-content-center">
                                    <h3 class="fw-bold mb-3"><i class="fa-solid fa-eye me-2"></i> VISI UTAMA</h3>
                                    <p class="fs-5 leading-relaxed mb-0">
                                        "Terwujudnya Karang Taruna ARUM sebagai wadah pemuda yang solid, mandiri, kreatif, serta berkarakter luhur dalam membangun kerukunan dan kemajuan masyarakat Blok KPK Desa Barepan."
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card-misi-pro">
                                    <h3 class="fw-bold mb-4 text-dark"><i class="fa-solid fa-bullseye me-2" style="color: var(--warm-heading);"></i> MISI STRATEGIS</h3>
                                    <div class="misi-grid-item">
                                        <div class="misi-icon-box"><i class="fa-solid fa-handshake"></i></div>
                                        <div>
                                            <h5 class="fw-bold text-dark mb-1">1. Menjaga Tradisi Kerukunan & Paseduluran</h5>
                                            <p class="text-muted fs-7 mb-0">Mempererat tali silaturahmi antar pemuda/pemudi di seluruh wilayah RT 01 hingga RT 04 melalui kegiatan kemasyarakatan dan kebudayaan.</p>
                                        </div>
                                    </div>
                                    <div class="misi-grid-item">
                                        <div class="misi-icon-box"><i class="fa-solid fa-lightbulb"></i></div>
                                        <div>
                                            <h5 class="fw-bold text-dark mb-1">2. Pengembangan Inovasi & Potensi Pemuda</h5>
                                            <p class="text-muted fs-7 mb-0">Mendorong kreativitas pemuda di bidang olahraga, kebudayaan, keagamaan, serta kewirausahaan lokal.</p>
                                        </div>
                                    </div>
                                    <div class="misi-grid-item">
                                        <div class="misi-icon-box"><i class="fa-solid fa-shield-halved"></i></div>
                                        <div>
                                            <h5 class="fw-bold text-dark mb-1">3. Keterbukaan & Transparansi Organisasi</h5>
                                            <p class="text-muted fs-7 mb-0">Membangun tata kelola Karang Taruna yang transparan, akuntabel, dan berbasis teknologi digital terpadu.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="anggota" class="py-5" style="background-color: rgba(255, 255, 255, 0.85); backdrop-filter: blur(10px);">
                    <div class="container">
                        <div class="text-center mb-5">
                            <span class="section-header-tag">Direktori Pemuda</span>
                            <h2 class="fw-extrabold fs-2 text-dark mt-1">Data Keanggotaan Karang Taruna</h2>
                            <p class="text-muted fs-6 mb-0">Pilih kategori direktori untuk melihat informasi anggota terdaftar</p>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="category-card" onclick="showMemberList('pengurus')">
                                    <div class="avatar-circle-lg"><i class="fa-solid fa-crown"></i></div>
                                    <div>
                                        <h4 class="fw-bold text-dark mb-1">Pengurus Inti</h4>
                                        <p class="text-muted fs-7 mb-3">Ketua, Wakil, Sekretaris, Bendahara & Seksi Konsumsi</p>
                                    </div>
                                    <span class="badge bg-primary rounded-pill px-3 py-2 fw-bold" id="badgeCountPengurus">0 Pengurus</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="category-card" onclick="showMemberList('anggota')">
                                    <div class="avatar-circle-lg" style="background: #059669;"><i class="fa-solid fa-user-group"></i></div>
                                    <div>
                                        <h4 class="fw-bold text-dark mb-1">Anggota Karang Taruna</h4>
                                        <p class="text-muted fs-7 mb-3">Seluruh Pemuda & Pemudi Terdaftar RT 01, RT 02, RT 03, RT 04 Blok KPK</p>
                                    </div>
                                    <span class="badge bg-success rounded-pill px-3 py-2 fw-bold" id="badgeCountAnggota">0 Pemuda</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="category-card" onclick="showMemberList('alumni')">
                                    <div class="avatar-circle-lg" style="background: #d97706;"><i class="fa-solid fa-award"></i></div>
                                    <div>
                                        <h4 class="fw-bold text-dark mb-1">Alumni & Senior</h4>
                                        <p class="text-muted fs-7 mb-3">Penasihat, Pembina & Demisioner Kepemudaan Desa</p>
                                    </div>
                                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold" id="badgeCountAlumni">0 Senior</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="explore-section" id="kegiatan">
                    <div class="container">
                        <div class="text-center mb-5">
                            <span class="section-header-tag">Aktivitas & Agenda</span>
                            <h2 class="fw-extrabold fs-2 text-dark mt-1">Jelajahi Program Kepemudaan</h2>
                            <p class="text-muted fs-6 mb-0">Klik pada salah satu program di bawah untuk melihat detail kegiatan secara lengkap</p>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div class="program-card-interactive" onclick="openProgramDetail('sosial')">
                                    <div class="program-icon-wrapper" style="background: rgba(239, 68, 68, 0.1); color: #ef4444;"><i class="fa-solid fa-hand-holding-heart"></i></div>
                                    <h4 class="fw-bold text-dark fs-5 mb-2">Kegiatan Sosial & Donor</h4>
                                    <p class="text-muted fs-7 mb-0">Bantuan bagi warga, bakti sosial berkala, dan agenda donor darah kerja sama desa.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="program-card-interactive" onclick="openProgramDetail('olahraga')">
                                    <div class="program-icon-wrapper" style="background: rgba(16, 185, 129, 0.1); color: #10b981;"><i class="fa-solid fa-volleyball"></i></div>
                                    <h4 class="fw-bold text-dark fs-5 mb-2">Olahraga & Seni Kebudayaan</h4>
                                    <p class="text-muted fs-7 mb-0">Jadwal latihan voli, turnamen olahraga antar RT, dan pentas seni pemuda.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="program-card-interactive" onclick="openProgramDetail('keagamaan')">
                                    <div class="program-icon-wrapper" style="background: rgba(168, 85, 247, 0.1); color: #a855f7;"><i class="fa-solid fa-mosque"></i></div>
                                    <h4 class="fw-bold text-dark fs-5 mb-2">Keagamaan & Kerukunan Warga</h4>
                                    <p class="text-muted fs-7 mb-0">Kegiatan ibadah dan kerohanian pemuda, peringatan hari besar keagamaan, serta aksi sosial dan pemeliharaan rumah ibadah bersama.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="program-card-interactive" onclick="openProgramDetail('ekonomi')">
                                    <div class="program-icon-wrapper" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;"><i class="fa-solid fa-chart-line"></i></div>
                                    <h4 class="fw-bold text-dark fs-5 mb-2">Pemberdayaan Ekonomi</h4>
                                    <p class="text-muted fs-7 mb-0">Pengembangan UMKM pemuda, pelatihan wirausaha digital, dan kas produktif.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="program-card-interactive" onclick="openProgramDetail('lingkungan')">
                                    <div class="program-icon-wrapper" style="background: rgba(14, 165, 233, 0.1); color: #0ea5e9;"><i class="fa-solid fa-people-carry-box"></i></div>
                                    <h4 class="fw-bold text-dark fs-5 mb-2">Gotong Royong Lingkungan</h4>
                                    <p class="text-muted fs-7 mb-0">Kerja bakti pembersihan saluran warga RT 01-04, penghijauan, dan penataan desa.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="program-card-interactive" onclick="openKotakAspirasiModal(false)">
                                    <div class="program-icon-wrapper" style="background: rgba(5, 150, 105, 0.1); color: #059669;"><i class="fa-solid fa-comments"></i></div>
                                    <h4 class="fw-bold text-dark fs-5 mb-2">Kotak Aspirasi & Aduan</h4>
                                    <p class="text-muted fs-7 mb-0">Sampaikan keluhan fasilitas umum, kebersihan, keamanan, atau usulan acara warga.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SEKSI TRANSPARANSI KEUANGAN PUBLIK (READ-ONLY) -->
                <section class="finance-public-section" id="transparansiKeuanganPublik">
                    <div class="container">
                        <div class="text-center mb-5"><span class="section-header-tag">Keterbukaan & Akuntabilitas</span><h2 class="fw-extrabold fs-2 text-dark mt-1">Transparansi Keuangan</h2><p class="text-muted fs-6 mb-0">Ringkasan pemasukan kas dan pengeluaran organisasi yang dikelola Pengurus Inti.</p></div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4"><div class="finance-public-card"><div class="text-muted fs-8 fw-semibold">TOTAL PEMASUKAN KAS</div><div class="finance-public-value text-success mt-1" id="publicFinanceTotalIncome">Rp 0</div><small class="text-muted">Pemasukan Organisasi</small></div></div>
                            <div class="col-md-4"><div class="finance-public-card"><div class="text-muted fs-8 fw-semibold">TOTAL PENGELUARAN</div><div class="finance-public-value text-danger mt-1" id="publicFinanceTotalExpense">Rp 0</div><small class="text-muted">Pengeluaran Organisasi</small></div></div>
                            <div class="col-md-4"><div class="finance-public-card"><div class="text-muted fs-8 fw-semibold">SALDO KAS SAAT INI</div><div class="finance-public-value text-primary mt-1" id="publicFinanceBalance">Rp 0</div><small class="text-muted">Pemasukan - Pengeluaran</small></div></div>
                        </div>
                        <div class="finance-public-card">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3"><div><h5 class="fw-bold text-dark mb-1"><i class="fa-solid fa-calendar-days me-2 text-primary"></i> Rekap Keuangan Per Tanggal</h5><p class="text-muted fs-8 mb-0">Data ditampilkan otomatis dari Riwayat Kas dan pengeluaran manual Pengurus.</p></div><button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3" onclick="printPublicFinanceReport()"><i class="fa-solid fa-print me-1"></i> Cetak</button></div>
                            <div class="table-responsive rounded-3 border"><table class="table table-hover align-middle mb-0 finance-public-table"><thead><tr><th>Tanggal</th><th>Pemasukan</th><th>Pengeluaran</th><th>Saldo Hari Itu</th><th>Saldo Berjalan</th></tr></thead><tbody id="publicFinanceDailyBody"></tbody></table></div>
                        </div>
                    </div>
                </section>

                <!-- SEKSI TERPISAH: DOKUMENTASI & GALERI KEGIATAN PEMUDA -->
                <section class="dokumentasi-section" id="dokumentasiPublik">
                    <div class="container">
                        <div class="text-center mb-5">
                            <span class="section-header-tag">Arsip & Momen Kebersamaan</span>
                            <h2 class="fw-extrabold fs-2 text-dark mt-1">Dokumentasi Kegiatan</h2>
                            <p class="text-muted fs-6 mb-0">Koleksi album liputan foto kegiatan pemuda Karang Taruna ARUM Blok KPK</p>
                        </div>
                        <div class="row g-4" id="publicAlbumGridContainer">
                            <!-- Terisi otomatis dari localStorage -->
                        </div>
                    </div>
                </section>
            </div>

            <!-- 2. VIEW DIREKTORI ANGGOTA -->
            <div id="memberListView" class="hide-view py-5" style="background-color: rgba(248, 250, 252, 0.85); backdrop-filter: blur(10px);">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 pb-3 border-bottom">
                        <div>
                            <span class="section-header-tag" id="listCategoryBadge">DIREKTORI RESMI</span>
                            <h2 class="fw-extrabold text-dark mt-1 mb-0" id="listCategoryTitle">Daftar Anggota</h2>
                            <p class="text-muted fs-6 mb-0" id="listCategorySubtitle">Mode Lihat Saja</p>
                        </div>
                        <button onclick="showDashboardView()" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-bold mt-3 mt-md-0">
                            <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Beranda
                        </button>
                    </div>
                    <div class="row g-4" id="memberGridCards"></div>
                </div>
            </div>

            <!-- 3. FORM MASUK -->
            <div id="masukFormView" class="hide-view">
                <section class="hero-section">
                    <div class="container">
                        <div class="row align-items-center g-5">
                            <div class="col-lg-6">
                                <h1 class="hero-title-main">Selamat Datang di Arum Digital Platform</h1>
                                <h2 class="hero-subtitle-sub">Ayo Masukkan Akun Anda</h2>
                                <div class="login-card-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label-custom">Email atau Nomor HP</label>
                                            <input type="email" name="email" class="form-control form-control-custom" required autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label-custom">Kata Sandi</label>
                                            <div class="password-field"><input type="password" name="password" class="form-control form-control-custom" required><button type="button" class="password-toggle" aria-label="Tampilkan kata sandi" aria-pressed="false" onclick="togglePasswordVisibility(this)"><i class="fa-solid fa-eye" aria-hidden="true"></i></button></div>
                                        </div>
                                        <button type="submit" class="btn-action-primary w-100 justify-content-center py-3">Masuk</button>
                                    </form>
                                    <div class="divider-or">atau</div>
                                    <button onclick="showRegisterView()" class="btn-action-outline w-100 justify-content-center">Belum punya akun? Daftar</button>
                                    <button onclick="showDashboardView()" class="btn text-secondary w-100 mt-2 btn-sm fw-semibold"><i class="fa-solid fa-arrow-left me-1"></i> Kembali</button>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <div class="hero-img-container"><div class="hero-img-box"><img src="{{ asset('images/logo-arum.png') }}" alt="Logo"></div></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- 4. FORM DAFTAR -->
            <div id="registerFormView" class="hide-view">
                <section class="hero-section">
                    <div class="container">
                        <div class="row align-items-center g-5">
                            <div class="col-lg-6">
                                <h1 class="hero-title-main">Selamat Datang di Arum Digital Platform</h1>
                                <h2 class="hero-subtitle-sub">Daftarkan Akun Baru</h2>
                                <div class="login-card-form">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3"><label class="form-label-custom">Nama Lengkap</label><input type="text" name="name" class="form-control form-control-custom" required></div>
                                        <div class="mb-3"><label class="form-label-custom">Email / No HP</label><input type="email" name="email" class="form-control form-control-custom" required></div>
                                        <div class="mb-3"><label class="form-label-custom">Kata Sandi</label><div class="password-field"><input type="password" name="password" class="form-control form-control-custom" required><button type="button" class="password-toggle" aria-label="Tampilkan kata sandi" aria-pressed="false" onclick="togglePasswordVisibility(this)"><i class="fa-solid fa-eye" aria-hidden="true"></i></button></div></div>
                                        <div class="mb-3"><label class="form-label-custom">Konfirmasi Sandi</label><div class="password-field"><input type="password" name="password_confirmation" class="form-control form-control-custom" required><button type="button" class="password-toggle" aria-label="Tampilkan konfirmasi kata sandi" aria-pressed="false" onclick="togglePasswordVisibility(this)"><i class="fa-solid fa-eye" aria-hidden="true"></i></button></div></div>
                                        <button type="submit" class="btn-action-primary w-100 justify-content-center py-3">Daftar Akun</button>
                                    </form>
                                    <div class="divider-or">atau</div>
                                    <button onclick="showMasukView()" class="btn-action-outline w-100 justify-content-center">Sudah punya akun? Masuk</button>
                                    <button onclick="showDashboardView()" class="btn text-secondary w-100 mt-2 btn-sm fw-semibold"><i class="fa-solid fa-arrow-left me-1"></i> Kembali</button>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <div class="hero-img-container"><div class="hero-img-box"><img src="{{ asset('images/logo-arum.png') }}" alt="Logo"></div></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <!-- MODAL DETAIL PROGRAM KEPEMUDAAN -->
        <div class="modal fade" id="programDetailModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="modal-header-banner d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="fw-bold mb-0 text-white" id="modalProgramTitle"><i class="fa-solid fa-circle-info me-2"></i> Detail Program</h5>
                            <p class="fs-7 text-white opacity-75 mb-0">Informasi lengkap kegiatan Karang Taruna ARUM</p>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <span class="badge bg-primary px-3 py-1.5 rounded-pill fs-7 mb-2" id="modalProgramBadge">Agenda Rutin</span>
                            <h4 class="fw-bold text-dark" id="modalProgramHeading">Judul Program</h4>
                        </div>
                        <p class="text-muted fs-6 leading-relaxed" id="modalProgramDesc">Deskripsi detail program akan tampil di sini.</p>
                        <div class="p-3 bg-light rounded-4 border mt-3">
                            <h6 class="fw-bold text-dark fs-7 mb-2"><i class="fa-solid fa-clock text-primary me-2"></i> Jadwal & Ketentuan Pelaksanaan:</h6>
                            <p class="text-muted fs-7 mb-0" id="modalProgramSchedule">Jadwal kegiatan...</p>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-top-0 p-3">
                        <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL UTAMA KOTAK ASPIRASI (WARGA & ADMIN) -->
        <div class="modal fade" id="kotakAspirasiModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" id="printableAspirasiSection">
                    
                    <div class="print-header-kop">
                        <h3>KARANG TARUNA ARUM BLOK KPK</h3>
                        <h4>Desa Barepan, Kecamatan Cawas, Kabupaten Klaten, Jawa Tengah 57463</h4>
                        <p><strong>REKAPITULASI LAPORAN PENGADUAN & ASPIRASI WARGA</strong></p>
                    </div>

                    <div class="modal-header-banner d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="fw-bold mb-0 text-white"><i class="fa-solid fa-comments me-2"></i> Kotak Aspirasi & Aduan Warga Blok KPK</h5>
                            <p class="fs-7 text-white opacity-75 mb-0">Sampaikan aspirasi, keluhan fasilitas umum, atau usulan acara demi kemajuan desa</p>
                        </div>
                        <div class="d-flex align-items-center gap-2 no-print">
                            <button type="button" class="btn btn-light text-primary btn-sm rounded-pill px-3 fw-bold" onclick="window.print()">
                                <i class="fa-solid fa-print me-1"></i> Cetak Laporan
                            </button>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>

                    <div class="modal-body p-4">
                        <div id="aspirasiSuccessAlert" class="alert alert-success d-none align-items-center gap-2 rounded-3 shadow-sm mb-3" role="alert">
                            <i class="fa-solid fa-circle-check fs-4"></i>
                            <div>
                                <strong>Aspirasi Berhasil Dikirim!</strong> Terima kasih. Pengurus Karang Taruna akan segera meninjau dan menindaklanjuti laporan Anda.
                            </div>
                        </div>

                        <div class="card border-0 bg-light rounded-4 p-4 mb-4 no-print" id="formAspirasiContainer">
                            <h6 class="fw-bold text-primary mb-3"><i class="fa-solid fa-pen-nib me-2"></i> Formulir Pengisian Aspirasi / Aduan Warga</h6>
                            <form id="aspirasiForm">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="isAnonymous" onchange="toggleAnonymousMode()">
                                            <label class="form-check-label fw-semibold fs-7 text-dark" for="isAnonymous">
                                                Kirim sebagai Anonim (Sembunyikan nama asli warga untuk privasi)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="fieldNamaWarga">
                                        <label class="form-label fw-semibold fs-7 mb-1">Nama Lengkap</label>
                                        <input type="text" id="aspNama" class="form-control rounded-3" placeholder="Nama warga...">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold fs-7 mb-1">Wilayah RT</label>
                                        <select id="aspRt" class="form-select rounded-3">
                                            <option value="RT 01">RT 01</option>
                                            <option value="RT 02">RT 02</option>
                                            <option value="RT 03">RT 03</option>
                                            <option value="RT 04">RT 04</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold fs-7 mb-1">Wilayah RW</label>
                                        <select id="aspRw" class="form-select rounded-3">
                                            <option value="RW 01">RW 01</option>
                                            <option value="RW 02">RW 02</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold fs-7 mb-1">Nomor WhatsApp</label>
                                        <input type="text" id="aspWa" class="form-control rounded-3" placeholder="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold fs-7 mb-1">Kategori Aspirasi </label>
                                        <select id="aspKategori" class="form-select rounded-3" required>
                                            <option value="Fasilitas Umum">Fasilitas Umum (Jalan rusak, penerangan, dll)</option>
                                            <option value="Kebersihan">Kebersihan (Sampah, saluran air, dll)</option>
                                            <option value="Keamanan">Keamanan & Ketertiban Lingkungan</option>
                                            <option value="Usulan Acara">Usulan Acara / Kegiatan Pemuda</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold fs-7 mb-1">Bukti Foto Pendukung</label>
                                        <input type="file" id="aspFoto" class="form-control rounded-3" accept="image/*">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold fs-7 mb-1">Isi Aspirasi</label>
                                        <textarea id="aspIsi" class="form-control rounded-3" rows="3" placeholder="Tuliskan secara detail laporan atau gagasan Anda di sini..." required></textarea>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="button" class="btn btn-success rounded-pill px-5 fw-bold" onclick="submitAspirasiWarga()">
                                            <i class="fa-solid fa-paper-plane me-1"></i> Kirim Aspirasi Sekarang
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3 no-print">
                            <h6 class="fw-bold text-dark m-0"><i class="fa-solid fa-clipboard-list me-2 text-primary"></i> Daftar Transparansi Aspirasi Warga</h6>
                            <span class="badge bg-primary px-3 py-2 rounded-pill fs-7" id="totalAspirasiBadge">Total: 0 Laporan</span>
                        </div>

                        <div class="transparansi-table-wrapper" id="listAspirasiContainer"></div>

                        <div class="print-footer-ttd">
                            <div class="print-ttd-box">
                                <p>Mengetahui,<br><strong>Ketua RW 01 / RW 02</strong></p>
                                <div class="print-ttd-space"></div>
                                <p><strong>( .................................... )</strong></p>
                            </div>
                            <div class="print-ttd-box">
                                <p>Barepan, <span id="printCurrentDate"></span><br><strong>Ketua Karang Taruna ARUM</strong></p>
                                <div class="print-ttd-space"></div>
                                <p><strong>( .................................... )</strong></p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light border-top-0 p-3 no-print">
                        <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL DETAIL ISI FOTO ALBUM PUBLIK (READ-ONLY) -->
        <div class="modal fade" id="albumDetailPublicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="modal-header-banner d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="fw-bold mb-0 text-white" id="albumDetailPublicTitle"><i class="fa-solid fa-folder-open me-2"></i> Detail Album</h5>
                            <p class="fs-7 text-white opacity-75 mb-0" id="albumDetailPublicDesc">Koleksi foto kegiatan</p>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="row g-3" id="publicPhotoGridContainer"></div>
                    </div>

                    <div class="modal-footer bg-light border-top-0 p-3 justify-content-end">
                        <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <footer class="official-footer">
            <div class="container">
                <div class="row g-4 text-start mb-4 pb-4 border-bottom border-secondary border-opacity-25">
                    <div class="col-lg-5">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="{{ asset('images/logo-arum.png') }}" alt="Logo" style="height: 42px; background:#fff; padding:4px; border-radius:6px;">
                            <div>
                                <h5 class="fw-bold mb-0 text-white">KARANG TARUNA ARUM</h5>
                                <p class="text-white fs-7 mb-0 fw-semibold opacity-100">Anggayuh Rukun Utamaning Muda</p>
                            </div>
                        </div>
                        <p class="text-light opacity-75 fs-7 leading-relaxed mb-3">
                            Wadah organisasi pemuda Blok KPK Desa Barepan yang berdedikasi membangun kerukunan, kreativitas, dan pemberdayaan masyarakat desa secara inklusif.
                        </p>
                        <div class="footer-social-icons">
                            <a href="https://www.instagram.com/karangtarunarum?cplk=M2o0bjMwNjVzd3Nh" target="_blank" title="Instagram Karang Taruna ARUM"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://www.tiktok.com/@karangtarunarum?_r=1&_t=ZS-9AW58q1zhHW" target="_blank" title="TikTok Karang Taruna ARUM"><i class="fa-brands fa-tiktok"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <h6 class="fw-bold text-white mb-3 text-uppercase fs-7"><i class="fa-solid fa-location-dot me-2 text-primary"></i> Alamat</h6>
                        <p class="text-light opacity-75 fs-7 mb-2">
                            📍 <strong>Balai Pertemuan Pemuda Blok KPK</strong><br>
                            Desa Barepan, Kecamatan Cawas, Kabupaten Klaten, Jawa Tengah 57463
                        </p>
                        <p class="text-light opacity-75 fs-7 mb-0">
                            🏛️ <strong>Cakupan Wilayah:</strong> RT 01, RT 02, RT 03, RT 04
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <h6 class="fw-bold text-white mb-3 text-uppercase fs-7"><i class="fa-solid fa-headset me-2 text-primary"></i> Kontak & Layanan</h6>
                        <ul class="footer-link-list fs-7">
                            <li><i class="fa-brands fa-whatsapp me-2 text-success"></i> WhatsApp Ketua Karang Taruna: +62 858-7639-5698</li>
                            <li><i class="fa-solid fa-envelope me-2 text-warning"></i> Email: karangtaruna.arum@gmail.com</li>
                            <li><i class="fa-solid fa-clock me-2 text-info"></i> Jam Operasional: Setiap Hari (08.00 - 20.00 WIB)</li>
                        </ul>
                    </div>
                </div>

                <div class="text-center">
                    <p class="text-muted fs-7 mb-0">&copy; {{ date('Y') }} ARUM Digital Platform. All Rights Reserved. Karang Taruna Blok KPK Barepan.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        const programDetailsData = {
            'sosial': {
                title: 'Kegiatan Sosial & Donor Darah',
                badge: 'Program Kemanusiaan',
                desc: 'Program rutin Karang Taruna ARUM untuk membantu warga Blok KPK yang membutuhkan bantuan darurat, santunan sosial bagi warga kurang mampu, serta kerja sama berkala dengan PMI Kabupaten Klaten untuk agenda donor darah massal di balai pertemuan.',
                schedule: 'Dilaksanakan setiap 3 bulan sekali atau kondisional saat ada warga yang memerlukan bantuan mendesak.'
            },
            'olahraga': {
                title: 'Olahraga & Seni Kebudayaan',
                badge: 'Minat & Bakat Pemuda',
                desc: 'Wadah penyaluran hobi dan bakti pemuda meliputi latihan voli rutin antar-RT, turnamen persahabatan, serta latihan kesenian tradisional (karawitan & tari) guna melestarikan budaya lokal serta mempersiapkan acara pentas seni HUT RI.',
                schedule: 'Latihan voli rutin setiap Selasa & Jumat sore di lapangan desa.'
            },
            'keagamaan': {
                title: 'Keagamaan & Kerukunan Warga',
                badge: 'Pembinaan Karakter',
                desc: 'Membentuk pemuda yang berakhlak mulia melalui kegiatan kerohanian rutin, peringatan hari besar keagamaan, menjaga toleransi antarumat beragama, serta kerja bakti pemeliharaan sarana ibadah di lingkungan Blok KPK.',
                schedule: 'Pengajian rutin dilaksanakan setiap Minggu pagi.'
            },
            'ekonomi': {
                title: 'Pemberdayaan Ekonomi & UMKM',
                badge: 'Kemandirian Pemuda',
                desc: 'Mendukung kemandirian finansial pemuda melalui pelatihan kewirausahaan digital, pengelolaan kas produktif karang taruna, dan promosi produk UMKM milik warga dan pemuda Blok KPK secara online.',
                schedule: 'Workshop dan pertemuan evaluasi ekonomi dilaksanakan setiap awal bulan.'
            },
            'lingkungan': {
                title: 'Gotong Royong & Kebersihan Lingkungan',
                badge: 'Aksi Nyata Warga',
                desc: 'Aksi kolosal pemuda bersama warga RT 01 sampai RT 04 untuk membersihkan saluran air (sungai kecil) guna mengantisipasi banjir saat musim hujan, penanaman pohon pelindung, serta penataan lampu penerangan jalan.',
                schedule: 'Agenda kerja bakti massal dilaksanakan setiap Minggu pagi (sebulan sekali).'
            }
        };

        function openProgramDetail(type) {
            forceCleanModals();
            const data = programDetailsData[type];
            if (!data) return;

            document.getElementById('modalProgramHeading').textContent = data.title;
            document.getElementById('modalProgramBadge').textContent = data.badge;
            document.getElementById('modalProgramDesc').textContent = data.desc;
            document.getElementById('modalProgramSchedule').textContent = data.schedule;

            const modalEl = document.getElementById('programDetailModal');
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }

        const defaultPengurusInti = [];
        const defaultAnggotaAktif = [];
        const defaultAlumniSenior = [];
        let activePublicAlbumId = null;

        function forceCleanModals() {
            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
            document.body.classList.remove('modal-open');
            document.body.style.overflow = '';
            document.body.style.paddingRight = '';
        }

        function getAllMembers() {
            let custom = JSON.parse(localStorage.getItem('arum_custom_members')) || [];
            
            let pengurusList = [];
            let anggotaList = [];
            let alumniList = [];

            const listPengurusKeywords = ["ketua", "wakil", "sekretaris", "bendahara", "seksi konsumsi"];
            const listAlumniKeywords = ["alumni", "senior", "penasihat", "pembina", "demisioner"];

            custom.forEach(m => {
                let jLower = (m.jabatan || "").toLowerCase();
                let isPengurus = listPengurusKeywords.some(kw => jLower.includes(kw));
                let isAlumni = listAlumniKeywords.some(kw => jLower.includes(kw));

                if (isPengurus) {
                    pengurusList.push(m);
                } else if (isAlumni) {
                    alumniList.push(m);
                } else {
                    anggotaList.push(m);
                }
            });

            return { pengurus: pengurusList, anggota: anggotaList, alumni: alumniList };
        }

        function updateCounters() {
            const all = getAllMembers();
            document.getElementById('badgeCountPengurus').textContent = `${all.pengurus.length} Pengurus`;
            document.getElementById('badgeCountAnggota').textContent = `${all.anggota.length} Pemuda`;
            document.getElementById('badgeCountAlumni').textContent = `${all.alumni.length} Senior`;
        }

        function initAspirasiInitialSeed() {
            let list = JSON.parse(localStorage.getItem('arum_kotak_aspirasi'));
            if (!list || list.length === 0) {
                const seed = [
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
                    },
                    {
                        id: 'asp_2',
                        nama: 'Warga Anonim',
                        rt: 'RT 02',
                        rw: 'RW 01',
                        wa: '08987654321',
                        kategori: 'Kebersihan',
                        isi: 'Usul diadakannya kerja bakti pembersihan saluran air menjelang musim hujan.',
                        foto: '',
                        status: 'Selesai',
                        keterangan_admin: 'Kerja bakti telah dilaksanakan pada Minggu pagi',
                        tanggal: '12 Oktober 2026',
                        is_anonymous: true
                    }
                ];
                localStorage.setItem('arum_kotak_aspirasi', JSON.stringify(seed));
            }
        }

        function openKotakAspirasiModal(autoOpenForm = false) {
            forceCleanModals();
            initAspirasiInitialSeed();
            renderAspirasiList();

            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            document.getElementById('printCurrentDate').textContent = new Date().toLocaleDateString('id-ID', options);

            const formContainer = document.getElementById('formAspirasiContainer');
            if (autoOpenForm) {
                formContainer.classList.remove('d-none');
            } else {
                formContainer.classList.add('d-none');
            }

            const modalEl = document.getElementById('kotakAspirasiModal');
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }

        function toggleAnonymousMode() {
            const isAnon = document.getElementById('isAnonymous').checked;
            const fieldNama = document.getElementById('fieldNamaWarga');
            if (isAnon) {
                fieldNama.style.display = 'none';
            } else {
                fieldNama.style.display = 'block';
            }
        }

        function submitAspirasiWarga() {
            const isAnon = document.getElementById('isAnonymous').checked;
            const nama = isAnon ? 'Warga Anonim' : document.getElementById('aspNama').value.trim();
            const rt = document.getElementById('aspRt').value;
            const rw = document.getElementById('aspRw').value;
            const wa = document.getElementById('aspWa').value.trim();
            const kategori = document.getElementById('aspKategori').value;
            const isi = document.getElementById('aspIsi').value.trim();
            const fotoInput = document.getElementById('aspFoto');

            if ((!isAnon && !nama) || !wa || !isi) {
                alert('Mohon lengkapi kolom nama, nomor WhatsApp, dan isi aspirasi!');
                return;
            }

            let list = JSON.parse(localStorage.getItem('arum_kotak_aspirasi')) || [];

            const processSave = (fotoData) => {
                const newAsp = {
                    id: 'asp_' + Date.now(),
                    nama: nama,
                    rt: rt,
                    rw: rw,
                    wa: wa,
                    kategori: kategori,
                    isi: isi,
                    foto: fotoData || '',
                    status: 'Menunggu',
                    keterangan_admin: '',
                    tanggal: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }),
                    is_anonymous: isAnon
                };

                list.unshift(newAsp);
                localStorage.setItem('arum_kotak_aspirasi', JSON.stringify(list));

                renderAspirasiList();
                document.getElementById('formAspirasiContainer').classList.add('d-none');

                document.getElementById('aspirasiSuccessAlert').classList.remove('d-none');
                setTimeout(() => {
                    document.getElementById('aspirasiSuccessAlert').classList.add('d-none');
                }, 5000);
            };

            if (fotoInput.files && fotoInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) { processSave(e.target.result); };
                reader.readAsDataURL(fotoInput.files[0]);
            } else {
                processSave('');
            }
        }

        function renderAspirasiList() {
            initAspirasiInitialSeed();
            let list = JSON.parse(localStorage.getItem('arum_kotak_aspirasi')) || [];
            const container = document.getElementById('listAspirasiContainer');
            document.getElementById('totalAspirasiBadge').textContent = `Total: ${list.length} Laporan`;

            if (list.length === 0) {
                container.innerHTML = `<div class="text-center py-4 text-muted fs-7">Belum ada aspirasi atau aduan warga yang masuk.</div>`;
                return;
            }

            let html = `
                <div class="table-responsive">
                    <table class="table table-transparansi">
                        <thead>
                            <tr>
                                <th style="width: 5%; text-align: center;">No</th>
                                <th style="width: 15%;">Tanggal</th>
                                <th style="width: 20%;">Pelapor & Wilayah</th>
                                <th style="width: 15%;">Kategori</th>
                                <th style="width: 30%;">Isi Aspirasi / Aduan</th>
                                <th style="width: 15%; text-align: center;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
            `;

            list.forEach((item, idx) => {
                let badgeStatusClass = 'bg-secondary';
                if (item.status === 'Menunggu') badgeStatusClass = 'bg-warning text-dark';
                else if (item.status === 'Diproses') badgeStatusClass = 'bg-info text-dark';
                else if (item.status === 'Selesai') badgeStatusClass = 'bg-success text-white';

                let fotoThumb = item.foto ? `<div class="mt-2"><a href="${item.foto}" target="_blank"><img src="${item.foto}" alt="Bukti" style="max-height: 60px; border-radius: 6px; border: 1px solid #cbd5e1;"></a></div>` : '';
                let ketAdminBox = item.keterangan_admin ? `<div class="mt-2 p-2 bg-light border-start border-3 border-info rounded fs-8 text-secondary"><i class="fa-solid fa-comment-dots me-1 text-info"></i> <strong>Tanggapan:</strong> ${item.keterangan_admin}</div>` : '';

                html += `
                    <tr>
                        <td style="text-align: center; font-weight: bold; color: var(--text-muted);">${idx + 1}</td>
                        <td>
                            <div class="fw-semibold text-dark" style="font-size: 0.88rem;"><i class="fa-solid fa-calendar-days me-1 text-primary"></i> ${item.tanggal}</div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">${item.nama}</div>
                            <div class="text-muted fs-8"><i class="fa-solid fa-location-dot text-danger me-1"></i> ${item.rt} / ${item.rw}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-primary border px-2 py-1 fs-8 fw-semibold">${item.kategori}</span>
                        </td>
                        <td>
                            <div class="text-dark" style="line-height: 1.5;">${item.isi}</div>
                            ${ketAdminBox}
                            ${fotoThumb}
                        </td>
                        <td style="text-align: center;">
                            <span class="badge ${badgeStatusClass} px-3 py-2 rounded-pill fw-bold" style="font-size: 0.78rem;">${item.status}</span>
                        </td>
                    </tr>
                `;
            });

            html += `
                        </tbody>
                    </table>
                </div>
            `;

            container.innerHTML = html;
        }

        /*
         * ============================================================
         * DOKUMENTASI PUBLIK
         * ============================================================
         * Data album dibuat dari home.blade.php dan disimpan dengan key bersama:
         * arum_galeri_albums_shared
         *
         * welcome.blade.php hanya membaca/menampilkan data tersebut.
         * Tidak ada proses tambah/edit/hapus di halaman publik.
         *
         * Fallback ke key lama dipertahankan agar data dokumentasi lama
         * tetap bisa dibaca jika belum dimigrasikan oleh home.blade.php.
         */

        const PUBLIC_DOCUMENTATION_KEY = 'arum_galeri_albums_shared';
        const OLD_DOCUMENTATION_KEY = 'arum_galeri_albums';

        function getPublicAlbums() {
            try {
                const raw = localStorage.getItem(PUBLIC_DOCUMENTATION_KEY)
                    || localStorage.getItem(OLD_DOCUMENTATION_KEY);

                if (!raw) {
                    return [];
                }

                const albums = JSON.parse(raw);

                if (!Array.isArray(albums)) {
                    return [];
                }

                return albums;
            } catch (error) {
                console.error('Gagal membaca data dokumentasi publik:', error);
                return [];
            }
        }

        function escapePublicHtml(value) {
            return String(value ?? '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        function renderPublicAlbumGrid() {
            const albums = getPublicAlbums();
            const container = document.getElementById('publicAlbumGridContainer');

            if (!container) return;

            if (albums.length === 0) {
                container.innerHTML = `
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fa-solid fa-images fs-1 mb-2 d-block opacity-50"></i>
                        Belum ada album dokumentasi yang dipublikasikan.
                    </div>
                `;
                return;
            }

            let html = '';

            albums.forEach(alb => {
                const coverSrc = alb.cover || 'https://via.placeholder.com/500x300?text=No+Cover';
                const photoCount = Array.isArray(alb.photos) ? alb.photos.length : 0;

                const safeId = encodeURIComponent(String(alb.id ?? ''));
                const safeTitle = escapePublicHtml(alb.title || 'Tanpa Judul');
                const safeDesc = escapePublicHtml(alb.desc || 'Tidak ada deskripsi.');

                html += `
                    <div class="col-md-6 col-lg-4">
                        <div class="album-card-readonly"
                             onclick="openPublicAlbumDetail(decodeURIComponent('${safeId}'))">

                            <img src="${coverSrc}"
                                 class="album-cover-ro"
                                 alt="${safeTitle}"
                                 loading="lazy"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/500x300?text=No+Cover';">

                            <div class="p-3">
                                <h6 class="fw-bold text-dark mb-1">${safeTitle}</h6>

                                <p class="text-muted fs-8 mb-2 text-truncate">
                                    ${safeDesc}
                                </p>

                                <span class="badge bg-light text-primary border rounded-pill fs-8">
                                    <i class="fa-solid fa-image me-1"></i>
                                    ${photoCount} Foto
                                </span>
                            </div>
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;
        }

        function openPublicAlbumDetail(id) {
            forceCleanModals();

            activePublicAlbumId = id;

            const albums = getPublicAlbums();
            const alb = albums.find(a => String(a.id) === String(id));

            if (!alb) {
                renderPublicAlbumGrid();
                return;
            }

            document.getElementById('albumDetailPublicTitle').innerHTML =
                `<i class="fa-solid fa-folder-open me-2"></i> ${escapePublicHtml(alb.title || 'Detail Album')}`;

            document.getElementById('albumDetailPublicDesc').textContent =
                alb.desc || 'Koleksi foto kegiatan';

            renderPublicPhotoGrid(alb);

            const modalEl = document.getElementById('albumDetailPublicModal');

            if (!modalEl) return;

            const detailModal = bootstrap.Modal.getOrCreateInstance(modalEl);
            detailModal.show();
        }

        function renderPublicPhotoGrid(alb) {
            const container = document.getElementById('publicPhotoGridContainer');

            if (!container) return;

            const photos = Array.isArray(alb.photos) ? alb.photos : [];

            if (photos.length === 0) {
                container.innerHTML = `
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fa-solid fa-image fs-1 mb-2 d-block opacity-50"></i>
                        Belum ada foto di dalam album ini.
                    </div>
                `;
                return;
            }

            let html = '';

            photos.forEach((photoUrl, photoIdx) => {
                html += `
                    <div class="col-md-4 col-lg-3">
                        <div class="gallery-photo-card-ro">
                            <img src="${photoUrl}"
                                 alt="Foto ${photoIdx + 1}"
                                 loading="lazy"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400?text=Foto+Tidak+Tersedia';">
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;
        }

        /*
         * Jika home.blade.php dibuka di tab lain, perubahan localStorage
         * akan langsung membuat dokumentasi publik diperbarui.
         *
         * Jika halaman welcome sedang dibuka di tab yang sama, perubahan
         * akan terlihat saat section Dashboard ditampilkan kembali / reload.
         */
        window.addEventListener('storage', function(event) {
            if (event.key !== PUBLIC_DOCUMENTATION_KEY && event.key !== OLD_DOCUMENTATION_KEY) return;

            renderPublicAlbumGrid();

            // Jika detail album sedang terbuka, tampilkan data terbaru juga.
            if (activePublicAlbumId) {
                const albums = getPublicAlbums();
                const alb = albums.find(
                    a => String(a.id) === String(activePublicAlbumId)
                );

                if (alb) {
                    const titleEl = document.getElementById('albumDetailPublicTitle');
                    const descEl = document.getElementById('albumDetailPublicDesc');

                    if (titleEl) {
                        titleEl.innerHTML =
                            `<i class="fa-solid fa-folder-open me-2"></i> ${escapePublicHtml(alb.title || 'Detail Album')}`;
                    }

                    if (descEl) {
                        descEl.textContent = alb.desc || 'Koleksi foto kegiatan';
                    }

                    renderPublicPhotoGrid(alb);
                }
            }
        });

        window.addEventListener('DOMContentLoaded', () => {
            updateCounters();
            renderPublicAlbumGrid();
        });

        const canvas = document.getElementById('particle-canvas');
        const ctx = canvas.getContext('2d');
        function resizeCanvas() { canvas.width = window.innerWidth; canvas.height = window.innerHeight; }
        resizeCanvas(); window.addEventListener('resize', resizeCanvas);

        const particles = [];
        for (let i = 0; i < 45; i++) {
            particles.push({
                x: Math.random() * canvas.width, y: Math.random() * canvas.height,
                radius: Math.random() * 2.5 + 1, vx: (Math.random() - 0.5) * 0.45, vy: (Math.random() - 0.5) * 0.45, alpha: Math.random() * 0.35 + 0.15
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

        const dashboardView = document.getElementById('mainDashboardView');
        const memberListView = document.getElementById('memberListView');
        const masukView = document.getElementById('masukFormView');
        const registerView = document.getElementById('registerFormView');

        function hideAllViews() {
            dashboardView.classList.add('hide-view');
            memberListView.classList.add('hide-view');
            masukView.classList.add('hide-view');
            registerView.classList.add('hide-view');

            dashboardView.classList.remove('page-fade-anim');
            memberListView.classList.remove('page-fade-anim');
            masukView.classList.remove('page-fade-anim');
            registerView.classList.remove('page-fade-anim');
        }

        function triggerAnim(element) {
            hideAllViews();
            element.classList.remove('hide-view');
            void element.offsetWidth;
            element.classList.add('page-fade-anim');
        }

        function showDashboardView() { 
            triggerAnim(dashboardView); 
            updateCounters(); 
            renderPublicAlbumGrid(); 
            window.scrollTo({ top: 0, behavior: 'smooth' }); 
        }
        function togglePasswordVisibility(button) {
            const wrapper = button.closest('.password-field');
            const input = wrapper ? wrapper.querySelector('input') : null;
            const icon = button.querySelector('i');
            if (!input) return;
            const reveal = input.type === 'password';
            input.type = reveal ? 'text' : 'password';
            button.setAttribute('aria-pressed', reveal ? 'true' : 'false');
            button.setAttribute('aria-label', reveal ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
            if (icon) {
                icon.classList.toggle('fa-eye', !reveal);
                icon.classList.toggle('fa-eye-slash', reveal);
            }
        }

        function showMasukView() { triggerAnim(masukView); window.scrollTo({ top: 0, behavior: 'smooth' }); }
        function showRegisterView() { triggerAnim(registerView); window.scrollTo({ top: 0, behavior: 'smooth' }); }

        function showMemberList(category) {
            triggerAnim(memberListView);
            
            const cardsContainer = document.getElementById('memberGridCards');
            const titleEl = document.getElementById('listCategoryTitle');
            const badgeEl = document.getElementById('listCategoryBadge');
            const subtitleEl = document.getElementById('listCategorySubtitle');

            const allData = getAllMembers();
            let selectedData = [];
            let isVIP = false;

            if (category === 'pengurus') {
                selectedData = allData.pengurus;
                titleEl.textContent = 'Daftar Pengurus Inti ARUM';
                badgeEl.textContent = 'PENGURUS HARIAN';
                subtitleEl.textContent = 'Jajaran pimpinan inti Karang Taruna Blok KPK Barepan';
                isVIP = true;
            } else if (category === 'anggota') {
                selectedData = allData.anggota;
                titleEl.textContent = 'Daftar Anggota Aktif';
                badgeEl.textContent = 'PEMUDA BLOK KPK';
                subtitleEl.textContent = 'Daftar pemuda & pemudi terdaftar yang aktif dalam pembangunan desa';
                isVIP = false;
            } else {
                selectedData = allData.alumni;
                titleEl.textContent = 'Daftar Alumni & Senior';
                badgeEl.textContent = 'PENASEHAT & DEMISIONER';
                subtitleEl.textContent = 'Tokoh pilar kepemudaan yang membimbing generasi muda';
                isVIP = false;
            }

            if (selectedData.length === 0) {
                cardsContainer.innerHTML = `
                    <div class="col-12 text-center py-5">
                        <div class="mb-3 text-muted fs-1"><i class="fa-solid fa-folder-open"></i></div>
                        <h5 class="fw-bold text-dark mb-1">Belum Ada Data Anggota</h5>
                        <p class="text-muted fs-7">Data anggota untuk kategori ini masih kosong. Tambahkan data baru dari Dashboard Anggota.</p>
                    </div>
                `;
                return;
            }

            let cardsHtml = '';
            selectedData.forEach(item => {
                const avatarContent = item.foto 
                    ? `<img src="${item.foto}" alt="${item.nama}">` 
                    : `<i class="fa-solid fa-user"></i>`;

                cardsHtml += `
                    <div class="col-md-6 col-lg-3">
                        <div class="member-card-exec">
                            <div class="member-banner-exec"></div>
                            <div class="member-avatar-box">${avatarContent}</div>
                            <div class="text-center px-3 pb-4">
                                <span class="${isVIP ? 'badge-role-vip' : 'badge-role-regular'}">
                                    ${isVIP ? '<i class="fa-solid fa-star me-1"></i>' : ''}${item.jabatan}
                                </span>
                                <h5 class="fw-bold text-dark mb-1 fs-6">${item.nama}</h5>
                                <p class="text-muted mb-2" style="font-size: 0.82rem;">
                                    <i class="fa-solid fa-cake-candles me-1 text-primary"></i> Umur: ${item.umur}
                                </p>
                                <div class="pt-2 border-top text-secondary fw-semibold" style="font-size: 0.8rem;">
                                    <i class="fa-solid fa-location-dot me-1 text-danger"></i> Wilayah: ${item.rt}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            cardsContainer.innerHTML = cardsHtml;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        /* --- TRANSPARANSI KEUANGAN PUBLIK --- */
        const PUBLIC_FINANCE_EXPENSE_KEY='arum_keuangan_pengeluaran';
        const PUBLIC_FINANCE_INCOME_KEY='arum_keuangan_pemasukan';
        function publicFinanceRp(v){return `Rp ${Number(v||0).toLocaleString('id-ID')}`;}
        function publicFinanceDateKey(x){if(x?.tanggal_iuran_iso&&/^\d{4}-\d{2}-\d{2}$/.test(x.tanggal_iuran_iso))return x.tanggal_iuran_iso;const raw=String(x?.tanggal_iuran||'').trim(),months={januari:0,februari:1,maret:2,april:3,mei:4,juni:5,juli:6,agustus:7,september:8,oktober:9,november:10,desember:11},m=raw.match(/^(\d{1,2})\s+([A-Za-z]+)\s+(\d{4})$/i);if(!m)return null;const mo=months[m[2].toLowerCase()];if(mo===undefined)return null;const d=new Date(+m[3],mo,+m[1]);if(isNaN(d.getTime()))return null;return `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`;}
        function publicFinanceDonationDateKey(x){const raw=String(x?.tanggal||'').trim(),months={januari:0,februari:1,maret:2,april:3,mei:4,juni:5,juli:6,agustus:7,september:8,oktober:9,november:10,desember:11},m=raw.match(/^(\d{1,2})\s+([A-Za-z]+)\s+(\d{4})/i);if(!m)return null;const mo=months[m[2].toLowerCase()];if(mo===undefined)return null;const d=new Date(+m[3],mo,+m[1]);if(isNaN(d.getTime()))return null;return `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`;}
        function publicFinanceDate(k){const d=new Date(`${k}T00:00:00`);return !k||isNaN(d.getTime())?'-':d.toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric'});}
        function getPublicFinanceSummary(){let kas=[],donasi=[],manualIncome=[],exp=[];try{kas=JSON.parse(localStorage.getItem('arum_kas_history'))||[]}catch(e){}try{donasi=JSON.parse(localStorage.getItem('arum_donasi_alumni_history'))||[]}catch(e){}try{manualIncome=JSON.parse(localStorage.getItem(PUBLIC_FINANCE_INCOME_KEY))||[]}catch(e){}try{exp=JSON.parse(localStorage.getItem(PUBLIC_FINANCE_EXPENSE_KEY))||[]}catch(e){}const i={},e={};const add=(k,a)=>{if(k&&a>0)i[k]=(i[k]||0)+a;};kas.forEach(x=>add(publicFinanceDateKey(x),Number(x?.nominal||0)));donasi.forEach(x=>add(publicFinanceDonationDateKey(x),Number(x?.nominal||0)));manualIncome.forEach(x=>add(x?.tanggal,Number(x?.nominal||0)));exp.forEach(x=>{const k=x?.tanggal,a=Number(x?.nominal||0);if(k&&a>0)e[k]=(e[k]||0)+a;});const dates=[...new Set([...Object.keys(i),...Object.keys(e)])].sort();let running=0;const daily=dates.map(k=>{const inc=i[k]||0,out=e[k]||0,net=inc-out;running+=net;return{key:k,income:inc,expense:out,net,running};});return{daily,totalIncome:Object.values(i).reduce((a,b)=>a+b,0),totalExpense:Object.values(e).reduce((a,b)=>a+b,0)};}
        function renderPublicFinance(){const s=getPublicFinanceSummary(),ie=document.getElementById('publicFinanceTotalIncome'),ee=document.getElementById('publicFinanceTotalExpense'),be=document.getElementById('publicFinanceBalance'),body=document.getElementById('publicFinanceDailyBody');if(!ie||!ee||!be||!body)return;ie.textContent=publicFinanceRp(s.totalIncome);ee.textContent=publicFinanceRp(s.totalExpense);be.textContent=publicFinanceRp(s.totalIncome-s.totalExpense);body.innerHTML=s.daily.length?s.daily.map(r=>`<tr><td class="fw-semibold">${publicFinanceDate(r.key)}</td><td class="fw-bold text-success">${publicFinanceRp(r.income)}</td><td class="fw-bold text-danger">${publicFinanceRp(r.expense)}</td><td class="fw-bold ${r.net>=0?'text-success':'text-danger'}">${publicFinanceRp(r.net)}</td><td class="fw-bold text-primary">${publicFinanceRp(r.running)}</td></tr>`).join(''):`<tr><td colspan="5" class="text-center py-4 text-muted">Belum ada data transparansi keuangan.</td></tr>`;}
        function printPublicFinanceReport(){const s=getPublicFinanceSummary(),p=window.open('','_blank','width=1100,height=800');if(!p)return;const rows=s.daily.length?s.daily.map(r=>`<tr><td>${publicFinanceDate(r.key)}</td><td class="income">${publicFinanceRp(r.income)}</td><td class="expense">${publicFinanceRp(r.expense)}</td><td class="${r.net>=0?'income':'expense'}">${publicFinanceRp(r.net)}</td><td class="balance">${publicFinanceRp(r.running)}</td></tr>`).join(''):'<tr><td colspan="5" class="empty">Belum ada data.</td></tr>';p.document.write(`<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><title>Transparansi Keuangan Karang Taruna ARUM</title><style>@page{size:A4 portrait;margin:12mm}*{box-sizing:border-box}body{font-family:Arial,Helvetica,sans-serif;margin:0;background:#f4f7fb;color:#172033;-webkit-print-color-adjust:exact;print-color-adjust:exact}.sheet{max-width:980px;margin:auto;background:#fff;min-height:100vh;padding:28px 30px}.kop{background:linear-gradient(135deg,#0a66c2,#004182);color:#fff;border-radius:16px;padding:22px 24px}.kop h1{margin:0;font-size:23px}.kop p{margin:7px 0 0;font-size:11px;opacity:.9}.meta{margin:14px 0;padding:10px 13px;background:#eef6ff;border-left:4px solid #0a66c2;border-radius:8px;font-size:11px}.summary{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin:18px 0}.box{border-radius:12px;padding:15px;border:1px solid #dce5f0}.green{background:#ecfdf3;border-color:#bbf7d0}.red{background:#fff1f2;border-color:#fecdd3}.blue{background:#eff6ff;border-color:#bfdbfe}.label{font-size:9px;font-weight:700;color:#64748b;text-transform:uppercase}.value{font-size:18px;font-weight:800;margin-top:6px}.green .value{color:#15803d}.red .value{color:#dc2626}.blue .value{color:#1d4ed8}h2{font-size:14px;color:#0f3f78;border-bottom:2px solid #dbeafe;padding-bottom:7px;margin:22px 0 9px}table{width:100%;border-collapse:separate;border-spacing:0;border:1px solid #dbe3ee;border-radius:10px;overflow:hidden}th{background:#0a66c2;color:#fff;padding:9px;font-size:9px;text-align:left}td{padding:8px 9px;border-top:1px solid #e8edf3;font-size:9px}tr:nth-child(even) td{background:#f8fbff}.income{color:#15803d;font-weight:700}.expense{color:#dc2626;font-weight:700}.balance{color:#1d4ed8;font-weight:700}.empty{text-align:center;color:#64748b;padding:15px}.footer{margin-top:28px;padding-top:12px;border-top:1px solid #dbe3ee;display:flex;justify-content:space-between;font-size:9px;color:#64748b}</style></head><body><div class="sheet"><div class="kop"><h1>Transparansi Keuangan</h1><p>Karang Taruna ARUM • Rekap pemasukan dan pengeluaran</p></div><div class="meta"><b>Dicetak:</b> ${new Date().toLocaleString('id-ID')} &nbsp; | &nbsp; <b>Sumber pemasukan:</b> kas, donasi alumni/senior, dan pemasukan manual</div><div class="summary"><div class="box green"><div class="label">Total Pemasukan</div><div class="value">${publicFinanceRp(s.totalIncome)}</div></div><div class="box red"><div class="label">Total Pengeluaran</div><div class="value">${publicFinanceRp(s.totalExpense)}</div></div><div class="box blue"><div class="label">Saldo</div><div class="value">${publicFinanceRp(s.totalIncome-s.totalExpense)}</div></div></div><h2>Rekap Keuangan Per Tanggal</h2><table><thead><tr><th>Tanggal</th><th>Pemasukan</th><th>Pengeluaran</th><th>Saldo Hari Itu</th><th>Saldo Berjalan</th></tr></thead><tbody>${rows}</tbody></table><div class="footer"><span>Dokumen Transparansi Keuangan Karang Taruna ARUM</span><span>Data otomatis dari sistem</span></div></div></body></html>`);p.document.close();p.focus();setTimeout(()=>p.print(),350);}
        window.addEventListener('storage',e=>{if(['arum_kas_history','arum_donasi_alumni_history',PUBLIC_FINANCE_INCOME_KEY,PUBLIC_FINANCE_EXPENSE_KEY].includes(e.key))renderPublicFinance();});
        document.addEventListener('DOMContentLoaded',renderPublicFinance);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>