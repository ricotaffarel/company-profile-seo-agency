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
                    <h1 class="text-white animated zoomIn">Service Detail</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Service>Detail</li>
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
                @forelse ($service as $service)
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <center><img class="img-fluid w-50" src="{{$service->image}}" alt=""></center>
                        <a class="btn btn-light mt-2" href="{{$service->image}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                        <h5 class="mb-3 mt-2">{{$service->name}}</h5>
                        <p>{{$service->name}}</p>
                    </div>
                </div>
                @empty
                <p>No data available.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>


@endsection