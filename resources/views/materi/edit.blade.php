@extends('layouts.master')

@section('content')
    <section class="pc-container">
        <div class="pc-content">

            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Tambah Materi</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <form action="{{ route('materi.update', $materi->id_materi) }}" method="post" enctype="multipart/form-data"
                    class="row">
                    @csrf
                    @method('put')

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Materi</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Judul Materi</label>
                                    <input type="text" class="form-control @error('judul_materi') is-invalid @enderror"
                                        name="judul_materi" id="judul_materi" placeholder="Masukkan Materi"
                                        value="{{ $materi->judul_materi }}">
                                    @error('judul_materi')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Pertemuan</label>
                                    <input type="number" class="form-control @error('pertemuan') is-invalid @enderror"
                                        name="pertemuan" id="pertemuan" placeholder="" value="{{ $materi->pertemuan }}">
                                    @error('pertemuan')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Deskripsi Materi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ $materi->deskripsi }}</textarea>
                                    @error('deskripsi')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-file mb-4">
                                    <label class="form-label">File Materi</label>
                                    <input type="file" name="file_materi"
                                        class="form-control @error('file_materi') is-invalid @enderror"
                                        aria-label="file example">
                                    @error('file_materi')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror

                                    @isset($materi->file_materi)
                                        <p>
                                            <a href="{{ asset('storage/' . $materi->file_materi) }}" target="_blank">Lihat File</a>
                                        </p>
                                    @else
                                        <p>Tidak Ada File</p>
                                    @endisset
                                </div>


                                <button style="float: right;" type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Untuk</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Mapel</label>
                                        <input type="text" class="form-control" name="id_mapel" id="id_mapel"
                                            placeholder="Masukkan Materi" value="{{ $materi->id_mapel }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label">Kelas</label>
                                        <input type="text" class="form-control" name="kelas_id" id="kelas_id"
                                            placeholder="Masukkan Materi" value="{{ $materi->kelas_id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
