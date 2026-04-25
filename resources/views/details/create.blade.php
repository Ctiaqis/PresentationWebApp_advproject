@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        {{-- Page Header --}}
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('tutorials.details.index', $tutorial) }}" class="btn btn-secondary me-3" id="btn-back-create-detail" style="width:38px;height:38px;padding:0;display:inline-flex;align-items:center;justify-content:center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h4 class="mb-0 fw-bold">Tambah Detail</h4>
                <small class="text-muted">Tutorial: <strong>{{ $tutorial->judul }}</strong></small>
            </div>
        </div>

        <div class="card">
            <div class="card-header card-header-gradient">
                <i class="bi bi-plus-circle me-2"></i>Form Detail Baru
            </div>

            <div class="card-body">
                <form action="{{ route('tutorials.details.store', $tutorial) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      id="form-create-detail">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="text-input">
                            <i class="bi bi-text-paragraph me-1" style="color:var(--primary-color);"></i>Text
                        </label>
                        <textarea name="text"
                                  id="text-input"
                                  rows="4"
                                  class="form-control @error('text') is-invalid @enderror"
                                  placeholder="Masukkan teks konten..."
                        >{{ old('text') }}</textarea>

                        @error('text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="gambar-input">
                            <i class="bi bi-image me-1" style="color:var(--primary-color);"></i>Gambar
                        </label>
                        <input type="file"
                               name="gambar"
                               id="gambar-input"
                               class="form-control @error('gambar') is-invalid @enderror"
                               accept="image/*">

                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <small class="text-muted mt-1 d-block">
                            <i class="bi bi-info-circle me-1"></i>Opsional. Maksimal 2 MB.
                        </small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="code-input">
                            <i class="bi bi-code-slash me-1" style="color:var(--primary-color);"></i>Code
                        </label>
                        <textarea name="code"
                                  id="code-input"
                                  rows="6"
                                  class="form-control @error('code') is-invalid @enderror"
                                  placeholder="Masukkan kode..."
                                  style="font-family:'Fira Code','Cascadia Code',monospace;font-size:0.85rem;"
                        >{{ old('code') }}</textarea>

                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="url-input">
                            <i class="bi bi-link-45deg me-1" style="color:var(--primary-color);"></i>URL
                        </label>
                        <input type="url"
                               name="url"
                               id="url-input"
                               class="form-control @error('url') is-invalid @enderror"
                               value="{{ old('url') }}"
                               placeholder="https://contoh.com">

                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="order-input">
                                <i class="bi bi-sort-numeric-down me-1" style="color:var(--primary-color);"></i>Order
                            </label>
                            <input type="number"
                                   name="order_number"
                                   id="order-input"
                                   class="form-control @error('order_number') is-invalid @enderror"
                                   value="{{ old('order_number', 1) }}"
                                   min="1">

                            @error('order_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="status-select">
                                <i class="bi bi-toggle-on me-1" style="color:var(--primary-color);"></i>Status
                            </label>
                            <select name="status"
                                    id="status-select"
                                    class="form-select @error('status') is-invalid @enderror">
                                <option value="show" {{ old('status') === 'show' ? 'selected' : '' }}>
                                    🟢 Show — Tampil di presentation
                                </option>
                                <option value="hide" {{ old('status', 'hide') === 'hide' ? 'selected' : '' }}>
                                    ⚪ Hide — Disembunyikan
                                </option>
                            </select>

                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-3" style="border-color:var(--border-color);">

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tutorials.details.index', $tutorial) }}" class="btn btn-secondary" id="btn-cancel-create-detail">
                            <i class="bi bi-x-lg me-1"></i>
                            Batal
                        </a>

                        <button class="btn btn-primary" id="btn-submit-create-detail">
                            <i class="bi bi-check-lg me-1"></i>
                            Simpan Detail
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection