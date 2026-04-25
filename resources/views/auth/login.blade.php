<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login — Web Presentation App">
    <title>Login — Web Presentation App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; }

        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated background shapes */
        .bg-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.08;
            background: #fff;
            animation: floatShape 20s ease-in-out infinite;
        }
        .bg-shape:nth-child(1) { width: 400px; height: 400px; top: -100px; left: -100px; animation-delay: 0s; }
        .bg-shape:nth-child(2) { width: 250px; height: 250px; bottom: -50px; right: -50px; animation-delay: 5s; }
        .bg-shape:nth-child(3) { width: 180px; height: 180px; top: 40%; right: 10%; animation-delay: 10s; }
        .bg-shape:nth-child(4) { width: 120px; height: 120px; bottom: 20%; left: 15%; animation-delay: 7s; }

        @keyframes floatShape {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25%      { transform: translate(30px, -40px) scale(1.05); }
            50%      { transform: translate(-20px, 20px) scale(0.95); }
            75%      { transform: translate(15px, 30px) scale(1.02); }
        }

        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            padding: 0 1rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            animation: cardAppear 0.6s ease-out;
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: translateY(30px) scale(0.96); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        .login-header {
            text-align: center;
            padding: 2.5rem 2rem 1.5rem;
        }

        .login-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.25rem;
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.35);
        }

        .login-icon i {
            font-size: 1.75rem;
            color: #fff;
        }

        .login-header h2 {
            font-weight: 700;
            font-size: 1.5rem;
            color: #1a202c;
            margin-bottom: 0.35rem;
            letter-spacing: -0.02em;
        }

        .login-header p {
            color: #64748b;
            font-size: 0.9rem;
            margin: 0;
        }

        .login-body {
            padding: 0.5rem 2rem 2.5rem;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.8rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 0.4rem;
        }

        .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.7rem 1rem 0.7rem 2.8rem;
            font-size: 0.9rem;
            transition: all 0.25s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: #667eea;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
        }

        .input-group-icon {
            position: relative;
        }

        .input-group-icon .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
            z-index: 5;
            transition: color 0.25s ease;
        }

        .input-group-icon .form-control:focus ~ .input-icon,
        .input-group-icon .form-control:focus + .input-icon {
            color: #667eea;
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: #fff;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.75rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(102, 126, 234, 0.35);
            letter-spacing: 0.02em;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.45);
            color: #fff;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .invalid-feedback {
            font-size: 0.8rem;
            margin-top: 0.35rem;
        }

        .alert {
            border: none;
            border-radius: 10px;
            padding: 0.85rem 1rem;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: slideDown 0.35s ease-out;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .alert-danger {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            color: #991b1b;
        }

        .footer-text {
            text-align: center;
            padding: 1.5rem;
            color: rgba(255,255,255,0.7);
            font-size: 0.8rem;
        }

        /* Password toggle */
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            z-index: 5;
            padding: 0;
            font-size: 1rem;
            transition: color 0.25s ease;
        }

        .password-toggle:hover {
            color: #667eea;
        }
    </style>
</head>
<body>
    {{-- Animated bg shapes --}}
    <div class="bg-shape"></div>
    <div class="bg-shape"></div>
    <div class="bg-shape"></div>
    <div class="bg-shape"></div>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="login-icon">
                    <i class="bi bi-easel2-fill"></i>
                </div>
                <h2>Selamat Datang</h2>
                <p>Masuk ke akun creator Anda</p>
            </div>

            <div class="login-body">
                @if(session('error'))
                    <div class="alert alert-danger mb-3">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.process') }}" id="login-form">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="email-input">Email</label>
                        <div class="input-group-icon">
                            <i class="bi bi-envelope input-icon"></i>
                            <input
                                type="email"
                                name="email"
                                id="email-input"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', 'aprilyani.safitri@gmail.com') }}"
                                placeholder="nama@email.com"
                                autocomplete="email"
                            >

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="password-input">Password</label>
                        <div class="input-group-icon">
                            <i class="bi bi-lock input-icon"></i>
                            <input
                                type="password"
                                name="password"
                                id="password-input"
                                class="form-control @error('password') is-invalid @enderror"
                                value="123456"
                                placeholder="••••••••"
                                autocomplete="current-password"
                            >
                            <button type="button" class="password-toggle" id="toggle-password" onclick="togglePassword()">
                                <i class="bi bi-eye"></i>
                            </button>

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login" id="btn-login">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Masuk
                    </button>
                </form>
            </div>
        </div>

        <div class="footer-text">
            <i class="bi bi-heart-fill"></i> &nbsp;Web Presentation App &copy; {{ date('Y') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const input = document.getElementById('password-input');
            const icon = document.querySelector('#toggle-password i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>
</html>