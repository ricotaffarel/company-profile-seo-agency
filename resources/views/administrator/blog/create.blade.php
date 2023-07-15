@extends('layouts.asset')

@section('main-content')
<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between">
        <div class="pagetitle">
            <h1>Blog - Create</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Blog</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <form class="row g-3 needs-validation" enctype="multipart/form-data" novalidate action="{{ route('administrator.blog.store') }}" method="post">
            @csrf
            <div class="col-lg-12 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Blog</h5>
                        <div class="col-12 mt-3">
                            <label for="name" class="form-label">Category Name</label>
                            <select class="form-select" name="blog_categories_id" aria-label="Default select example">
                                <option selected="">Open this select category</option>
                                @forelse ($blog_category as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="author" class="form-label">Author</label>
                            <input name="author" placeholder="author" class="form-control @error('author') is-invalid @enderror" id="author">
                            <div class="invalid-feedback">Please enter your author!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" placeholder="title" class="form-control @error('title') is-invalid @enderror" id="title">
                            <div class="invalid-feedback">Please enter your title!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="desc" class="form-label">Deskripsi</label>
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