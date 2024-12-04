@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome to the Risk Management Home Page</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Kelola Risiko') }}</div>
                <div class="card-body">
                    <a href="{{ route('kelola') }}" class="btn btn-primary">Kelola Risiko</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Rekomendasi Tindakan') }}</div>
                <div class="card-body">
                    <a href="{{ route('rekomendasi.index') }}" class="btn btn-primary">Lihat Rekomendasi</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Status Tindakan') }}</div>
                <div class="card-body">
                    <a href="{{ route('status.index') }}" class="btn btn-primary">Lihat Status</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
