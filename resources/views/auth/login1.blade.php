<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | SMK APP</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Berry is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Berry, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <link rel="icon" href="{{ asset('assets_panel/assets/images/favicon.svg') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        id="main-font-link">

    <link rel="stylesheet" href="{{ asset('assets_panel/assets/fonts/tabler-icons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_panel/assets/fonts/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_panel/assets/fonts/fontawesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_panel/assets/fonts/material.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_panel/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets_panel/assets/css/style-preset.css') }}" id="preset-style-link">
</head>

<body>

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card mt-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h2 class="text-secondary"><b>Hi, Selamat Datang</b></h2>
                                    </div>
                                    {{-- <a href="login-v1.html#">
                                        <img src="{{ asset('assets_panel/assets/images/logo-dark.svg') }}"
                                            alt="image">
                                    </a> --}}
                                </div>
                            </div>

                            <h5 class="my-4 d-flex justify-content-center"></h5>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Username"
                                    name="username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput1" placeholder="Password"
                                    name="password">
                                <label for="floatingInput1">Password</label>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-secondary">Log In</button>
                            </div>
                            <hr>
                        </div>
                </div>
                </form>
            </div>

            <div class="auth-sidecontent">
                <div class="p-3 px-lg-5 text-center">
                    <div class="animation-content mb-4">
                        <img src="{{ asset('assets_panel/assets/images/authentication/authentication-purple-card 1 (2).svg') }}"
                            alt="images" class="img-fluid purple-card mt-3">
                        {{-- <img src="{{ asset('assets_panel/assets/images/authentication/Frame 1.svg') }}"
                            alt="images" class="img-fluid blue-card mt-3"> --}}
                    </div>
                    <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h1><b>Smk Teknologi Muhammadiyah Limboto</b></h1>
                                <p class="f-12 mt-4">Teknik Komputer Dan Jaringan</p>
                            </div>
                        </div>
                        <div class="carousel-indicators position-relative">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets_panel/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/config.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/plugins/feather.min.js') }}"></script>
    {{-- <div class="pct-c-btn">
        <button class="btn btn-secondary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_layout">
            <i data-feather="settings"></i>
        </button>
    </div>
    <div class="offcanvas pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_layout">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Berry Customizer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="pct-body" style="height: calc(100% - 60px)">
            <div class="offcanvas-body">
                <div class="card">
                    <div class="card-header">
                        <h5>Layout</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-1">Mode</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout_mode" id="layoutmodelight"
                                onclick="layout_change('light')">
                            <label class="form-check-label" for="layoutmodelight"> Light </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout_mode" id="layoutmodedark"
                                onclick="layout_change('dark')">
                            <label class="form-check-label" for="layoutmodedark"> Dark </label>
                        </div>
                        <div class="pc-rtl">
                            <p class="mt-3 mb-1">Direction</p>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="layoutmodertl">
                                <label class="form-check-label" for="layoutmodertl">RTL</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Preset Color</h5>
                    </div>
                    <div class="card-body">
                        <div class="theme-color preset-color">
                            <a href="login-v1.html#!" class="active"
                                data-value="preset-1"><span></span><span></span></a>
                            <a href="login-v1.html#!" class data-value="preset-2"><span></span><span></span></a>
                            <a href="login-v1.html#!" class data-value="preset-3"><span></span><span></span></a>
                            <a href="login-v1.html#!" class data-value="preset-4"><span></span><span></span></a>
                            <a href="login-v1.html#!" class data-value="preset-5"><span></span><span></span></a>
                            <a href="login-v1.html#!" class data-value="preset-6"><span></span><span></span></a>
                            <a href="login-v1.html#!" class data-value="preset-7"><span></span><span></span></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Font Family</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="layout_font" id="layoutfontRoboto"
                                checked onclick="font_change('Roboto')">
                            <label class="form-check-label" for="layoutfontRoboto"> Roboto </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="layout_font" id="layoutfontPoppins"
                                onclick="font_change('Poppins')">
                            <label class="form-check-label" for="layoutfontPoppins"> Poppins </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="layout_font" id="layoutfontInter"
                                onclick="font_change('Inter')">
                            <label class="form-check-label" for="layoutfontInter"> Inter </label>
                        </div>
                    </div>
                </div>
                <div class="card pc-boxcontainer">
                    <div class="card-header">
                        <h5>Box Container</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="layoutboxcontainer">
                            <label class="form-check-label" for="layoutboxcontainer">Container</label>
                        </div>
                    </div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="{{ asset('assets_panel/assets/js/customizer.js') }}"></script>
</body>

</html>
