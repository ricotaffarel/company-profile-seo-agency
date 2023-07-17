<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\MyTeam;
use App\Models\Portofolio;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceTestimony;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class GuestController extends Controller
{
    public function index()
    {
        $slidder = Slider::latest()->get();
        $about = About::latest()->get();
        $service_category = ServiceCategory::latest()->get();
        $portofolio = Portofolio::latest()->get();
        $testimony = ServiceTestimony::latest()->get();
        $team = MyTeam::latest()->get();

        $data = [
            'slidder' => $slidder,
            'about' => $about,
            'service_category' => $service_category,
            'portofolio' => $portofolio,
            'testimony' => $testimony,
            'team' => $team,
        ];
        return view('guest.home', $data);
    }

    public function about()
    {
        $about = About::latest()->get();
        $team = MyTeam::latest()->get();

        $data = [
            'about' => $about,
            'team' => $team,
        ];
        return view('guest.about', $data);
    }

    public function serviceCategory()
    {
        $service_category = ServiceCategory::latest()->get();

        $data = [
            'service_category' => $service_category,
        ];
        return view('guest.service-category', $data);
    }

    public function service($category)
    {
        $service = Service::latest()->get();
        $service->where('service_categories_id', $category);

        $data = [
            'service' => $service,
        ];
        return view('guest.service', $data);
    }

    public function portofolio()
    {
        $portofolio = Portofolio::latest()->get();

        $data = [
            'portofolio' => $portofolio,
        ];
        return view('guest.portofolio', $data);
    }

    public function team()
    {
        $team = MyTeam::latest()->get();

        $data = [
            'team' => $team,
        ];
        return view('guest.team', $data);
    }

    public function testimony()
    {
        $testimony = ServiceTestimony::latest()->get();

        $data = [
            'testimony' => $testimony,
        ];
        return view('guest.testimony', $data);
    }

    public function contact()
    {
        return view('guest.contact',);
    }
}
