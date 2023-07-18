@extends('layouts.main-frontend')
@section('main-frontend')

<div>
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">Blogs</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- about -->
    @forelse ($blog as $blog)
    <center>
        <div class="col-md-6 mb-4">
            <div class="blog-post">
                <img src="{{ $blog->image }}" class="img-fluid mb-3" alt="{{ $blog->title }}">
                <h2 class="blog-title">{{ $blog->title }}</h2>
                <p >Author: {{ $blog->author }}</p>
                <p style="text-align: justify;">{{ $blog->desc }}</p>
            </div>
        </div>
    </center>
    @empty
    <p>No data available.</p>
    @endforelse


</div>


@endsection