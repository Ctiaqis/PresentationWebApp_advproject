<!-- Membuat halaman list master tutorial & menampilkan data master tutorial -->

@extends('layouts.app')

@section('content')
{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center page-header">
    <div>
        <h3><i class="bi bi-collection-play me-2" style="color: var(--primary-color);"></i>Manajemen Tutorial</h3>
        <p class="text-muted mb-0">Kelola semua data master tutorial Anda di sini.</p>
    </div>

    <a href="{{ route('tutorials.create') }}" class="btn btn-primary-custom" id="btn-add-tutorial">
        <i class="bi bi-plus-lg me-1"></i>
        Tambah Tutorial
    </a>
</div>

{{-- Data Table Card --}}
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-modern" id="tutorials-table">
                <thead>
                    <tr>
                        <th style="width:50px">#</th>
                        <th>Judul</th>
                        <th>Mata Kuliah</th>
                        <th>Links</th>
                        <th>Creator</th>
                        <th>Dibuat</th>
                        <th style="width:140px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tutorials as $tutorial)
                        <tr>
                            <td>
                                <span class="badge rounded-pill" style="background: var(--primary-gradient); font-size: 0.75rem; min-width: 28px;">
                                    {{ $loop->iteration }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-semibold">{{ $tutorial->judul }}</span>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="fw-semibold" style="font-size: 0.85rem;">{{ $tutorial->kode_matkul }}</span>
                                    <small class="text-muted">{{ $tutorial->nama_matkul }}</small>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-1">
                                    <a href="{{ $tutorial->url_presentation }}" target="_blank" class="link-url">
                                        <i class="bi bi-play-circle"></i> Presentation
                                    </a>
                                    <a href="{{ $tutorial->url_finished }}" target="_blank" class="link-url">
                                        <i class="bi bi-check-circle"></i> Finished
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:30px;height:30px;background:var(--primary-gradient);flex-shrink:0;">
                                        <i class="bi bi-person-fill text-white" style="font-size:0.75rem;"></i>
                                    </div>
                                    <small class="text-muted" style="font-size:0.8rem;">{{ $tutorial->creator_email }}</small>
                                </div>
                            </td>
                            <td>
                                <small class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>{{ $tutorial->created_at->format('d M Y') }}
                                </small>
                            </td>
                            <td>
                                <div class="action-group justify-content-center">
                                    <a href="{{ route('tutorials.details.index', $tutorial) }}"
                                       class="btn btn-action btn-action-detail"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('tutorials.edit', $tutorial) }}"
                                       class="btn btn-action btn-action-edit"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="Edit Tutorial">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('tutorials.destroy', $tutorial) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin hapus tutorial ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-action btn-action-delete"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Hapus Tutorial">
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
                                    <i class="bi bi-inbox d-block"></i>
                                    <p>Belum ada data tutorial. Mulai dengan menambahkan tutorial baru!</p>
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