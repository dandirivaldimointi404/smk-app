<header class="pc-header">
    <div class="m-header">
        <a href="#" class="b-brand">
            <img src="{{ asset('assets_panel/assets/images/logo-dark.svg') }}" alt class="logo logo-lg" />
        </a>
        <div class="pc-h-item">
            <a href="#" class="pc-head-link head-link-secondary m-0" id="sidebar-hide">
                <i class="ti ti-menu-2"></i>
            </a>
        </div>
    </div>
    <div class="header-wrapper">
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets_panel/assets/images/user/avatar-2.jpg') }}" alt="user-image"
                            class="user-avtar" />
                        <span>
                            <i class="ti ti-settings"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header">
                            <h4>
                                Hi,
                                <span class="small text-muted"> {{ Auth::user()->name }}</span>
                            </h4>
                            <hr />
                            <div class="profile-notification-scroll position-relative"
                                style="max-height: calc(100vh - 280px)">
                                <a href="../application/social-profile.html" class="dropdown-item">
                                    <i class="ti ti-user"></i>
                                    <span>Profile</span>
                                </a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <div class="dropdown-divider"></div>
                                    <a href="route('logout')" class="dropdown-item has-icon text-danger"
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        <i class="ti ti-logout"></i> Logout
                                    </a>
                                </form>

                                {{-- <a href="../pages/login-v1.html" class="dropdown-item">
                                    <i class="ti ti-logout"></i>
                                    <span>Logout</span>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
