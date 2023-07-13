@extends('layout.induk')

@section('penanda-content')

<h1 class="mt-4">Kemaskini Aduan</h1>
{{-- Ini komen di dalam blade --}}
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Aduan</li>
</ol>

<form method="POST" action="{{ route('aduan.update', $aduan->id) }}" enctype="multipart/form-data">
@csrf

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        {{ $aduan->title }}
    </div>
    <div class="card-body">

        @include('layout.alert')

        @include('aduan.template-borang')


    </div>
    <div class="card-footer">
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-default" href="{{ route('aduan.index') }}">Kembali</a>
            <button class="btn btn-primary" type="submit">Kemaskini</button>
        </div>
    </div>
</div>

</form>

@endsection

@push('penanda-javascript')
@endpush


