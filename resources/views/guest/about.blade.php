@extends('layouts.main-frontend')
@php
use App\Models\PortofolioCategory;
$portofolio_category = PortofolioCategory::all();
@endphp
@section('main-frontend')

<div>
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">About Us</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- about -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="row g-5">
                @forelse ($about as $about)
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="section-title position-relative mb-4 pb-2">
                        <h6 class="position-relative text-primary ps-4">About Us</h6>
                        <h2 class="mt-2">{{$about->title}}</h2>
                    </div>
                    <p class="mb-4">{{$about->desc}}</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>{{$about->about_1}}</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>{{$about->about_2}}</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>{{$about->about_3}}</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>{{$about->about_4}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{$about->image}}" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
                </div>
                @empty
                <p>No data available.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- team -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h6 class="position-relative d-inline text-primary ps-4">Our Team</h6>
                <h2 class="mt-2">Meet Our Team Members</h2>
            </div>
            <div class="row g-4">
                @forelse ($team as $team)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item">
                        <div class="d-flex">
                            <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                <a class="btn btn-square text-primary bg-white my-1" href="{{$team->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square text-primary bg-white my-1" href="{{$team->twitter}}"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square text-primary bg-white my-1" href="{{$team->instagram}}"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square text-primary bg-white my-1" href="{{$team->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <img class="img-fluid rounded w-100" src="{{$team->image}}" alt="">
                        </div>
                        <div class="px-4 py-3">
                            <h5 class="fw-bold m-0">{{$team->name}}</h5>
                            <small>{{$team->position}}</small>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="team-item">
                        <div class="px-4 py-3">
                            <h5 class="fw-bold m-0">No data</h5>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

</div>


@endsection