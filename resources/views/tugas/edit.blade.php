@extends('layouts.master')

@section('content')
<section class="pc-container">
    <div class="pc-content">

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Edit Tugas</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <form action="{{ route('tugas.update', $tugas->id_tugas) }}" method="post" enctype="multipart/form-data"
                class="row">
                @csrf
                @method('put')
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Tugas</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Judul tugas</label>
                                <input type="text" class="form-control @error('judul_tugas') is-invalid @enderror"
                                    name="judul_tugas" id="judul_tugas" placeholder="Masukkan tugas"
                                    value="{{ $tugas->judul_tugas }}">
                                @error('judul_tugas')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Pertemuan</label>
                                <input type="date" class="form-control @error('batas_waktu') is-invalid @enderror"
                                    name="batas_waktu" id="pertemuan" placeholder="" value="{{ $tugas->batas_waktu }}">
                                @error('batas_waktu')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Deskripsi Tugas</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    name="deskripsi" rows="4">{{ $tugas->deskripsi }}</textarea>
                                @error('deskripsi')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-file mb-4">
                                <label class="form-label">File Tugas</label>
                                <input type="file" name="file_tugas"
                                    class="form-control @error('file_tugas') is-invalid @enderror"
                                    aria-label="file example">
                                @error('file_tugas')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                                @isset($tugas->file_tugas)
                                <p>
                                    <a href="{{ asset('storage/' . $tugas->file_tugas) }}" target="_blank">Lihat
                                        File</a>
                                </p>
                                @else
                                <p>Tidak Ada File</p>
                                @endisset
                            </div>


                            <button style="float: right;" type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Untuk</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label">Mapel</label>
                                    <input type="text" class="form-control" name="id_mapel" id="id_mapel"
                                        placeholder="Masukkan tugas" value="{{ $tugas->id_mapel }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-label">Kelas</label>
                                    <input type="text" class="form-control" name="kelas_id" id="kelas_id"
                                        placeholder="Masukkan tugas" value="{{ $tugas->kelas_id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
</section>
@endsection