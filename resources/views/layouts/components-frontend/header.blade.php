@php
use App\Models\Menu;
$menu = Menu::latest()->get();
@endphp

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-search me-2"></i>SEO<span class="fs-5">Master</span></h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link {{ Route::current()->getName()== 'home' ? 'active' : '' }} ">{{$menu[0]->name}}</a>
                <a href="/about" class="nav-item nav-link {{ Route::current()->getName()== 'about' ? 'active' : '' }}">{{$menu[1]->name}}</a>
                <a href="/service" class="nav-item nav-link {{ Route::current()->getName()== 'service-category' ? 'active' : '' }}">{{$menu[2]->name}}</a>
                <a href="/portofolio" class="nav-item nav-link {{ Route::current()->getName()== 'portofolio' ? 'active' : '' }}">{{$menu[3]->name}}</a>
                <a href="/team" class="nav-item nav-link {{ Route::current()->getName()== 'team' ? 'active' : '' }}">{{$menu[4]->name}}</a>
                <a href="/testimony" class="nav-item nav-link {{ Route::current()->getName()== 'testimony' ? 'active' : '' }}">{{$menu[5]->name}}</a>
                <a href="/contact" class="nav-item nav-link {{ Route::current()->getName()== 'contact' ? 'active' : '' }}">{{$menu[6]->name}}</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar & Hero End -->