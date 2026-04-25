<!-- Membuat halaman tambah master tutorial & mengambil data matkul dari API -->

@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">
        {{-- Page Header --}}
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('tutorials.index') }}" class="btn btn-secondary me-3" id="btn-back-create" style="width:38px;height:38px;padding:0;display:inline-flex;align-items:center;justify-content:center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h4 class="mb-0 fw-bold">Tambah Tutorial</h4>
                <small class="text-muted">Isi form berikut untuk menambahkan tutorial baru</small>
            </div>
        </div>

        @if(count($makul) === 0)
            <div class="alert alert-warning mb-3">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <span>Data mata kuliah tidak berhasil diambil dari webservice. Coba logout lalu login lagi.</span>
            </div>
        @endif

        <div class="card">
            <div class="card-header card-header-gradient">
                <i class="bi bi-plus-circle me-2"></i>Form Tutorial Baru
            </div>

            <div class="card-body">
                <form action="{{ route('tutorials.store') }}" method="POST" id="form-create-tutorial">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="judul-input">Judul Tutorial</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:transparent;border-right:none;border-color:var(--border-color);">
                                <i class="bi bi-type" style="color:var(--text-muted);"></i>
                            </span>
                            <input type="text" name="judul"
                                   id="judul-input"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul') }}"
                                   placeholder="Masukkan judul tutorial..."
                                   style="border-left:none;">

                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
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
                                            {{ old('kode_matkul') == $kode ? 'selected' : '' }}>
                                        {{ $kode }} — {{ $nama }}
                                    </option>
                                @endforeach
                            </select>

                            @error('kode_matkul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" name="nama_matkul" id="nama_matkul" value="{{ old('nama_matkul') }}">

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tutorials.index') }}" class="btn btn-secondary" id="btn-cancel-create">
                            <i class="bi bi-x-lg me-1"></i>
                            Batal
                        </a>

                        <button class="btn btn-primary" id="btn-submit-create">
                            <i class="bi bi-check-lg me-1"></i>
                            Simpan Tutorial
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