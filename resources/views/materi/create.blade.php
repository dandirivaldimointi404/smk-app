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
                            {{-- <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../navigation/index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Forms</a></li>
                                <li class="breadcrumb-item" aria-current="page">Simple Form Layout</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <form action="{{ route('materi.store') }}" method="post" enctype="multipart/form-data" class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>Tambah Materi</h5>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Judul Materi</label>
                                    <input type="text" class="form-control @error('judul_materi') is-invalid @enderror"
                                        name="judul_materi" id="judul_materi" aria-describedby=""
                                        placeholder="Masukan Materi">
                                    @error('judul_materi')
                                        <small id="file-error-msg" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Pertemuan</label>
                                    <input type="number" class="form-control @error('pertemuan') is-invalid @enderror"
                                        name="pertemuan" id="pertemuan" aria-describedby="" placeholder="">
                                    @error('judul_materi')
                                        <small id="file-error-msg" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Deskripsi Materi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4"></textarea>
                                    @error('deskripsi')
                                        <small id="file-error-msg" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-file mb-4">
                                    <label class="form-label"> File Materi</label>
                                    <input type="file" name="file_materi"
                                        class="form-control @error('file_materi') is-invalid @enderror"
                                        aria-label="file example">
                                    @error('file_materi')
                                        <small id="file-error-msg" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
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
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Mapel</label>
                                            <input type="text" class="form-control" name="id_mapel" id="id_mapel"
                                                aria-describedby="" placeholder="Masukan Materi"
                                                value="{{ $id_mapel }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="form-label">Kelas</label>
                                            <input type="text" class="form-control" name="kelas_id" id="kelas_id"
                                                aria-describedby="" placeholder="Masukan Materi"
                                                value="{{ $kelas_id }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
