@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">
        <div class="text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center mb-3"
                 style="width:64px;height:64px;background:var(--primary-gradient);border-radius:16px;box-shadow:0 8px 24px rgba(102,126,234,0.3);">
                <i class="bi bi-check-circle-fill text-white" style="font-size:1.75rem;"></i>
            </div>
            <h3 class="fw-bold mb-1">Login Berhasil! 🎉</h3>
            <p class="text-muted">Anda berhasil masuk sebagai creator.</p>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-3 mb-3 pb-3" style="border-bottom:1px solid var(--border-color);">
                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:44px;height:44px;background:var(--primary-gradient);">
                        <i class="bi bi-person-fill text-white" style="font-size:1.1rem;"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block" style="font-size:0.75rem;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;">
                            Email Creator
                        </small>
                        <span class="fw-semibold">{{ session('creator_email') }}</span>
                    </div>
                </div>

                <div>
                    <label class="form-label">
                        <i class="bi bi-key me-1" style="color:var(--primary-color);"></i>Refresh Token
                    </label>
                    <textarea class="form-control" rows="4" readonly
                              style="font-family:'Fira Code','Cascadia Code',monospace;font-size:0.8rem;background:#fff5e4;"
                    >{{ session('refreshToken') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection