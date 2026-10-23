@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-info text-white py-3 px-4">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i>Detail Kategori</h5>
                </div>
                <div class="card-body p-4">
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="text-muted fw-semibold">ID Kategori</span>
                            <span class="fw-bold text-dark">#{{ $kategori->id }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="text-muted fw-semibold">Nama Kategori</span>
                            <span class="fw-bold text-dark">{{ $kategori->nama_kategori }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="text-muted fw-semibold">Jenis Kategori</span>
                            <span>
                                @if($kategori->jenis == 'masuk')
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">
                                        <i class="bi bi-arrow-down-left me-1"></i> Masuk
                                    </span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill fw-semibold">
                                        <i class="bi bi-arrow-up-right me-1"></i> Keluar
                                    </span>
                                @endif
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="text-muted fw-semibold">Dibuat Pada</span>
                            <span class="text-dark">{{ $kategori->created_at->format('d M Y, H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="text-muted fw-semibold">Terakhir Diperbarui</span>
                            <span class="text-dark">{{ $kategori->updated_at->format('d M Y, H:i') }}</span>
                        </li>
                    </ul>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary px-4 rounded-pill shadow-sm">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning px-4 rounded-pill shadow-sm fw-semibold text-dark">
                            <i class="bi bi-pencil-square me-1"></i> Edit Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
