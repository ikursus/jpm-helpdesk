@extends('layout.induk')

@section('penanda-content')

<h1 class="mt-4">Senarai Aduan</h1>
{{-- Ini komen di dalam blade --}}
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Aduan</li>
</ol>

<div class="row mt-3">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Primary Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Warning Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Success Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Danger Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Senarai Aduan
    </div>
    <div class="card-body">
        @include('layout.alert')
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Tajuk</th>
                    <th>Description</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Tajuk</th>
                    <th>Description</th>
                    <th>Tindakan</th>
                </tr>
            </tfoot>
            <tbody>
                @forelse ($senaraiAduan as $aduan)
                <tr>
                    <td>{{ $aduan->user_id }}</td>
                    <td>{{ $aduan->title }}</td>
                    <td>{{ $aduan->description }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('aduan.show', $aduan->id) }}">Detail</a>
                        <a class="btn btn-info" href="{{ route('aduan.edit', $aduan->id) }}">Edit</a>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $aduan->id }}">
                            Delete
                        </button>

                        <!-- Modal -->


                        <form method="POST" action="{{ route('aduan.destroy', $aduan->id) }}">
                            @csrf
                            @method('DELETE')

                            <div class="modal fade" id="modal-delete-{{ $aduan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pengesahan Delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Adakah anda bersetuju untuk menghapuskan ini Aduan ID: {{ $aduan->id }}
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-danger" type="submit">Teruskan Delete</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </form>


                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Tiada Rekod Dijumpai</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('penanda-javascript')
@endpush


