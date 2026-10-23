@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-dark mb-1"><i class="bi bi-tags-fill text-primary me-2"></i>Daftar Kategori Kas</h2>
                    <p class="text-muted mb-0">Kelola kategori pemasukan dan pengeluaran keuangan Anda dengan mudah.</p>
                </div>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
                </a>
            </div>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 rounded-3" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 rounded-3" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Main Card Table -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-secondary text-uppercase fs-7 fw-bold">
                                <tr>
                                    <th class="py-3 ps-4" width="8%">No</th>
                                    <th class="py-3">Nama Kategori</th>
                                    <th class="py-3" width="20%">Jenis</th>
                                    <th class="py-3 text-center" width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kategori as $item)
                                    <tr>
                                        <td class="ps-4 fw-semibold text-secondary">
                                            {{ $loop->iteration + ($kategori->currentPage() - 1) * $kategori->perPage() }}
                                        </td>
                                        <td>
                                            <span class="fw-bold text-dark">{{ $item->nama_kategori }}</span>
                                        </td>
                                        <td>
                                            @if($item->jenis == 'masuk')
                                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">
                                                    <i class="bi bi-arrow-down-left me-1"></i> Masuk
                                                </span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill fw-semibold">
                                                    <i class="bi bi-arrow-up-right me-1"></i> Keluar
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('kategori.show', $item->id) }}" class="btn btn-outline-info btn-sm px-2 rounded-start-pill" title="Detail">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-outline-warning btn-sm px-2" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm px-2 rounded-end-pill" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                            Belum ada data kategori yang tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($kategori->hasPages())
                    <div class="card-footer bg-white border-0 py-3">
                        <div class="d-flex justify-content-center">
                            {{ $kategori->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
