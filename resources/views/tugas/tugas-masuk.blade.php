@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">


            {{-- <div class="col-md-12 position-relative">
                <div class="card bg-primary text-white widget-visitor-card">
                    <div class="card-body text-center">
                        <h5 class="text-white">{{ $tugas->mapel->rombel->nama_kelas }} {{ $tugas->mapel->nama_mapel }}</h5>
                        <p class="text-white">{{ $tugas->user->guru->nama_guru }}</p>
                        <i class="material-icons-two-tone d-block f-46 text-white">account_circle</i>
                    </div>
                </div>
            </div> --}}

            <div class="card">
                <div class="card-body" style="max-height: 300px; overflow-y: auto; padding-right: 15px;">
                    @foreach ($tugas->tugasmasuk as $itm)
                        <div class="media align-items-center" style="margin-bottom: 15px;">
                            <div class="avtar avtar-lg bg-light-primary">
                                <i class="material-icons-two-tone text-primary">people_alt</i>
                            </div>
                            <div class="media-body mx-3">
                                <div class="assignment-header" onclick="toggleAssignment('assignment{{$itm->id_tugas}}')">
                                    <h4 class="mb-0 text-primary">{{ $itm->user->name }}
                                    </h4>
                                </div>
                                <div class="assignment-content" id="assignment{{ $itm->id_tugas }}" style="display: none;">
                                    @if ($itm->file_tugas_siswa)
                                        <div class="mt-2">
                                            @if (pathinfo($itm->file_tugas_siswa, PATHINFO_EXTENSION) == 'jpg' ||
                                                    pathinfo($itm->file_tugas_siswa, PATHINFO_EXTENSION) == 'jpeg' ||
                                                    pathinfo($itm->file_tugas_siswa, PATHINFO_EXTENSION) == 'png')
                                                <img src="{{ asset('storage/' . $itm->file_tugas_siswa) }}" alt="Thumbnail"
                                                    class="img-thumbnail">
                                            @endif
                                            <a href="{{ asset('storage/' . $itm->file_tugas_siswa) }}"
                                                class="btn btn-sm btn-primary">
                                                Download File
                                            </a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            {{-- <div class="dropdown">
                                <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-dots f-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">

                                    <form action="{{ route('tugas.destroy', $tugas->id_tugas) }}" method="POST"
                                        class="delete-form">
                                        <a href="{{ route('tugas.edit', $tugas->id_tugas) }}"
                                            class="dropdown-item">Edit</a>
                                        <a href="{{ route('tugas.tugasMasuk', $tugas->id_tugas) }}"
                                            class="dropdown-item">Tugas Masuk</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"
                                            data-id="{{ $tugas->id_tugas }}">Delete</button>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                        <hr class="my-3">
                    @endforeach
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
