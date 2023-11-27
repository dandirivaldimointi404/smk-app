@extends('layouts.master')
@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Data Guru</h5>
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
                            <h5>Tambah Data Guru</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('guru.update', $guru->nip) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group mb-4">
                                    <div class="col-lg-12">
                                        <label class="form-label">Photo</label>
                                        <input name="avatar" id="avatar" type="file"
                                            class="form-control @error('avatar') is-invalid @enderror"
                                            data-bouncer-target="#file-error-msg">

                                        @error('avatar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if ($guru->user->avatar)
                                            <a href="{{ asset('storage/avatars/' . $guru->user->avatar) }}"
                                                target="_blank">Lihat Foto</a>
                                        @else
                                            <p>Tidak Ada Foto</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group mb-4">
                                    <div class="col-lg-12">
                                        <label class="form-label">NIP</label>
                                        <div class="input-group search-form">
                                            <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                                placeholder="Masukan NIP" name="nip" id="nip"
                                                value="{{ $guru->nip }}">
                                            <span class="input-group-text bg-transparent"><i
                                                    class="feather icon-lock"></i></span>
                                        </div>
                                        @error('nip')
                                            <small id="file-error-msg" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="form-label">Nama Guru</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Masukan Nama Lengkap" name="name" id="name"
                                                value="{{ $guru->user->name }}">
                                            @error('username')
                                                <small id="file-error-msg"
                                                    class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Username</label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Masukan Username" name="username" id="username"
                                                value="{{ $guru->user->username }}">
                                            @error('username')
                                                <small id="file-error-msg"
                                                    class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div class="col-lg-12 col-md-11 col-sm-12">
                                        <select class="form-control @error('jenis_kelamin_id') is-invalid @enderror"
                                            name="jenis_kelamin_id" id="choices-single-no-sorting">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            @foreach ($jenis_kelamin as $item)
                                                <option value="{{ $item->id_jenis_kelamin }}"
                                                    {{ $guru->jenis_kelamin_id == $item->id_jenis_kelamin ? 'selected' : '' }}>
                                                    {{ $item->jenis_kelamin }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('jenis_kelamin_id')
                                            <small id="jenis-kelamin-error-msg"
                                                class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group mb-4">
                                    <div class="col-lg-12">
                                        <label class="form-label">Password</label>
                                        <div class="input-group search-form">
                                            <input type="Password"
                                                class="form-control @error('jenis_kelamin_id') is-invalid @enderror"
                                                placeholder="Masukan Password" name="password" id="password"
                                                value="{{ $guru->user->password }}">
                                            <span class="input-group-text bg-transparent"><i
                                                    class="feather icon-lock"></i></span>
                                        </div>
                                        @error('jenis_kelamin_id')
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
