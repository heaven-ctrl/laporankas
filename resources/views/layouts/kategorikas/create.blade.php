@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white py-3 px-4">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-plus-circle me-2"></i>Tambah Kategori Baru</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label fw-semibold text-secondary">Nama Kategori</label>
                            <input type="text" class="form-control rounded-3 py-2 @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="Contoh: Penjualan Harian, Biaya Sewa" required>
                            @error('nama_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="jenis" class="form-label fw-semibold text-secondary">Jenis Kategori</label>
                            <select class="form-select rounded-3 py-2 @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required>
                                <option value="" selected disabled>-- Pilih Jenis --</option>
                                <option value="masuk" {{ old('jenis') == 'masuk' ? 'selected' : '' }}>Masuk (Pemasukan)</option>
                                <option value="keluar" {{ old('jenis') == 'keluar' ? 'selected' : '' }}>Keluar (Pengeluaran)</option>
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('kategori.index') }}" class="text-decoration-none text-muted fw-semibold">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm">
                                <i class="bi bi-save me-1"></i> Simpan Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
