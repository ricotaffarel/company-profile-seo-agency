@extends('layouts.asset')

@section('main-content')
<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between">
        <div class="pagetitle">
            <h1>Portofolio - Create</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Portofolio</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <form class="row g-3 needs-validation" enctype="multipart/form-data" novalidate action="{{ route('administrator.portofolio.store') }}" method="post">
            @csrf
            <div class="col-lg-12 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Portofolio</h5>
                        <div class="col-12 mt-3">
                            <label for="name" class="form-label">Category Name</label>
                            <select class="form-select" name="portofolio_categories_id" aria-label="Default select example">
                                <option selected="">Open this select category</option>
                                @forelse ($portofolio_category as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" placeholder="name" class="form-control @error('name') is-invalid @enderror" id="name">
                            <div class="invalid-feedback">Please enter your name portofolio!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="desc" class="form-label">Desc</label>
                            <div class="input-group has-validation">
                                <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                <textarea type="text" name="desc" placeholder="deskripsi" class="form-control @error('desc') is-invalid @enderror" id="desc"></textarea>
                                <div class="invalid-feedback">Please enter your desc.</div>
                            </div>
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