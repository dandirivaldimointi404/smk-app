@extends('layouts.master')
@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Data Mapel</h5>
                            </div>
                            {{-- <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../navigation/index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Customer</a></li>
                                <li class="breadcrumb-item" aria-current="page">Customer List</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tambah Daftar Mapel</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('mapel.index') }}" method="post">
                                @csrf
                                <div class="form-group row mb-3">
                                    <div class="col-lg-6">
                                        <label class="form-label">Nama Mapel</label>
                                        <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror"
                                            placeholder="Masukan Nama Mapel" name="nama_mapel" id="nama_mapel"
                                            value="{{ old('nama_mapel') }}">
                                        @error('nama_mapel')
                                            <small id="file-error-msg" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Kelas</label>
                                        <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id"
                                            id="choices-single-no-sorting">
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($rombel as $item)
                                                <option value="{{ $item->id_kelas }}"
                                                    {{ old('kelas_id') == $item->id_kelas ? 'selected' : '' }}>
                                                    {{ $item->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kelas_id')
                                            <small id="file-error-msg" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-lg-12">
                                        <label class="form-label">Guru Pengajar</label>
                                        <select class="form-control @error('nip_id') is-invalid @enderror" name="nip_id"
                                            id="choices-single-no-sorting">
                                            <option value="">Pilih Guru</option>
                                            @foreach ($guru as $item)
                                                <option value="{{ $item->nip }}"
                                                    {{ old('nip_id') == $item->nip ? 'selected' : '' }}>
                                                    {{ $item->nama_guru }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('nip_id')
                                            <small id="file-error-msg"
                                                class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit" style="float: right;">Simpan
                                        Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
