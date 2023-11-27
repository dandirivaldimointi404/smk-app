@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-md-12 position-relative">
                    <div class="card bg-primary text-white widget-visitor-card">
                        <div class="card-body text-center">
                            <h5 class="text-white">{{ $materi->rombel->nama_kelas }} {{ $materi->nama_mapel }}</h5>
                            <p class="text-white">{{ $materi->guru->nama_guru }}</p>
                            <i class="material-icons-two-tone d-block f-46 text-white">account_circle</i>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('materi.create') }}" class="btn btn-outline-success d-inline-flex"
                            style="float: right;">
                            <i class="ti ti-circle-plus align-text-bottom"></i>Tambah Materi
                        </a>
                    </div>
                    <div class="card-body" style="max-height: 300px; overflow-y: auto; padding-right: 15px;">
                        @foreach ($materimapel as $itm)
                            <div class="media align-items-center" style="margin-bottom: 15px;">
                                <div class="avtar avtar-lg bg-light-primary">
                                    <i class="material-icons-two-tone text-primary">people_alt</i>
                                </div>
                                <div class="media-body mx-3">
                                    <h4 class="mb-0 text-primary">{{ $itm->judul_materi }}, Pertemuan {{ $itm->pertemuan }}
                                    </h4>
                                    <p class="mb-0">{{ $itm->deskripsi }}</p>
                                </div>
                                <div class="dropdown">
                                    <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-dots f-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                       
                                        <form action="{{ route('materi.destroy', $itm->id_materi) }}" method="POST"
                                            class="delete-form">
                                            <a href="{{ route('materi.edit', $itm->id_materi) }}"
                                                class="dropdown-item">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"
                                                data-id="{{ $itm->id_materi }}">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
