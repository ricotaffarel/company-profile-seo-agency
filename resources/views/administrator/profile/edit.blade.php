@extends('layouts.asset')

@section('main-content')
<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between">
        <div class="pagetitle">
            <h1>Profile - Update</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Profile</a></li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <form class="row g-3 needs-validation" enctype="multipart/form-data" novalidate action="{{ route('administrator.profile.update', Crypt::encrypt($data->id)) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-lg-12 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Profile</h5>
                        <div class="col-12 mt-3">
                            <label for="title_footer_1" class="form-label">Title Footer 1</label>
                            <input name="title_footer_1" placeholder="title_footer_1" class="form-control @error('title_footer_1') is-invalid @enderror" id="title_footer_1" value="{{$data->title_footer_1}}">
                            <div class="invalid-feedback">Please enter your title_footer_1!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="title_footer_2" class="form-label">Title Footer 2</label>
                            <input name="title_footer_2" placeholder="title_footer_2" class="form-control @error('title_footer_2') is-invalid @enderror" id="title_footer_2" value="{{$data->title_footer_2}}">
                            <div class="invalid-feedback">Please enter your title_footer_2!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="title_footer_3" class="form-label">Title Footer 3</label>
                            <input name="title_footer_3" placeholder="title_footer_3" class="form-control @error('title_footer_3') is-invalid @enderror" id="title_footer_3" value="{{$data->title_footer_3}}">
                            <div class="invalid-feedback">Please enter your title_footer_3!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="title_footer_4" class="form-label">Title Footer 4</label>
                            <input name="title_footer_4" placeholder="title_footer_4" class="form-control @error('title_footer_4') is-invalid @enderror" id="title_footer_4" value="{{$data->title_footer_4}}">
                            <div class="invalid-feedback">Please enter your title_footer_4!</div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="desc_title_footer_4" class="form-label">Desc Footer 4</label>
                            <div class="input-group has-validation">
                                <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                <textarea type="text" name="desc_title_footer_4" placeholder="deskripsi" class="form-control @error('desc_title_footer_4') is-invalid @enderror" id="desc_title_footer_4">{{$data->desc_title_footer_4}}</textarea>
                                <div class="invalid-feedback">Please enter your desc_title_footer_4.</div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="address" class="form-label">Address</label>
                                <input name="address" placeholder="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{$data->address}}">
                                <div class="invalid-feedback">Please enter your address!</div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="city" class="form-label">City</label>
                                <input name="city" placeholder="city" class="form-control @error('city') is-invalid @enderror" id="city" value="{{$data->city}}">
                                <div class="invalid-feedback">Please enter your city!</div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="country" class="form-label">Country</label>
                                <input name="country" placeholder="country" class="form-control @error('country') is-invalid @enderror" id="country" value="{{$data->country}}">
                                <div class="invalid-feedback">Please enter your country!</div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <input name="postal_code" placeholder="postal_code" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" value="{{$data->postal_code}}">
                                <div class="invalid-feedback">Please enter your postal_code!</div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input name="phone" placeholder="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{$data->phone}}">
                                <div class="invalid-feedback">Please enter your phone!</div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$data->email}}">
                                <div class="invalid-feedback">Please enter your email!</div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="vision" class="form-label">Vision</label>
                                <div class="input-group has-validation">
                                    <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                    <textarea type="text" name="vision" placeholder="deskripsi" class="form-control @error('vision') is-invalid @enderror" id="vision">{{$data->vision}}</textarea>
                                    <div class="invalid-feedback">Please enter your vision.</div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="mission" class="form-label">Mission</label>
                                    <div class="input-group has-validation">
                                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                        <textarea type="text" name="mission" placeholder="deskripsi" class="form-control @error('mission') is-invalid @enderror" id="mission">{{$data->mission}}</textarea>
                                        <div class="invalid-feedback">Please enter your mission.</div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input name="facebook" placeholder="facebook" class="form-control @error('facebook') is-invalid @enderror" id="facebook" value="{{$data->facebook}}">
                                    <div class="invalid-feedback">Please enter your facebook!</div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input name="instagram" placeholder="instagram" class="form-control @error('instagram') is-invalid @enderror" id="instagram" value="{{$data->instagram}}">
                                    <div class="invalid-feedback">Please enter your instagram!</div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="twitter" class="form-label">Twitter</label>
                                    <input name="twitter" placeholder="twitter" class="form-control @error('twitter') is-invalid @enderror" id="twitter" value="{{$data->twitter}}">
                                    <div class="invalid-feedback">Please enter your twitter!</div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input name="linkedin" placeholder="linkedin" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" value="{{$data->linkedin}}">
                                    <div class="invalid-feedback">Please enter your linkedin!</div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="link_map" class="form-label">Link Goolge Map</label>
                                    <input name="link_map" placeholder="link_map" class="form-control @error('link_map') is-invalid @enderror" id="link_map" value="{{$data->link_map}}">
                                    <div class="invalid-feedback">Please enter your link_map!</div>
                                    <div class="col-12 mt-3">
                                        <label for="copy_right" class="form-label">Copy Right</label>
                                        <input name="copy_right" placeholder="copy_right" class="form-control @error('copy_right') is-invalid @enderror" id="copy_right" value="{{$data->copy_right}}">
                                        <div class="invalid-feedback">Please enter your copy_right!</div>
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