<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Mitra;
use App\Models\MyTeam;
use App\Models\Portofolio;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceTestimony;
use App\Models\Slider;
use App\Models\Visitor;
use Illuminate\Support\Str;
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
        $mitra = Mitra::latest()->get();
        $blog = Blog::latest()->get();

        $data = [
            'slidder' => $slidder,
            'about' => $about,
            'service_category' => $service_category,
            'portofolio' => $portofolio,
            'testimony' => $testimony,
            'team' => $team,
            'mitra' => $mitra,
            'blog' => $blog,
        ];

        $ipUsers = $_SERVER['REMOTE_ADDR'];
        $url = url('/');
        $visitor = Visitor::where('created_at', date('Y-m-d H:i:s'))
            ->where('ip', $ipUsers)
            ->where('url', $url)
            ->get();

        if (count($visitor) == 0) {
            Visitor::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'url' => url('/'),
                'created_at' => date('Y-m-d H:i:s'),
                'date' => 'date'
            ]);
        }

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

        $ipUsers = $_SERVER['REMOTE_ADDR'];
        $url = url('/');
        $visitor = Visitor::where('created_at', date('Y-m-d H:i:s'))
            ->where('ip', $ipUsers)
            ->where('url', $url)
            ->get();

        if (count($visitor) == 0) {
            Visitor::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'url' => url('/'),
                'created_at' => date('Y-m-d H:i:s'),
                'date' => 'date'
            ]);
        }

        return view('guest.about', $data);
    }

    public function serviceCategory()
    {
        $service_category = ServiceCategory::latest()->get();

        $data = [
            'service_category' => $service_category,
        ];

        $ipUsers = $_SERVER['REMOTE_ADDR'];
        $url = url('/');
        $visitor = Visitor::where('created_at', date('Y-m-d H:i:s'))
            ->where('ip', $ipUsers)
            ->where('url', $url)
            ->get();

        if (count($visitor) == 0) {
            Visitor::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'url' => url('/'),
                'created_at' => date('Y-m-d H:i:s'),
                'date' => 'date'
            ]);
        }

        return view('guest.service-category', $data);
    }

    public function service($category)
    {
        $service = Service::latest()->get();
        $service->where('service_categories_id', $category);

        $data = [
            'service' => $service,
        ];

        $ipUsers = $_SERVER['REMOTE_ADDR'];
        $url = url('/');
        $visitor = Visitor::where('created_at', date('Y-m-d H:i:s'))
            ->where('ip', $ipUsers)
            ->where('url', $url)
            ->get();

        if (count($visitor) == 0) {
            Visitor::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'url' => url('/'),
                'created_at' => date('Y-m-d H:i:s'),
                'date' => 'date'
            ]);
        }

        return view('guest.service', $data);
    }

    public function blog($blog)
    {
        $blog = Blog::latest()->get();
        $blog->where('id', $blog);

        $data = [
            'blog' => $blog,
        ];

        $ipUsers = $_SERVER['REMOTE_ADDR'];
        $url = url('/');
        $visitor = Visitor::where('created_at', date('Y-m-d H:i:s'))
            ->where('ip', $ipUsers)
            ->where('url', $url)
            ->get();

        if (count($visitor) == 0) {
            Visitor::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'url' => url('/'),
                'created_at' => date('Y-m-d H:i:s'),
                'date' => 'date'
            ]);
        }

        return view('guest.blog', $data);
    }

    public function portofolio()
    {
        $portofolio = Portofolio::latest()->get();

        $data = [
            'portofolio' => $portofolio,
        ];

        $ipUsers = $_SERVER['REMOTE_ADDR'];
        $url = url('/');
        $visitor = Visitor::where('created_at', date('Y-m-d H:i:s'))
            ->where('ip', $ipUsers)
            ->where('url', $url)
            ->get();

        if (count($visitor) == 0) {
            Visitor::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'url' => url('/'),
                'created_at' => date('Y-m-d H:i:s'),
                'date' => 'date'
            ]);
        }

        return view('guest.portofolio', $data);
    }

    public function team()
    {
        $team = MyTeam::latest()->get();

        $data = [
            'team' => $team,
        ];

        $ipUsers = $_SERVER['REMOTE_ADDR'];
        $url = url('/');
        $visitor = Visitor::where('created_at', date('Y-m-d H:i:s'))
            ->where('ip', $ipUsers)
            ->where('url', $url)
            ->get();

        if (count($visitor) == 0) {
            Visitor::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'url' => url('/'),
                'created_at' => date('Y-m-d H:i:s'),
                'date' => 'date'
            ]);
        }

        return view('guest.team', $data);
    }

    public function testimony()
    {
        $testimony = ServiceTestimony::latest()->get();

        $data = [
            'testimony' => $testimony,
        ];

        $ipUsers = $_SERVER['REMOTE_ADDR'];
        $url = url('/');
        $visitor = Visitor::where('created_at', date('Y-m-d H:i:s'))
            ->where('ip', $ipUsers)
            ->where('url', $url)
            ->get();

        if (count($visitor) == 0) {
            Visitor::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'url' => url('/'),
                'created_at' => date('Y-m-d H:i:s'),
                'date' => 'date'
            ]);
        }

        return view('guest.testimony', $data);
    }

    public function contact()
    {

        $ipUsers = $_SERVER['REMOTE_ADDR'];
        $url = url('/');
        $visitor = Visitor::where('created_at', date('Y-m-d H:i:s'))
            ->where('ip', $ipUsers)
            ->where('url', $url)
            ->get();

        if (count($visitor) == 0) {
            Visitor::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'url' => url('/'),
                'created_at' => date('Y-m-d H:i:s'),
                'date' => 'date'
            ]);
        }

        return view('guest.contact',);
    }
}
