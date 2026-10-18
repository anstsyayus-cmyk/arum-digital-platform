@extends('layouts.app')

@section('content')
<!-- Google Fonts & FontAwesome CDN -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Sembunyikan Navbar bawaan Laravel */
    nav.navbar {
        display: none !important;
    }

    * {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    body {
        /* Warna background Dark Teal/Emerald Premium */
        background: radial-gradient(circle at top right, #0f2b26 0%, #0a192f 60%, #030811 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }
    .auth-container {
        width: 100%;
        max-width: 450px;
        padding: 20px;
    }
    .card-auth {
        border: 1px solid rgba(255, 255, 255, 0.12);
        background: rgba(255, 255, 255, 0.97);
        backdrop-filter: blur(25px);
        border-radius: 28px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
        overflow: hidden;
    }
    .brand-logo-img {
        width: 100px;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 6px 12px rgba(16, 185, 129, 0.25));
        transition: transform 0.3s ease;
    }
    .brand-logo-img:hover {
        transform: scale(1.04);
    }
    .title-main {
        font-weight: 800;
        letter-spacing: -0.5px;
        color: #0f172a;
        font-size: 1.35rem;
    }
    .subtitle-text {
        font-size: 0.825rem;
        color: #64748b;
        font-weight: 600;
        line-height: 1.4;
    }
    .form-label-custom {
        color: #1e293b;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.3px;
        text-transform: uppercase;
    }
    .form-control-custom {
        border-radius: 12px;
        padding: 12px 16px;
        border: 1.5px solid #cbd5e1;
        font-size: 0.9rem;
        background-color: #f8fafc;
        color: #0f172a;
        transition: all 0.25s ease;
    }
    .form-control-custom:focus {
        border-color: #059669;
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.15);
    }
    .input-group-text-custom {
        background: #f8fafc;
        border: 1.5px solid #cbd5e1;
        border-left: none;
        border-top-right-radius: 12px;
        border-bottom-right-radius: 12px;
        cursor: pointer;
        color: #64748b;
    }
    .btn-login {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        border: none;
        border-radius: 12px;
        padding: 12px;
        font-weight: 700;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
        box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
        transition: all 0.3s ease;
    }
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(5, 150, 105, 0.4);
        background: linear-gradient(135deg, #047857 0%, #065f46 100%);
    }
    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        color: #94a3b8;
        font-size: 0.75rem;
        font-weight: 700;
        margin: 20px 0;
        letter-spacing: 0.5px;
    }
    .divider::before, .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e2e8f0;
    }
    .divider::before { margin-right: .8em; }
    .divider::after { margin-left: .8em; }

    .btn-social {
        border: 1.5px solid #cbd5e1;
        border-radius: 12px;
        padding: 10px;
        font-weight: 600;
        font-size: 0.85rem;
        color: #334155;
        background: #ffffff;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .btn-social:hover {
        background: #f1f5f9;
        border-color: #94a3b8;
        color: #0f172a;
    }
</style>

<div class="auth-container">
    <div class="card card-auth p-3 p-md-4">
        <div class="card-body">
            
            <!-- Logo Karang Taruna ARUM -->
            <div class="text-center mb-3">
                <img src="{{ asset('images/logo-arum.jpeg') }}" alt="Logo Karang Taruna ARUM" class="brand-logo-img mb-2">
                
                <h4 class="title-main mb-1">ARUM DIGITAL PLATFORM</h4>
                <p class="subtitle-text mb-0">Portal Resmi Pemuda Pemudi Blok KPK, Barepan</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Input Email / Phone -->
                <div class="mb-3">
                    <label for="email" class="form-label form-label-custom mb-1">Email / No. Telepon</label>
                    <input id="email" type="text" class="form-control form-control-custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Contoh: 08123456789 atau email@domain.com">
                    @error('email')
                        <span class="invalid-feedback d-block mt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Input Password + Show/Hide Toggle -->
                <div class="mb-3">
                    <label for="password" class="form-label form-label-custom mb-1">Kata Sandi</label>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control form-control-custom @error('password') is-invalid @enderror" name="password" required placeholder="••••••••" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                        <span class="input-group-text input-group-text-custom" id="togglePassword">
                            <i class="fa-regular fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback d-block mt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label small text-secondary fw-medium" for="remember">Ingat Saya</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none small text-success fw-bold" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-login text-white">
                        <i class="fa-solid fa-right-to-bracket me-2"></i> Masuk Sekarang
                    </button>
                </div>
            </form>

            <div class="divider">ATAU MASUK DENGAN</div>

            <!-- Google Login Button -->
            <div class="d-grid mb-3">
                <a href="#" class="btn btn-social">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.64 9.20455C17.64 8.56636 17.5827 7.95273 17.4764 7.36364H9V10.845H13.8436C13.635 11.97 13.0009 12.9232 12.0477 13.5614V15.8195H14.9564C16.6582 14.2527 17.64 11.9455 17.64 9.20455Z" fill="#4285F4"/>
                        <path d="M9 18C11.43 18 13.4673 17.1941 14.9564 15.8195L12.0477 13.5614C11.2418 14.1014 10.2109 14.4205 9 14.4205C6.65591 14.4205 4.67182 12.8373 3.96409 10.71H0.957275V13.0418C2.43818 15.9832 5.48182 18 9 18Z" fill="#34A853"/>
                        <path d="M3.96409 10.71C3.78409 10.17 3.68182 9.59318 3.68182 9C3.68182 8.40682 3.78409 7.83 3.96409 7.29V4.95818H0.957275C0.347727 6.17318 0 7.54773 0 9C0 10.4523 0.347727 11.8268 0.957275 13.0418L3.96409 10.71Z" fill="#FBBC05"/>
                        <path d="M9 3.57955C10.3214 3.57955 11.5077 4.03364 12.4405 4.92545L15.0218 2.34409C13.4632 0.891818 11.4259 0 9 0 C5.48182 0 2.43818 2.01682 0.957275 4.95818L3.96409 7.29C4.67182 5.16273 6.65591 3.57955 9 3.57955Z" fill="#EA4335"/>
                    </svg>
                    Lanjutkan dengan Google
                </a>
            </div>

            <!-- Footer Register Link -->
            <div class="text-center mt-4">
                <p class="small text-secondary mb-0">Belum terdaftar sebagai anggota? <br><a href="{{ route('register') }}" class="text-success fw-bold text-decoration-none">Daftar Akun Baru</a></p>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Toggle Show/Hide Password -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    });
</script>
@endsection