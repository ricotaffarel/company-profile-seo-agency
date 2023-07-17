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
                    <h1 class="text-white animated zoomIn">Service</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                        </ol>
                    </nav>
                </div>
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
                    <a href="{{ route('service', $service_category->id) }}" class="text-decoration-none">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fa fa-home fa-2x"></i>
                            </div>
                            <h5 class="mb-3">{{$service_category->name}}</h5>
                            <p>{{$service_category->desc}}</p>
                        </div>
                    </a>
                </div>
                @empty
                <p>No data available.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>


@endsection