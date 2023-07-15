@extends('layouts.asset')

@section('main-content')
<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between">
        <div class="pagetitle">
            <h1>My Team - Create</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">My Team</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <form class="row g-3 needs-validation" enctype="multipart/form-data" novalidate action="{{ route('administrator.myteam.store') }}" method="post">
            @csrf
            <div class="col-lg-12 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create My Team</h5>
                        <div class="col-12 mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" placeholder="name" class="form-control @error('name') is-invalid @enderror" id="name">
                            <div class="invalid-feedback">Please enter your name!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="position" class="form-label">Position</label>
                            <input name="position" placeholder="position" class="form-control @error('position') is-invalid @enderror" id="position">
                            <div class="invalid-feedback">Please enter your position!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input name="facebook" placeholder="link facebook" class="form-control @error('facebook') is-invalid @enderror" id="facebook">
                            <div class="invalid-feedback">Please enter your facebook!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input name="instagram" placeholder="link instagram" class="form-control @error('instagram') is-invalid @enderror" id="instagram">
                            <div class="invalid-feedback">Please enter your instagram!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input name="twitter" placeholder="link twitter" class="form-control @error('twitter') is-invalid @enderror" id="twitter">
                            <div class="invalid-feedback">Please enter your twitter!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input name="linkedin" placeholder="link linkedin" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin">
                            <div class="invalid-feedback">Please enter your linkedin!</div>
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