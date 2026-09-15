<!DOCTYPE html>
<html>
<head>
    <title>Data Pemasukan Kas</title>
</head>
<body>

    <h1>Data Pemasukan Kas</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    {{-- FORM TAMBAH PEMASUKAN --}}
    <h2>Tambah Pemasukan</h2>

    <form action="{{ route('pemasukan.store') }}" method="POST">
        @csrf

        <label>Tanggal:</label>
        <input type="date" name="tanggal" required>

        <br><br>

        <label>Sumber:</label>
        <input type="text" name="sumber" placeholder="Contoh: Iuran kelas" required>

        <br><br>

        <label>Keterangan:</label>
        <input type="text" name="keterangan" placeholder="Keterangan">

        <br><br>

        <label>Nominal:</label>
        <input type="number" name="nominal" min="0" required>

        <br><br>

        <button type="submit">Tambah</button>
    </form>

    <hr>

    {{-- TABEL PEMASUKAN --}}
    <h2>Daftar Pemasukan</h2>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Sumber</th>
                <th>Keterangan</th>
                <th>Nominal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($pemasukans as $pemasukan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pemasukan->tanggal }}</td>
                    <td>{{ $pemasukan->sumber }}</td>
                    <td>{{ $pemasukan->keterangan }}</td>
                    <td>Rp {{ number_format($pemasukan->nominal, 0, ',', '.') }}</td>

                    <td>
                        {{-- EDIT --}}
                        <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="date" name="tanggal"
                                   value="{{ $pemasukan->tanggal }}" required>

                            <input type="text" name="sumber"
                                   value="{{ $pemasukan->sumber }}" required>

                            <input type="text" name="keterangan"
                                   value="{{ $pemasukan->keterangan }}">

                            <input type="number" name="nominal"
                                   value="{{ $pemasukan->nominal }}" required>

                            <button type="submit">Update</button>
                        </form>

                        {{-- HAPUS --}}
                        <form action="{{ route('pemasukan.destroy', $pemasukan->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data pemasukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
