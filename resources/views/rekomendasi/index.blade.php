@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Rekomendasi</h2>

    <!-- Tampilkan pesan jika ada status -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('rekomendasi.create') }}" class="btn btn-primary mb-3">Tambah Rekomendasi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Risiko</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekomendasies as $rekomendasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rekomendasi->nama }}</td>
                    <td>{{ $rekomendasi->deskripsi }}</td>
                    <td>{{ $rekomendasi->risiko->nama }}</td>
                    <td>
                        <a href="{{ route('rekomendasi.edit', $rekomendasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('rekomendasi.destroy', $rekomendasi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus rekomendasi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
