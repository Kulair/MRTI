@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Risiko Baru') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('risiko.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Risiko</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="severity" class="form-label">Severity</label>
                            <input type="number" class="form-control" id="severity" name="severity" required>
                        </div>

                        <div class="mb-3">
                            <label for="occurrence" class="form-label">Occurrence</label>
                            <input type="number" class="form-control" id="occurrence" name="occurrence" required>
                        </div>

                        <div class="mb-3">
                            <label for="detection" class="form-label">Detection</label>
                            <input type="number" class="form-control" id="detection" name="detection" required>
                        </div>

                        <div class="mb-3">
                            <label for="rpn" class="form-label">RPN</label>
                            <input type="number" class="form-control" id="rpn" name="rpn" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Risiko</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
