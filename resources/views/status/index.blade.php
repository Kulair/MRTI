<!-- resources/views/status/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Status Tindakan</h2>
    <a href="{{ route('status.create') }}" class="btn btn-primary mb-3">Tambah Status Tindakan</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Tindakan</th>
                <th>Status</th>
                <th>Deskripsi</th>
                <th>Rekomendasi Tindakan</th> <!-- Kolom Rekomendasi -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statuses as $status)
                <tr>
                    <td>{{ $status->nama_tindakan }}</td>
                    <td>{{ $status->status }}</td>
                    <td>{{ $status->deskripsi }}</td>
                    <td>
                        @if($status->rekomendasi)
                            {{ $status->rekomendasi->nama }}
                        @else
                            Tidak ada rekomendasi
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('status.edit', $status->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('status.destroy', $status->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
