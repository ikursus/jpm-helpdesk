@extends('layout.induk')

@section('penanda-content')

<h1 class="mt-4">Aduan Baru</h1>
{{-- Ini komen di dalam blade --}}
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Aduan</li>
</ol>

<form method="POST" action="{{ route('aduan.store') }}" enctype="multipart/form-data">
@csrf

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Aduan Baru
    </div>
    <div class="card-body">

        @include('layout.alert')

        <div class="mb-3">
            <label for="nama_pengadu" class="form-label">Nama Pengadu</label>
            <input type="text" class="form-control @error('nama_pengadu') is-invalid @enderror" name="nama_pengadu" placeholder="E.g: Ahmad" value="{{ auth()->user()->name }}">
            @error('nama_pengadu')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Email Pengadu</label>
            <input type="text" class="form-control" name="email_pengadu" placeholder="E.g: ahmad@gmail.com" value="{{ auth()->user()->email }}">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Telefon Pengadu</label>
            <input type="text" class="form-control" name="telefon_pengadu" placeholder="E.g: 6012345789">
        </div>


        <div class="mb-3">
            <label for="title" class="form-label">Tajuk Aduan</label>
            <input type="text" class="form-control" name="title" placeholder="E.g: Tidak dapat hantar email">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Maklumat Aduan</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="lampiran" class="form-label">Lampiran</label>
            <input type="file" name="lampiran">
        </div>

    </div>
    <div class="card-footer">
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-default" href="{{ route('aduan.index') }}">Kembali</a>
            <button class="btn btn-primary" type="submit">Hantar</button>
        </div>
    </div>
</div>

</form>

@endsection

@push('penanda-javascript')
@endpush


