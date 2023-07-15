<?php

namespace App\Http\Controllers;

use App\Models\PortofolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;


class PortofolioCategoryController extends Controller
{
    public function index()
    {
        $portofolio_category['portofolio_category'] = PortofolioCategory::latest()->get();
        return view('administrator.portofolio-category.index', $portofolio_category);
    }


    public function create()
    {
        return view('administrator.portofolio-category.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:255',
                'desc' => 'required',
            ]);

            $portofolio_category = PortofolioCategory::create([
                'id' => Str::uuid(),
                'name' => $request->name,
                'desc' => $request->desc,
            ]);


            if ($portofolio_category) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/portofolio-category');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create portofolio-category. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/portofolio-category');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $portofolio_category = PortofolioCategory::find($id);
        $data['data'] = $portofolio_category;

        return view('administrator.portofolio-category.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'name' => 'required|max:255',
                'desc' => 'required|max:255',
            ]);

            $portofolio_category = PortofolioCategory::find($id);

            $portofolio_category->update([
                'name' => $request->name,
                'desc' => $request->desc,
            ]);
            if ($portofolio_category) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/portofolio-category');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit portofolio-category. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit portofolio-category. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $portofolio_category = PortofolioCategory::find($id);

            if ($portofolio_category->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/portofolio-category');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted portofolio-category. Please try again. Error:' . $e->getMessage());
        }
    }
}
