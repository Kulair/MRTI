@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Kelola Risiko') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('risiko.create') }}" class="btn btn-primary">Tambah Risiko Baru</a>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Risiko</th>
                                <th>Severity</th>
                                <th>Occurrence</th>
                                <th>Detection</th>
                                <th>RPN</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($risikos as $risiko)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $risiko->nama }}</td>
                                <td>{{ $risiko->severity }}</td>
                                <td>{{ $risiko->occurrence }}</td>
                                <td>{{ $risiko->detection }}</td>
                                <td>{{ $risiko->rpn }}</td>
                                <td>
                                    <a href="{{ route('risiko.edit', $risiko->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('risiko.destroy', $risiko->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus risiko ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($risikos->isEmpty())
                        <p class="text-center">Belum ada risiko yang terdaftar.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
