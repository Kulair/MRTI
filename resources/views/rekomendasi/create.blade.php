@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Rekomendasi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('rekomendasi.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Rekomendasi</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Rekomendasi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="risiko_id" class="form-label">Risiko Terkait</label>
                            <select class="form-control" id="risiko_id" name="risiko_id" required>
                                <!-- Misalnya menampilkan data risiko dari database -->
                                @foreach($risikos as $risiko)
                                    <option value="{{ $risiko->id }}">{{ $risiko->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Rekomendasi</button>
                        <a href="{{ route('rekomendasi.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
