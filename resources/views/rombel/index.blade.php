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
                            <h5>Daftar Kelas</h5>
                            <a href="{{ route('rombel.create') }}" class="btn btn-outline-success d-inline-flex"
                                style="float: right;">
                                <i class="ti ti-circle-plus align-text-bottom"></i>Tambah Data Kelas
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
                                            <th>Nama Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rombel as $item)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $item->nama_kelas }}
                                                </td>
                                                <td>{{ $item->guru->nama_guru }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('rombel.destroy', $item->id_kelas) }}" method="POST"
                                                        class="delete-form">
                                                        <a href="{{ route('rombel.edit', $item->id_kelas) }}"
                                                            class="btn btn-outline-primary"><i class="ti ti-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            data-id="{{ $item->id_kelas }}"><i
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
