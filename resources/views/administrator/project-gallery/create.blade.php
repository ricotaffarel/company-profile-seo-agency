@extends('layouts.asset')

@section('main-content')
<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between">
        <div class="pagetitle">
            <h1>Project Gallery - Create</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Project Gallery</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <form class="row g-3 needs-validation" enctype="multipart/form-data" novalidate action="{{ route('administrator.project-gallery.store') }}" method="post">
            @csrf
            <div class="col-lg-12 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Project Gallery</h5>
                        <div class="col-12 mt-3">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" placeholder="title" class="form-control @error('title') is-invalid @enderror" id="title" required>
                            <div class="invalid-feedback">Please enter your title!</div>
                        </div>
                        <div class="col-12 mt-3">
                        <label for="desc" class="form-label">Add File Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <div class="col-12 mt-5">
                            <button class="btn btn-primary w-100" type="submit">Create</button>
                        </div>
                    </div>
                </div>
        </form>

    </div>
</div>
@endsection