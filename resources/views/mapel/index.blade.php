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
                            <h5>Daftar Mapel</h5>
                            <a href="{{ route('mapel.create') }}" class="btn btn-outline-success d-inline-flex"
                                style="float: right;">
                                <i class="ti ti-circle-plus align-text-bottom"></i>Tambah Data Mapel
                            </a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered nowrap" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>
                                                NO
                                            </th>
                                            <th>Nama Mapel</th>
                                            <th>Kelas</th>
                                            <th>Pengajar</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mapel as $item)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $item->nama_mapel }}
                                                </td>
                                                <td>{{ $item->rombel->nama_kelas }}</td>
                                                <td>{{ $item->guru->nama_guru }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('mapel.destroy', $item->id_mapel) }}" method="POST"
                                                        class="delete-form">
                                                        <a href="{{ route('mapel.edit', $item->id_mapel) }}"
                                                            class="btn btn-outline-primary"><i class="ti ti-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            data-id="{{ $item->id_mapel }}"><i
                                                                class="ti ti-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
