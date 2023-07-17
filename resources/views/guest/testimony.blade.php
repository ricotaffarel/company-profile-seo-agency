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
                    <h1 class="text-white animated zoomIn">Testimony</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Testimony</li>
                        </ol>
                    </nav>
                </div>
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

</div>


@endsection