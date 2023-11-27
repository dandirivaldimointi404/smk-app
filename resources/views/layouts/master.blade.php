<!DOCTYPE html>
<html lang="en">

<head>
    <title>| SMK APP</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Berry is made using Bootstrap 5 design framework. Download the free admin template & use it for your project." />
    <meta name="keywords"
        content="Berry, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template" />
    <meta name="author" content="CodedThemes" />

    <link rel="icon" href="{{ asset('assets_panel/assets/images/favicon.svg') }}" type="image/x-icon" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        id="main-font-link" />

    <link rel="stylesheet" href="{{ asset('assets_panel/assets/fonts/tabler-icons.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets_panel/assets/fonts/feather.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets_panel/assets/fonts/fontawesome.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets_panel/assets/fonts/material.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets_panel/assets/css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('assets_panel/assets/css/style-preset.css') }}" id="preset-style-link" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    @include('layouts.partials.header')

    @include('layouts.partials.sidebar')

    @yield('content')

    <script>
        @if (Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ Session::get('success') }}'
            })
        @endif

        document.addEventListener("DOMContentLoaded", function() {
            const deleteForms = document.querySelectorAll(".delete-form");

            deleteForms.forEach((form) => {
                const deleteButton = form.querySelector(".delete-button");
                const itemId = deleteButton.getAttribute("data-id");

                form.addEventListener("submit", function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: "Anda yakin?",
                        text: "Anda tidak dapat mengembalikannya!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, hapus!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form
                                .submit();
                        }
                    });
                });
            });
        });
    </script>

    @include('layouts.partials.footer')

    <script src="{{ asset('assets_panel/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/config.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/plugins/feather.min.js') }}"></script>

    {{-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}

    <script src="{{ asset('assets_panel/assets/js/plugins/simple-datatables.js') }}"></script>
    <script>
        const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
            sortable: false,
            perPage: 5
        });
    </script>

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
                onclick="layout_change('light')" />
              <label class="form-check-label" for="layoutmodelight">
                Light
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="layout_mode" id="layoutmodedark"
                onclick="layout_change('dark')" />
              <label class="form-check-label" for="layoutmodedark">
                Dark
              </label>
            </div>
            <div class="pc-rtl">
              <p class="mt-3 mb-1">Direction</p>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="layoutmodertl" />
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
              <a href="index.html#!" class="active" data-value="preset-1"><span></span><span></span></a>
              <a href="index.html#!" class data-value="preset-2"><span></span><span></span></a>
              <a href="index.html#!" class data-value="preset-3"><span></span><span></span></a>
              <a href="index.html#!" class data-value="preset-4"><span></span><span></span></a>
              <a href="index.html#!" class data-value="preset-5"><span></span><span></span></a>
              <a href="index.html#!" class data-value="preset-6"><span></span><span></span></a>
              <a href="index.html#!" class data-value="preset-7"><span></span><span></span></a>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5>Font Family</h5>
          </div>
          <div class="card-body">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="layout_font" id="layoutfontRoboto" checked
                onclick="font_change('Roboto')" />
              <label class="form-check-label" for="layoutfontRoboto">
                Roboto
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="layout_font" id="layoutfontPoppins"
                onclick="font_change('Poppins')" />
              <label class="form-check-label" for="layoutfontPoppins">
                Poppins
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="layout_font" id="layoutfontInter"
                onclick="font_change('Inter')" />
              <label class="form-check-label" for="layoutfontInter">
                Inter
              </label>
            </div>
          </div>
        </div>
        <div class="card pc-boxcontainer">
          <div class="card-header">
            <h5>Box Container</h5>
          </div>
          <div class="card-body">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="layoutboxcontainer" />
              <label class="form-check-label" for="layoutboxcontainer">Container</label>
            </div>
          </div>
        </div>
        <div class="d-grid">
          <button class="btn btn-light-danger" id="layoutreset">
            Reset Layout
          </button>
        </div>
      </div>
    </div>
  </div> --}}

    <script src="{{ asset('assets_panel/assets/js/customizer.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/pages/dashboard-default.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/plugins/uppy.min.js') }}"></script>
    <script src="{{ asset('assets_panel/assets/js/plugins/choices.min.js') }}"></script>


</body>

</html>
