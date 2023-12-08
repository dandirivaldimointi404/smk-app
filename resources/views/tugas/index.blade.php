@extends('layouts.master')
<style>
    .assignment-container {
        display: flex;
        flex-direction: column;
        width: 300px;
        margin: 20px;
    }

    .assignment-header {
        background-color: #f2f2f2;
        padding: 10px;
        cursor: pointer;
    }

    .assignment-content {
        display: none;
        padding: 10px;
        border: 1px solid #ddd;
    }
</style>

@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Data Tugas</h5>
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
                @php
                    $pastelColors = ['#B2DBBF', '#AED9E0', '#F0E1A1', '#F6B352', '#D8A7CA', '#C5DCA0', '#8EA4D2'];
                    $colorIndex = 0;
                @endphp

                @foreach ($mapels as $mapel)
                    @php
                        $currentColor = $pastelColors[$colorIndex % count($pastelColors)];
                        $colorIndex++;
                    @endphp

                    <div class="col-sm-4 position-relative">
                        <div class="card text-white widget-visitor-card" style="background-color: {{ $currentColor }};">
                            <div class="card-body text-center">
                                <h5 class="text-white">{{ $mapel->rombel->nama_kelas }} {{ $mapel->nama_mapel }}</h5>
                                <p class="text-white">{{ $mapel->guru->nama_guru }}</p>
                                <i class="material-icons-two-tone d-block f-46 text-white">account_circle</i>
                                <a href="{{ route('tugas.show', $mapel->id_mapel) }}"
                                    class="position-absolute bottom-0 end-0 mb-2 me-2 text-black ml-10"
                                    style="text-decoration: none;">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="assignment-container">
                    <div class="assignment-header" onclick="toggleAssignment('assignment1')">Tugas 1</div>
                    <div class="assignment-content" id="assignment1">
                        <p>Deskripsi tugas 1.</p>
                        <p>Deadline: 10 Desember 2023.</p>
                    </div>
                </div>

                <div class="assignment-container">
                    <div class="assignment-header" onclick="toggleAssignment('assignment2')">Tugas 2</div>
                    <div class="assignment-content" id="assignment2">
                        <p>Deskripsi tugas 2.</p>
                        <p>Deadline: 15 Desember 2023.</p>
                    </div>
                </div>

                {{-- <div class="col-sm-4">
                <div class="card bg-primary text-white widget-visitor-card">
                    <div class="card-body text-center">
                        <h2 class="text-white">5,678</h2>
                        <p class="text-white">Daily visitor</p>
                        <i class="material-icons-two-tone d-block f-46 text-white">description</i>
                    </div>
                </div>
            </div> --}}

                {{-- <div class="col-sm-4">
                <div class="card bg-success text-white widget-visitor-card">
                    <div class="card-body text-center">
                        <h2 class="text-white">5,678</h2>
                        <p class="text-white">Last month visitor</p>
                        <i class="material-icons-two-tone d-block f-46 text-white">emoji_events</i>
                    </div>
                </div>
            </div> --}}
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
