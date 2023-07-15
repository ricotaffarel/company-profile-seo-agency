<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
            <!-- <img src="{{ asset('images/logo.png') }}" alt=""> -->
            <span class="d-none d-lg-block">Seo Master Agency</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2">Super Admin</span>

                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <span>Administrator</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#changepassword">
                            <i class="bi bi-lock"></i>
                            {{ __('Change Password') }}
                        </button>
                    </li>

                    <li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#clonSandbox">
                            <i class="bi bi-alt"></i>
                            {{ __('Clon to Sandbox') }}
                        </button>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="bi bi-box-arrow-right"></i>
                            {{ __('Logout') }}
                        </button>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->
</header>