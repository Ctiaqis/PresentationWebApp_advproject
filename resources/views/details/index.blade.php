@extends('layouts.app')

@section('content')
{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center page-header">
    <div>
        <h3><i class="bi bi-list-columns-reverse me-2" style="color: var(--primary-color);"></i>Detail Tutorial</h3>
        <p class="text-muted mb-0">
            Master: <strong class="text-dark">{{ $tutorial->judul }}</strong>
        </p>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('tutorials.index') }}" class="btn btn-secondary" id="btn-back-tutorials">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

        <a href="{{ route('tutorials.details.create', $tutorial) }}" class="btn btn-primary-custom" id="btn-add-detail">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Detail
        </a>
    </div>
</div>

{{-- Tutorial Info Card --}}
<div class="card mb-3">
    <div class="card-body py-3">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                 style="width:42px;height:42px;background:var(--primary-gradient);">
                <i class="bi bi-link-45deg text-white" style="font-size:1.1rem;"></i>
            </div>
            <div>
                <small class="text-muted d-block" style="font-size:0.75rem;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;">
                    URL Presentation
                </small>
                <a href="{{ $tutorial->url_presentation }}" target="_blank" class="link-url">
                    {{ $tutorial->url_presentation }}
                    <i class="bi bi-box-arrow-up-right" style="font-size:0.75rem;"></i>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Details Table Card --}}
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-modern" id="details-table">
                <thead>
                    <tr>
                        <th style="width:65px">Order</th>
                        <th>Text</th>
                        <th style="width:110px">Gambar</th>
                        <th>Code</th>
                        <th style="width:90px">URL</th>
                        <th style="width:90px">Status</th>
                        <th style="width:100px" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($details as $detail)
                        <tr>
                            <td>
                                <span class="badge rounded-pill" style="background: var(--primary-gradient); font-size: 0.75rem; min-width: 28px;">
                                    {{ $detail->order_number }}
                                </span>
                            </td>

                            <td>
                                @if($detail->text)
                                    <span style="font-size:0.88rem;">{{ \Illuminate\Support\Str::limit($detail->text, 80) }}</span>
                                @else
                                    <span class="text-muted" style="font-size:0.85rem;">—</span>
                                @endif
                            </td>

                            <td>
                                @if($detail->gambar)
                                    <img src="{{ asset('storage/' . $detail->gambar) }}"
                                         alt="Gambar detail"
                                         class="img-thumbnail"
                                         style="width:80px;height:55px;object-fit:cover;">
                                @else
                                    <span class="text-muted" style="font-size:0.85rem;">—</span>
                                @endif
                            </td>

                            <td>
                                @if($detail->code)
                                    <code style="background:#f1f5f9;padding:0.2rem 0.5rem;border-radius:6px;font-size:0.78rem;color:#6d28d9;">
                                        {{ \Illuminate\Support\Str::limit($detail->code, 50) }}
                                    </code>
                                @else
                                    <span class="text-muted" style="font-size:0.85rem;">—</span>
                                @endif
                            </td>

                            <td>
                                @if($detail->url)
                                    <a href="{{ $detail->url }}" target="_blank" class="link-url">
                                        <i class="bi bi-box-arrow-up-right"></i> Buka
                                    </a>
                                @else
                                    <span class="text-muted" style="font-size:0.85rem;">—</span>
                                @endif
                            </td>

                            <td>
                                @if($detail->status === 'show')
                                    <span class="badge-status badge-show">
                                        <i class="bi bi-eye-fill me-1"></i>Show
                                    </span>
                                @else
                                    <span class="badge-status badge-hide">
                                        <i class="bi bi-eye-slash me-1"></i>Hide
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="action-group justify-content-center">
                                    <a href="{{ route('tutorials.details.edit', [$tutorial, $detail]) }}"
                                       class="btn btn-action btn-action-edit"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="Edit Detail">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('tutorials.details.destroy', [$tutorial, $detail]) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin hapus detail ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-action btn-action-delete"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Hapus Detail">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <i class="bi bi-journal-text d-block"></i>
                                    <p>Belum ada detail tutorial. Tambahkan detail pertama!</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection