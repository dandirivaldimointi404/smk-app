@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-md-12 position-relative">
                    <div class="card bg-primary text-white widget-visitor-card">
                        <div class="card-body text-center">
                            <h5 class="text-white">{{ $mapel->rombel->nama_kelas }} {{ $mapel->nama_mapel }}</h5>
                            <p class="text-white">{{ $mapel->guru->nama_guru }}</p>
                            <i class="material-icons-two-tone d-block f-46 text-white">account_circle</i>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('tugas.mapel', $mapel->id_mapel) }}" class="btn btn-outline-success d-inline-flex"
                            style="float: right;">
                            <i class="ti ti-circle-plus align-text-bottom"></i>Tambah Tugas
                        </a>
                    </div>
                    <div class="card-body" style="max-height: 300px; overflow-y: auto; padding-right: 15px;">
                        @foreach ($mapel->tugas as $tugas)
                            <div class="media align-items-center" style="margin-bottom: 15px;">
                                <div class="avtar avtar-lg bg-light-primary">
                                    <i class="material-icons-two-tone text-primary">people_alt</i>
                                </div>
                                <div class="media-body mx-3">
                                    <div class="assignment-header"
                                        onclick="toggleAssignment('assignment{{ $tugas->id_tugas }}')">
                                        <h4 class="mb-0 text-primary">{{ $tugas->judul_tugas }}, Batas Waktu
                                            {{ $tugas->batas_waktu }}
                                        </h4>
                                    </div>
                                    <div class="assignment-content" id="assignment{{ $tugas->id_tugas }}"
                                        style="display: none;">
                                        <p class="mb-0">{{ $tugas->deskripsi }}</p>

                                        @if ($tugas->file_tugas)
                                            <div class="mt-2">
                                                @if (pathinfo($tugas->file_tugas, PATHINFO_EXTENSION) == 'jpg' ||
                                                        pathinfo($tugas->file_tugas, PATHINFO_EXTENSION) == 'jpeg' ||
                                                        pathinfo($tugas->file_tugas, PATHINFO_EXTENSION) == 'png')
                                                    <img src="{{ asset('storage/' . $tugas->file_tugas) }}" alt="Thumbnail"
                                                        class="img-thumbnail">
                                                @endif
                                                <a href="{{ asset('storage/' . $tugas->file_tugas) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Download File
                                                </a>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-dots f-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">

                                        <form action="{{ route('tugas.destroy', $tugas->id_tugas) }}" method="POST"
                                            class="delete-form">
                                            <a href="{{ route('tugas.edit', $tugas->id_tugas) }}"
                                                class="dropdown-item">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"
                                                data-id="{{ $tugas->id_tugas }}">Delete</button>
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

    <script>
        function toggleAssignment(assignmentId) {
            var assignmentContent = document.getElementById(assignmentId);

            if (assignmentContent.style.display === 'none' || assignmentContent.style.display === '') {
                assignmentContent.style.display = 'block';
            } else {
                assignmentContent.style.display = 'none';
            }
        }
    </script>
@endsection
