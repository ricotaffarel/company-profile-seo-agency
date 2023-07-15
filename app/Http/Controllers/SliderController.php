<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class SliderController extends Controller
{
    public function index()
    {
        $slider['slider'] = Slider::latest()->get();
        return view('administrator.slider.index', $slider);
    }


    public function create()
    {
        return view('administrator.slider.create');
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
            $image->storeAs('public/slider', $image->hashName());

            $slider = Slider::create([
                'id' => Str::uuid(),
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $image->hashName(),
            ]);


            if ($slider) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/slider');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create slider. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/slider');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $slider = Slider::find($id);
        $data['data'] = $slider;

        return view('administrator.slider.edit', $data);
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

            $slider = Slider::find($id);

            if ($request->hasFile('image')) {

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/slider', $image->hashName());

                Storage::delete('public/slider/' . $slider->image);

                $slider->update([
                    'title' => $request->title,
                    'desc' => $request->desc,
                    'image' => $image->hashName(),
                ]);
            } else {
                $slider->update([
                    'title' => $request->title,
                    'desc' => $request->desc,
                ]);
            }
            if ($slider) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/slider');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit slider. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit slider. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $slider = Slider::find($id);
            Storage::delete('public/slider/' . $slider->image);

            if ($slider->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/slider');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted slider. Please try again. Error:' . $e->getMessage());
        }
    }
}
