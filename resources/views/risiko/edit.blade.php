@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Risiko') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('risiko.update', $risiko->id) }}">
                        @csrf
                        @method('PUT') <!-- Menandakan ini adalah request UPDATE -->

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Risiko</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $risiko->nama) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="severity" class="form-label">Severity</label>
                            <input type="number" class="form-control" id="severity" name="severity" value="{{ old('severity', $risiko->severity) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="occurrence" class="form-label">Occurrence</label>
                            <input type="number" class="form-control" id="occurrence" name="occurrence" value="{{ old('occurrence', $risiko->occurrence) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="detection" class="form-label">Detection</label>
                            <input type="number" class="form-control" id="detection" name="detection" value="{{ old('detection', $risiko->detection) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="rpn" class="form-label">RPN</label>
                            <input type="number" class="form-control" id="rpn" name="rpn" value="{{ old('rpn', $risiko->rpn) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Risiko</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
