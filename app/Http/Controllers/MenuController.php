<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Menu;
use App\Models\Mitra;
use App\Models\MyTeam;
use App\Models\Portofolio;
use App\Models\ProjectGallery;
use App\Models\Service;
use App\Models\ServiceTestimony;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;


class MenuController extends Controller
{
    public function index()
    {
        $menu['menu'] = Menu::latest()->get();
        return view('administrator.menu.index', $menu);
    }

    public function dashboard()
    {
        $blog = Blog::count();
        $mitra = Mitra::count();
        $service = Service::count();
        $myteam = MyTeam::count();
        $portofolio = Portofolio::count();
        $service_testimony = ServiceTestimony::count();

        //today
        $today = Carbon::now()->format('Y-m-d');
        $today_count = Visitor::whereDate('created_at', $today)->count();

        //this month
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
        $month_count = Visitor::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        
        //this year
        $startOfYear = Carbon::now()->startOfYear()->format('Y-m-d');
        $endOfYear = Carbon::now()->endOfYear()->format('Y-m-d');
        $year_count = Visitor::whereBetween('created_at', [$startOfYear, $endOfYear])->count();

        $data = [
            'blog' => $blog,
            'mitra' => $mitra,
            'service' => $service,
            'myteam' => $myteam,
            'portofolio' => $portofolio,
            'service_testimony' => $service_testimony,
            'today_count' => $today_count,
            'month_count' => $month_count,
            'year_count' => $year_count,
        ];

        return view('administrator.dashboard.index', $data);
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $menu = Menu::find($id);
        $data['data'] = $menu;

        return view('administrator.menu.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'name' => 'required',
                'title' => 'required',
            ]);

            $menu = Menu::find($id);

            $menu->update([
                'name' => $request->name,
                'title' => $request->title,
            ]);

            if ($menu) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/menu');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit menu. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit menu. Please try again. Error:' . $e);
        }
    }
}
