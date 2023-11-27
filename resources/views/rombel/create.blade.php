@extends('layouts.master')
@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Data Kelas</h5>
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
                            <h5>Tambah Daftar Kelas</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('rombel.index') }}" method="post">
                                @csrf
                                <div class="form-group row mb-4">
                                    <div class="col-lg-6">
                                        <label class="form-label">Nama Kelas</label>
                                        <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror"
                                            placeholder="Masukan Nama Kelas" name="nama_kelas" id="nama_kelas" value="{{old('nama_kelas')}}">
                                        @error('nama_kelas')
                                            <small id="file-error-msg" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Wali Kelas</label>
                                        <select class="form-control @error('nip_id') is-invalid @enderror" name="nip_id"
                                            id="choices-single-no-sorting">
                                            <option value="">Pilih Wali Kelas</option>
                                            @foreach ($guru as $item)
                                                <option value="{{ $item->nip }}"
                                                    {{ old('nip_id') == $item->nip ? 'selected' : '' }}>
                                                    {{ $item->nama_guru }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('nip_id')
                                            <small id="file-error-msg" class="form-text text-danger">{{ $message }}</small>
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
