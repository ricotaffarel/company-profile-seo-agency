<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class AboutController extends Controller
{
    public function index()
    {
        $about['about'] = About::latest()->get();
        return view('administrator.about.index', $about);
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $about = About::find($id);
        $data['data'] = $about;

        return view('administrator.about.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'title' => 'required',
                'desc' => 'required',
                'about_1' => 'required',
                'about_2' => 'required',
                'about_3' => 'required',
                'about_4' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', //logo
            ]);

            $about = About::find($id);

            if ($request->hasFile('image')) {

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/about', $image->hashName());

                Storage::delete('public/about/' . $about->image);

                $about->update([
                    'title' => $request->title,
                    'desc' => $request->desc,
                    'about_1' => $request->about_1,
                    'about_2' => $request->about_2,
                    'about_3' => $request->about_3,
                    'about_4' => $request->about_4,
                    'image' => $request->image->hashName(),
                ]);
            } else {
                $about->update([
                    'title' => $request->title,
                    'desc' => $request->desc,
                    'about_1' => $request->about_1,
                    'about_2' => $request->about_2,
                    'about_3' => $request->about_3,
                    'about_4' => $request->about_4,
                ]);
            }

            if ($about) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/about');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit about. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit about. Please try again. Error:' . $e);
        }
    }
}
