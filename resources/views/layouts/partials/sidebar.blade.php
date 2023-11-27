<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="index.html" class="b-brand">
                <img src="{{ asset('assets_panel/assets/images/logo-dark.svg') }}" alt class="logo logo-lg" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{ route('beranda.index') }}" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-dashboard"></i></span><span class="pc-mtext">Dashboard</span></a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Master Data</label>
                    <i class="ti ti-dashboard"></i>
                </li>
                <li class="pc-item">
                    <a href="{{ route('guru.index') }}" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-dashboard"></i></span><span class="pc-mtext">Data Guru</span></a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('rombel.index') }}" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-device-analytics"></i></span><span class="pc-mtext">Data
                            Kelas</span></a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('mapel.index') }}" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-device-analytics"></i></span><span class="pc-mtext">Data
                            Mapel</span></a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('siswa.index') }}" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-device-analytics"></i></span><span class="pc-mtext">Data
                            Siswa</span></a>
                </li>


                <li class="pc-item pc-caption">
                    <label>Pembelajaran</label>
                    <i class="ti ti-chart-arcs"></i>
                </li>
                <li class="pc-item">
                    <a href="{{ route('materi.index') }}" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-chart-arcs"></i></span><span class="pc-mtext">Data Materi</span></a>
                </li>
                <li class="pc-item {{ Request::is('tugas') || Request::is('tugas/*') ? 'active' : '' }}">
                    <a href="{{ route('tugas.index') }}" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-clipboard-list"></i></span><span class="pc-mtext">Data Tugas</span></a>
                </li>
                <li class="pc-item">
                    <a href="../widget/w_chart.html" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-chart-infographic"></i></span><span class="pc-mtext">Data Evaluasi
                            Materi</span></a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Laporan</label>
                    <i class="ti ti-layout"></i>
                </li>
                <li class="pc-item">
                    <a href="../demo/layout-vertical.html" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-layout-sidebar"></i></span><span class="pc-mtext">Absensi</span></a>
                </li>

            </ul>
        </div>
    </div>
</nav>