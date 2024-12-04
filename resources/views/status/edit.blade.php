<!-- resources/views/status/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Status Tindakan</h2>

    <form action="{{ route('status.update', $status->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_tindakan">Nama Tindakan</label>
            <input type="text" class="form-control" id="nama_tindakan" name="nama_tindakan" value="{{ $status->nama_tindakan }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="implemented" {{ $status->status == 'implemented' ? 'selected' : '' }}>Implemented</option>
                <option value="in_progress" {{ $status->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $status->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $status->deskripsi }}</textarea>
        </div>

        <div class="form-group">
            <label for="rekomendasi_id">Rekomendasi Tindakan</label>
            <select class="form-control" id="rekomendasi_id" name="rekomendasi_id">
                <option value="">Pilih Rekomendasi Tindakan</option>
                @foreach($rekomendasis as $rekomendasi)
                    <option value="{{ $rekomendasi->id }}" 
                        {{ $status->rekomendasi_id == $rekomendasi->id ? 'selected' : '' }}>
                        {{ $rekomendasi->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
