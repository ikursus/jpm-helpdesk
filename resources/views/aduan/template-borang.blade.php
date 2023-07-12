@extends('layout.induk')

@section('penanda-content')

<h1 class="mt-4">Aduan Baru</h1>
{{-- Ini komen di dalam blade --}}
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Aduan</li>
</ol>


<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Aduan Baru
    </div>
    <div class="card-body">

        <div class="mb-3">
            <label for="title" class="form-label">Tajuk Aduan</label>
            <input type="text" class="form-control" name="title" placeholder="E.g: Tidak dapat hantar email">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Maklumat Aduan</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

    </div>
    <div class="card-footer">
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-default" href="{{ route('aduan.index') }}">Kembali</a>
            <button class="btn btn-primary" type="submit">Hantar</button>
        </div>
    </div>
</div>

@endsection

@push('penanda-javascript')
@endpush


