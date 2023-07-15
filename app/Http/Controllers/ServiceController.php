<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class ServiceController extends Controller
{
    public function index()
    {
        $service['service'] = Service::latest()->get();
        return view('administrator.service.index', $service);
    }


    public function create()
    {
        $service_category['service_category'] = ServiceCategory::latest()->get();
        return view('administrator.service.create', $service_category);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:255',
                'image' => 'required|max:255',
                'service_categories_id' => 'required',
                'desc' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $image->storeAs('public/layanan', $image->hashName());


            $service_category = Service::create([
                'id' => Str::uuid(),
                'name' => $request->name,
                'service_categories_id' => $request->service_categories_id,
                'desc' => $request->desc,
                'image' => $image->hashName(),
            ]);


            if ($service_category) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/service');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create service. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/service');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $service = Service::find($id);
        $service_category = ServiceCategory::latest()->get();
        $data = [
            'data' => $service,
            'service_category' => $service_category,
        ];

        return view('administrator.service.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'name' => 'required|max:255',
                'image' => 'required|max:255',
                'service_categories_id' => 'required',
                'desc' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $service = Service::find($id);

            if ($request->hasFile('image')) {

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/layanan', $image->hashName());

                Storage::delete('public/layanan/' . $service->image);

                $service->update([
                    'name' => $request->name,
                    'service_categories_id' => $request->service_categories_id,
                    'desc' => $request->desc,
                    'image' => $image->hashName(),
                ]);
            } else {
                $service->update([
                    'name' => $request->name,
                    'service_categories_id' => $request->service_categories_id,
                    'desc' => $request->desc,
                ]);
            }
            if ($service) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/service');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit service. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit service. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $service = Service::find($id);
            Storage::delete('public/layanan/' . $service->image);

            if ($service->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/service');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted service. Please try again. Error:' . $e->getMessage());
        }
    }
}
