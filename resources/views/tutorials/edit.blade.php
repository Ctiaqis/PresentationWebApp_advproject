<!-- Membuat halaman edit master tutorial -->

@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">
        {{-- Page Header --}}
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('tutorials.index') }}" class="btn btn-secondary me-3" id="btn-back-edit" style="width:38px;height:38px;padding:0;display:inline-flex;align-items:center;justify-content:center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h4 class="mb-0 fw-bold">Edit Tutorial</h4>
                <small class="text-muted">Perbarui informasi tutorial "{{ $tutorial->judul }}"</small>
            </div>
        </div>

        <div class="card">
            <div class="card-header card-header-gradient">
                <i class="bi bi-pencil-square me-2"></i>Form Edit Tutorial
            </div>

            <div class="card-body">
                <form action="{{ route('tutorials.update', $tutorial) }}" method="POST" id="form-edit-tutorial">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label" for="judul-input">Judul Tutorial</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:transparent;border-right:none;border-color:var(--border-color);">
                                <i class="bi bi-type" style="color:var(--text-muted);"></i>
                            </span>
                            <input type="text" name="judul"
                                   id="judul-input"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul', $tutorial->judul) }}"
                                   placeholder="Masukkan judul tutorial..."
                                   style="border-left:none;">

                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="kode_matkul">Mata Kuliah</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:transparent;border-right:none;border-color:var(--border-color);">
                                <i class="bi bi-book" style="color:var(--text-muted);"></i>
                            </span>
                            <select name="kode_matkul" id="kode_matkul"
                                    class="form-select @error('kode_matkul') is-invalid @enderror"
                                    style="border-left:none;">
                                <option value="">— Pilih Mata Kuliah —</option>

                                @foreach($makul as $item)
                                    @php
                                        $kode = $item['kdmk'];
                                        $nama = $item['nama'];
                                    @endphp

                                    <option value="{{ $kode }}"
                                            data-nama="{{ $nama }}"
                                            {{ old('kode_matkul', $tutorial->kode_matkul) == $kode ? 'selected' : '' }}>
                                        {{ $kode }} — {{ $nama }}
                                    </option>
                                @endforeach
                            </select>

                            @error('kode_matkul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" name="nama_matkul" id="nama_matkul"
                           value="{{ old('nama_matkul', $tutorial->nama_matkul) }}">

                    {{-- Read-only URL fields --}}
                    <div class="mb-3">
                        <label class="form-label">URL Presentation</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:transparent;border-right:none;border-color:var(--border-color);">
                                <i class="bi bi-link-45deg" style="color:var(--text-muted);"></i>
                            </span>
                            <input type="text" class="form-control" value="{{ $tutorial->url_presentation }}" readonly
                                   style="border-left:none;background:#fff5e4;color:var(--text-secondary);">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">URL Finished</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:transparent;border-right:none;border-color:var(--border-color);">
                                <i class="bi bi-link-45deg" style="color:var(--text-muted);"></i>
                            </span>
                            <input type="text" class="form-control" value="{{ $tutorial->url_finished }}" readonly
                                   style="border-left:none;background:#fff5e4;color:var(--text-secondary);">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tutorials.index') }}" class="btn btn-secondary" id="btn-cancel-edit">
                            <i class="bi bi-x-lg me-1"></i>
                            Batal
                        </a>

                        <button class="btn btn-primary" id="btn-submit-edit">
                            <i class="bi bi-check-lg me-1"></i>
                            Update Tutorial
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const selectMakul = document.getElementById('kode_matkul');
    const inputNamaMakul = document.getElementById('nama_matkul');

    selectMakul.addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        inputNamaMakul.value = selectedOption.getAttribute('data-nama') || '';
    });
</script>
@endsection