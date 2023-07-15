<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;


class ServiceCategoryController extends Controller
{
    public function index()
    {
        $service_category['service_category'] = ServiceCategory::latest()->get();
        return view('administrator.service-category.index', $service_category);
    }


    public function create()
    {
        return view('administrator.service-category.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:255',
                'desc' => 'required',
            ]);

            $service_category = ServiceCategory::create([
                'id' => Str::uuid(),
                'name' => $request->name,
                'desc' => $request->desc,
            ]);


            if ($service_category) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/service-category');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create blog. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/service-category');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $service_category = ServiceCategory::find($id);
        $data['data'] = $service_category;

        return view('administrator.service-category.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'name' => 'required|max:255',
                'desc' => 'required',
            ]);

            $service_category = ServiceCategory::find($id);

            $service_category->update([
                'name' => $request->name,
                'desc' => $request->desc,
            ]);

            if ($service_category) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/service-category');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit service category. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit service category. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $service_category = ServiceCategory::find($id);
          
            if ($service_category->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/service-category');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted service category. Please try again. Error:' . $e->getMessage());
        }
    }
}
