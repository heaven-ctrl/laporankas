@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-warning text-dark py-3 px-4">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Edit Kategori</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label fw-semibold text-secondary">Nama Kategori</label>
                            <input type="text" class="form-control rounded-3 py-2 @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                            @error('nama_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="jenis" class="form-label fw-semibold text-secondary">Jenis Kategori</label>
                            <select class="form-select rounded-3 py-2 @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required>
                                <option value="" disabled>-- Pilih Jenis --</option>
                                <option value="masuk" {{ old('jenis', $kategori->jenis) == 'masuk' ? 'selected' : '' }}>Masuk (Pemasukan)</option>
                                <option value="keluar" {{ old('jenis', $kategori->jenis) == 'keluar' ? 'selected' : '' }}>Keluar (Pengeluaran)</option>
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('kategori.index') }}" class="text-decoration-none text-muted fw-semibold">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning px-4 rounded-pill shadow-sm fw-semibold text-dark">
                                <i class="bi bi-check2-circle me-1"></i> Perbarui Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
