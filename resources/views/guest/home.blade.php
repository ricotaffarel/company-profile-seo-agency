@extends('layouts.main-frontend')
@php
use App\Models\PortofolioCategory;
$portofolio_category = PortofolioCategory::all();
@endphp
@section('main-frontend')

<div>
    <!-- slidder -->
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse ($slidder as $index => $slide)
                <div class="carousel-item @if($index === 0) active @endif">
                    <div class="container my-5 py-5 px-lg-5">
                        <div class="row g-5 py-5">
                            <div class="col-lg-6 text-center text-lg-start">
                                <h1 class="text-white mb-4 animated zoomIn">{{$slide['title']}}</h1>
                                <p class="text-white pb-3 animated zoomIn">{{$slide['desc']}}</p>
                            </div>
                            <div class="col-lg-5 text-center text-lg-start">
                                <img class="img-fluid" src="{{$slide['image']}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>No slides available.</p>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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

    <!-- service category -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
                <h2 class="mt-2">What Solutions We Provide</h2>
            </div>
            <div class="row g-4">
                @forelse ($service_category as $service_category)
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="fa fa-home fa-2x"></i>
                        </div>
                        <h5 class="mb-3">{{$service_category->name}}</h5>
                        <p>{{$service_category->desc}}</p>
                    </div>
                </div>
                @empty
                <p>No data available.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- mitra -->
    <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <h6 class="position-relative d-inline text-primary ps-4">Our Client</h6>
        <h2 class="mt-2">Client here</h2>
    </div>
    <div class="container-xxl bg-primary testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <div id="mitraCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse ($mitra as $index => $mitra)
                <div class="carousel-item @if($index === 0) active @endif">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="card shadow testimonial-card">
                                    <div class="card-body text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div>
                                                <img class="img-fluid rounded w-50" src="{{$mitra->image}}" alt="">
                                                <small>{{ $mitra->name }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card shadow testimonial-card">
                                    <div class="card-body text-center">
                                        <p class="card-text">No testimonials available.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mitraCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mitraCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- project -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
                <h2 class="mt-2">What Solutions We Provide</h2>
            </div>
            <div class="row g-4">
                @forelse ($portofolio as $portofolio)
                @php
                $category = $portofolio_category->where('id', $portofolio->portofolio_categories_id)->first();
                @endphp
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <center><img class="img-fluid w-50" src="{{$portofolio->image}}" alt=""></center>
                        <a class="btn btn-light mt-2" href="{{$portofolio->image}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                        <h5 class="mb-3 mt-2">{{$category->name}}</h5>
                        <p>{{$portofolio->name}}</p>
                    </div>
                </div>
                @empty
                <p>No data available.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- testimony -->
    <div class="container-xxl bg-primary testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse ($testimony as $index => $testimonial)
                <div class="carousel-item @if($index === 0) active @endif">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="card shadow testimonial-card">
                                    <div class="card-body text-center">
                                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                                        <p class="card-text">{{ $testimonial->desc }}</p>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img class="img-fluid rounded-circle me-3" src="{{ asset('assets2/img/testimonial-2.jpg') }}" style="width: 50px; height: 50px;" alt="{{ $testimonial->client_name }}">
                                            <div>
                                                <h6 class="mb-0">{{ $testimonial->name }}</h6>
                                                <small>{{ $testimonial->job }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card shadow testimonial-card">
                                    <div class="card-body text-center">
                                        <p class="card-text">No testimonials available.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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