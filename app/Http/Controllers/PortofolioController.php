<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\PortofolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class PortofolioController extends Controller
{
    public function index()
    {
        $portofolio['portofolio'] = Portofolio::latest()->get();
        return view('administrator.portofolio.index', $portofolio);
    }


    public function create()
    {
        $portofolio_category['portofolio_category'] = PortofolioCategory::latest()->get();
        return view('administrator.portofolio.create', $portofolio_category);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:255',
                'desc' => 'required',
                'portofolio_categories_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $image->storeAs('public/portofolio', $image->hashName());

            $portofolio = Portofolio::create([
                'id' => Str::uuid(),
                'name' => $request->name,
                'desc' => $request->desc,
                'portofolio_categories_id' => $request->portofolio_categories_id,
                'image' => $image->hashName(),
            ]);


            if ($portofolio) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/portofolio');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create portofolio. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/portofolio');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $portofolio = Portofolio::find($id);
        $portofolio_category = PortofolioCategory::latest()->get();
        $data = [
            'data' => $portofolio,
            'portofolio_category' => $portofolio_category,
        ];

        return view('administrator.portofolio.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'name' => 'required|max:255',
                'desc' => 'required',
                'portofolio_categories_id' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $portofolio = Portofolio::find($id);

            if ($request->hasFile('image')) {

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/portofolio', $image->hashName());

                Storage::delete('public/portofolio/' . $portofolio->image);

                $portofolio->update([
                    'name' => $request->name,
                    'desc' => $request->desc,
                    'image' => $image->hashName(),
                    'portofolio_categories_id' => $request->portofolio_categories_id,
                ]);
            } else {
                $portofolio->update([
                    'name' => $request->name,
                    'desc' => $request->desc,
                    'author' => $request->author,
                    'portofolio_categories_id' => $request->portofolio_categories_id,
                ]);
            }
            if ($portofolio) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/portofolio');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit portofolio. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit portofolio. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $portofolio = Portofolio::find($id);
            Storage::delete('public/portofolio/' . $portofolio->image);

            if ($portofolio->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/portofolio');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted portofolio. Please try again. Error:' . $e->getMessage());
        }
    }
}
