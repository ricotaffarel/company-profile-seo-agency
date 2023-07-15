@extends('layouts.asset')

@section('main-content')
<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between">
        <div class="pagetitle">
            <h1>Category Service - Update</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Category Service</a></li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
    <form class="row g-3 needs-validation" enctype="multipart/form-data" novalidate action="{{ route('administrator.service-category.update', Crypt::encrypt($data->id)) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-lg-12 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Category Service</h5>
                        <div class="col-12 mt-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input name="name" placeholder="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$data->name}}">
                            <div class="invalid-feedback">Please enter your category!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="desc" class="form-label">Deskripsi</label>
                            <div class="input-group has-validation">
                                <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                <textarea type="text" name="desc" placeholder="deskripsi" class="form-control @error('desc') is-invalid @enderror" id="desc">{{$data->desc}}</textarea>
                                <div class="invalid-feedback">Please enter your desc.</div>
                            </div>
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
