<?php

namespace App\Http\Controllers;

use App\Models\SlidderService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class SlidderServiceController extends Controller
{
    public function index()
    {
        $slider_service['slider_service'] = SlidderService::latest()->get();
        return view('administrator.slider-service.index', $slider_service);
    }


    public function create()
    {
        return view('administrator.slider-service.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'desc' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $image->storeAs('public/slider-service', $image->hashName());

            $slider_service = SlidderService::create([
                'id' => Str::uuid(),
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $image->hashName(),
            ]);


            if ($slider_service) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/slider-service');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create slider-service. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/slider-service');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $slider_service = SlidderService::find($id);
        $data['data'] = $slider_service;

        return view('administrator.slider-service.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'title' => 'required|max:255',
                'desc' => 'required|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $slider_service = SlidderService::find($id);

            if ($request->hasFile('image')) {

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/slider-service', $image->hashName());

                Storage::delete('public/slider/' . $slider_service->image);

                $slider_service->update([
                    'title' => $request->title,
                    'desc' => $request->desc,
                    'image' => $image->hashName(),
                ]);
            } else {
                $slider_service->update([
                    'title' => $request->title,
                    'desc' => $request->desc,
                ]);
            }
            if ($slider_service) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/slider-service');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit slider service. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit slider service. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $slider_service = SlidderService::find($id);
            Storage::delete('public/slider-service/' . $slider_service->image);

            if ($slider_service->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/slider-service');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted slider service. Please try again. Error:' . $e->getMessage());
        }
    }
}
