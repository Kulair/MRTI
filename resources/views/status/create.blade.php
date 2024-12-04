@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Status Tindakan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('status.store') }}">
                        @csrf

                        <!-- Nama Tindakan -->
                        <div class="mb-3">
                            <label for="nama_tindakan" class="form-label">Nama Tindakan</label>
                            <input type="text" class="form-control" id="nama_tindakan" name="nama_tindakan" required>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="implemented">Implemented</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Tindakan</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>

                        <!-- Pilih Rekomendasi (Opsional) -->
                        <div class="mb-3">
                            <label for="rekomendasi_id" class="form-label">Rekomendasi Tindakan</label>
                            <select class="form-control" id="rekomendasi_id" name="rekomendasi_id" required>
                                <option value="">Pilih Rekomendasi</option>
                                @foreach($rekomendasis as $rekomendasi)
                                    <option value="{{ $rekomendasi->id }}">{{ $rekomendasi->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary">Simpan Status Tindakan</button>
                        <a href="{{ route('status.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
