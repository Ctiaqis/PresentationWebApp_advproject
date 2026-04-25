<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web Presentation App — Kelola tutorial dan presentasi Anda dengan mudah.">
    <title>{{ $title ?? 'Web Presentation App' }}</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    {{-- Google Fonts: Inter --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --primary-color: #667eea;
            --primary-dark: #5a67d8;
            --accent-color: #764ba2;
            --accent-light: #9f7aea;
            --surface: #ffffff;
            --surface-hover: #f8f9ff;
            --bg-main: #f0f2f8;
            --text-primary: #1a202c;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 3px rgba(102, 126, 234, 0.08);
            --shadow-md: 0 4px 16px rgba(102, 126, 234, 0.12);
            --shadow-lg: 0 8px 32px rgba(102, 126, 234, 0.16);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: var(--bg-main);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── NAVBAR ────────────────────────────────────────── */
        .navbar-custom {
            background: var(--primary-gradient);
            border: none;
            padding: 0.75rem 0;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.25);
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.25rem;
            letter-spacing: -0.02em;
            color: #fff !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-custom .navbar-brand .brand-icon {
            width: 34px;
            height: 34px;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .navbar-custom .btn-logout {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.25);
            color: #fff;
            font-weight: 500;
            font-size: 0.85rem;
            padding: 0.45rem 1.1rem;
            border-radius: var(--radius-sm);
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .navbar-custom .btn-logout:hover {
            background: rgba(255,255,255,0.28);
            transform: translateY(-1px);
        }

        /* ── MAIN CONTENT ──────────────────────────────────── */
        main.container {
            flex: 1;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        /* ── CARDS ─────────────────────────────────────────── */
        .card {
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg) !important;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            overflow: hidden;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-header {
            background: var(--surface) !important;
            border-bottom: 1px solid var(--border-color);
            font-weight: 600;
            font-size: 1.05rem;
            padding: 1rem 1.5rem;
            color: var(--text-primary);
        }

        .card-header.card-header-gradient {
            background: var(--primary-gradient) !important;
            color: #fff;
            border-bottom: none;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* ── PAGE HEADER ───────────────────────────────────── */
        .page-header {
            margin-bottom: 1.5rem;
        }

        .page-header h3,
        .page-header h4 {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
            letter-spacing: -0.02em;
        }

        .page-header .text-muted {
            font-size: 0.9rem;
            color: var(--text-secondary) !important;
        }

        /* ── TABLES ────────────────────────────────────────── */
        .table-modern {
            margin-bottom: 0;
        }

        .table-modern thead th {
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f2f8 100%);
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            padding: 0.85rem 1rem;
            border-bottom: 2px solid var(--border-color);
            border-top: none;
            white-space: nowrap;
        }

        .table-modern tbody td {
            padding: 0.85rem 1rem;
            vertical-align: middle;
            border-color: #f1f5f9;
            font-size: 0.9rem;
            color: var(--text-primary);
        }

        .table-modern tbody tr {
            transition: var(--transition);
        }

        .table-modern tbody tr:hover {
            background: var(--surface-hover);
        }

        .table-modern tbody tr:last-child td {
            border-bottom: none;
        }

        /* ── BUTTONS ───────────────────────────────────────── */
        .btn {
            border-radius: var(--radius-sm);
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.5rem 1.15rem;
            transition: var(--transition);
            border: none;
        }

        .btn-primary-custom {
            background: var(--primary-gradient);
            color: #fff;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(102, 126, 234, 0.4);
            color: #fff;
        }

        .btn-primary {
            background: var(--primary-gradient) !important;
            border: none !important;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #e2e8f0 !important;
            color: var(--text-primary) !important;
            border: none !important;
        }

        .btn-secondary:hover {
            background: #cbd5e1 !important;
            color: var(--text-primary) !important;
            transform: translateY(-1px);
        }

        /* Action Buttons (Icon style) */
        .btn-action {
            width: 34px;
            height: 34px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
            transition: var(--transition);
            border: none;
        }

        .btn-action-detail {
            background: rgba(102, 126, 234, 0.1);
            color: var(--primary-color);
        }
        .btn-action-detail:hover {
            background: var(--primary-color);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.35);
        }

        .btn-action-edit {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }
        .btn-action-edit:hover {
            background: #f59e0b;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.35);
        }

        .btn-action-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }
        .btn-action-delete:hover {
            background: #ef4444;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.35);
        }

        .action-group {
            display: flex;
            gap: 0.4rem;
            align-items: center;
        }

        /* ── ALERTS ────────────────────────────────────────── */
        .alert {
            border: none;
            border-radius: var(--radius-md);
            padding: 1rem 1.25rem;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.65rem;
            animation: slideDown 0.35s ease-out;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .alert-success {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            color: #065f46;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.12);
        }

        .alert-danger {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            color: #991b1b;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.12);
        }

        .alert-warning {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            color: #92400e;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.12);
        }

        /* ── BADGES ────────────────────────────────────────── */
        .badge-status {
            padding: 0.35em 0.85em;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.75rem;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .badge-show {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .badge-hide {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            color: #64748b;
        }

        /* ── FORM CONTROLS ─────────────────────────────────── */
        .form-control,
        .form-select {
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--border-color);
            padding: 0.65rem 0.9rem;
            font-size: 0.9rem;
            transition: var(--transition);
            color: var(--text-primary);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
        }

        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 0.4rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        /* ── LINK STYLES ───────────────────────────────────── */
        a.link-url {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: var(--transition);
        }

        a.link-url:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }

        /* ── MISC ──────────────────────────────────────────── */
        .text-muted {
            color: var(--text-secondary) !important;
        }

        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
        }

        .empty-state i {
            font-size: 2.5rem;
            color: var(--text-muted);
            margin-bottom: 0.75rem;
        }

        .empty-state p {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin: 0;
        }

        .img-thumbnail {
            border-radius: var(--radius-sm);
            border: 2px solid var(--border-color);
        }

        /* ── FOOTER ────────────────────────────────────────── */
        .footer-custom {
            background: var(--surface);
            border-top: 1px solid var(--border-color);
            padding: 1rem 0;
            margin-top: auto;
        }

        .footer-custom p {
            margin: 0;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* ── TOOLTIP CUSTOM ────────────────────────────────── */
        [data-bs-toggle="tooltip"] {
            cursor: pointer;
        }

        /* ── SCROLLBAR ─────────────────────────────────────── */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* ── RESPONSIVE ────────────────────────────────────── */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                gap: 0.75rem;
                align-items: flex-start !important;
            }
        }
    </style>
    @yield('styles')
</head>
<body>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-custom" id="main-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('tutorials.index') }}">
            <span class="brand-icon">
                <i class="bi bi-easel2-fill"></i>
            </span>
            TutorialApp
        </a>

        <div class="d-flex align-items-center">
            @if(session('refreshToken'))
                <span class="text-white me-3 d-none d-md-inline" style="font-size:0.82rem; opacity:0.8;">
                    <i class="bi bi-person-circle me-1"></i>{{ session('creator_email') }}
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn-logout" type="submit">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>
            @endif
        </div>
    </div>
</nav>

{{-- Main Content --}}
<main class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-error">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span>{{ session('error') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</main>

{{-- Footer --}}
<footer class="footer-custom">
    <div class="container text-center">
        <p><i class="bi bi-heart-fill text-danger"></i> &nbsp;Web Presentation App &copy; {{ date('Y') }}</p>
    </div>
</footer>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (el) {
            return new bootstrap.Tooltip(el);
        });

        // Auto-dismiss alerts after 4 seconds
        document.querySelectorAll('.alert-dismissible').forEach(function(alert) {
            setTimeout(function() {
                var bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }, 4000);
        });
    });
</script>
@yield('scripts')
</body>
</html>