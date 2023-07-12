@extends('layout.induk')

@section('penanda-content')

<h1 class="mt-4">Maklumat Aduan</h1>
{{-- Ini komen di dalam blade --}}
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Aduan</li>
</ol>


<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Maklumat Aduan
    </div>
    <div class="card-body">



    </div>
    <div class="card-footer">
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-default" href="{{ route('aduan.index') }}">Kembali</a>
        </div>
    </div>
</div>

@endsection

@push('penanda-javascript')
@endpush


