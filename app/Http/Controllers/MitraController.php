<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class MitraController extends Controller
{
    public function index()
    {
        $mitra['mitra'] = Mitra::latest()->get();
        return view('administrator.mitra.index', $mitra);
    }


    public function create()
    {
        return view('administrator.mitra.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $image->storeAs('public/mitra', $image->hashName());

            $mitra = Mitra::create([
                'id' => Str::uuid(),
                'image' => $image->hashName(),
                'name' => $request->name,
            ]);


            if ($mitra) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/mitra');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create mitra. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/mitra');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $mitra = Mitra::find($id);
        $data['data'] = $mitra;

        return view('administrator.mitra.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'name' => 'required|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $mitra = Mitra::find($id);

            if ($request->hasFile('image')) {

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/mitra', $image->hashName());

                Storage::delete('public/mitra/' . $mitra->image);

                $mitra->update([
                    'image' => $image->hashName(),
                    'name' => $request->name,
                ]);
            } else {
                $mitra->update([
                    'name' => $request->name,
                ]);
            }
            if ($mitra) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/mitra');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit mitra. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit mitra. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $slider = Mitra::find($id);
            Storage::delete('public/mitra/' . $slider->image);

            if ($slider->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/mitra');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted mitra. Please try again. Error:' . $e->getMessage());
        }
    }
}
