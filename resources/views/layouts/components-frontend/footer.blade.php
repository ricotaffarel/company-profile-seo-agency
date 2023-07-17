<!-- Footer Start -->

@php
use App\Models\Profile;
use App\Models\Menu;
use App\Models\ProjectGallery;
$profile = Profile::all();
$menu = Menu::latest()->get();
$project_gallery = ProjectGallery::latest()->get();
@endphp

<div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-3">
                <h5 class="text-white mb-4">{{$profile[0]->title_footer_1}}</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>{{$profile[0]->address}}</p>
                <p><i class="fa fa-phone-alt me-3"></i>{{$profile[0]->phone}}</p>
                <p><i class="fa fa-envelope me-3"></i>{{$profile[0]->email}}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="{{$profile[0]->twitter}}"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{$profile[0]->facebook}}"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{$profile[0]->youtube}}"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{$profile[0]->instagram}}"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{$profile[0]->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="text-white mb-4">{{$profile[0]->title_footer_2}}</h5>
                <a class="btn btn-link" href="/about">{{$menu[1]->name}}</a>
                <a class="btn btn-link" href="/contact">{{$menu[6]->name}}</a>
                <a class="btn btn-link" href="/service">{{$menu[2]->name}}</a>
                <a class="btn btn-link" href="/portofolio">{{$menu[3]->name}}</a>
                <a class="btn btn-link" href="/testimony">{{$menu[5]->name}}</a>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="text-white mb-4">{{$profile[0]->title_footer_3}}</h5>
                <div class="row g-2">
                    @forelse($project_gallery as $project_gallery)
                    <div class="col-4">
                        <img class="img-fluid" src="{{$project_gallery->image}}" alt="Image">
                    </div>
                    @empty
                    <p class="text-white">no data</p>
                    @endforelse
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="text-white mb-4">{{$profile[0]->title_footer_4}}</h5>
                <p>{{$profile[0]->desc_title_footer_4}}</p>
            </div>
        </div>
    </div>
    <div class="container px-lg-5">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; {{$profile[0]->copy_right}}
                </div>
            </div>
        </div>
    </div>
</div>