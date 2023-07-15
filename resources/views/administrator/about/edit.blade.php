@extends('layouts.asset')

@section('main-content')
<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between">
        <div class="pagetitle">
            <h1>ABout - Update</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">ABout</a></li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <form class="row g-3 needs-validation" enctype="multipart/form-data" novalidate action="{{ route('administrator.about.update', Crypt::encrypt($data->id)) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-lg-12 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update ABout</h5>
                        <div class="col-12 mt-3">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" placeholder="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{$data->title}}">
                            <div class="invalid-feedback">Please enter your title!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="desc" class="form-label">Desc</label>
                            <input name="desc" placeholder="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" value="{{$data->desc}}">
                            <div class="invalid-feedback">Please enter your desc!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="about_1" class="form-label">About 1</label>
                            <input name="about_1" placeholder="about_1" class="form-control @error('about_1') is-invalid @enderror" id="about_1" value="{{$data->about_1}}">
                            <div class="invalid-feedback">Please enter your about_1!</div>
                        </div>

                        <div class="col-12 mt-3">
                            <label for="about_2" class="form-label">About 2</label>
                            <input name="about_2" placeholder="about_2" class="form-control @error('about_2') is-invalid @enderror" id="about_2" value="{{$data->about_2}}">
                            <div class="invalid-feedback">Please enter your about_2!</div>
                        </div>

                        <div class="col-12 mt-3">
                            <label for="about_3" class="form-label">About 3</label>
                            <input name="about_3" placeholder="about_3" class="form-control @error('about_3') is-invalid @enderror" id="about_3" value="{{$data->about_3}}">
                            <div class="invalid-feedback">Please enter your about_3!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="about_4" class="form-label">About 4</label>
                            <input name="about_4" placeholder="about_4" class="form-control @error('about_4') is-invalid @enderror" id="about_4" value="{{$data->about_4}}">
                            <div class="invalid-feedback">Please enter your about_4!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="desc" class="form-label">Add File Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                            @if(isset($data->image))
                            <img src="{{ asset($data->image) }}" alt="..." class="w-25 mt-2">
                            @endif

                        </div>
                        <div class="col-12 mt-5">
                            <button class="btn btn-primary w-100" type="submit">Save</button>
                        </div>
                    </div>
                </div>
        </form>

    </div>
</div>
@endsection