@extends('layouts.asset')

@section('main-content')
<div class="pagetitle">
    <h1>Dashboard Admin</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Data</li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Visitor Website</h5>

            <!-- Default Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="today-tab" data-bs-toggle="tab" data-bs-target="#today" type="button" role="tab" aria-controls="today" aria-selected="true">Today</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="yesterday-tab" data-bs-toggle="tab" data-bs-target="#yesterday" type="button" role="tab" aria-controls="yesterday" aria-selected="false" tabindex="-1">Yesterday</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="this-month-tab" data-bs-toggle="tab" data-bs-target="#this-month" type="button" role="tab" aria-controls="this-month" aria-selected="false" tabindex="-1">This Month</button>
                </li>
            </ul>
            <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade active show" id="today" role="tabpanel" aria-labelledby="today-tab">
                    The number of visitors today is {{$today_count}} people
                </div>
                <div class="tab-pane fade" id="yesterday" role="tabpanel" aria-labelledby="yesterday-tab">
                    The number of visitors this month is {{$month_count}} people
                </div>
                <div class="tab-pane fade" id="this-month" role="tabpanel" aria-labelledby="this-month-tab">
                    The number of visitors this year is {{$year_count}} people
                </div>
            </div><!-- End Default Tabs -->

        </div>
    </div>
    <div class="row">

        <!-- service -->
        <div class="col-xl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Service</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-menu-up"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$service}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end service -->

        <!-- mitra -->
        <div class="col-xl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Mitra</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-menu-up"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$mitra}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end mitra -->

        <!-- portofolio -->
        <div class="col-xl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Portofolio</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-menu-up"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$portofolio}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end portofolio -->

        <!-- blog -->
        <div class="col-xl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Blog</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-menu-up"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$blog}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end blog -->

        <!-- my_team -->
        <div class="col-xl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">My Team</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-menu-up"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$myteam}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end my_team -->

        <!-- service_testimony -->
        <div class="col-xl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Service Testimony</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-menu-up"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$service_testimony}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end service_testimony -->

    </div>
</section>
@endsection