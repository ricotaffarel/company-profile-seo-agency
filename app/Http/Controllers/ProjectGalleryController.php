<?php

namespace App\Http\Controllers;

use App\Models\ProjectGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class ProjectGalleryController extends Controller
{
    public function index()
    {
        $project_gallery['project_gallery'] = ProjectGallery::latest()->get();
        return view('administrator.project-gallery.index', $project_gallery);
    }


    public function create()
    {
        return view('administrator.project-gallery.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $image->storeAs('public/project-gallery', $image->hashName());

            $project_gallery = ProjectGallery::create([
                'id' => Str::uuid(),
                'title' => $request->title,
                'image' => $image->hashName(),
            ]);


            if ($project_gallery) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/project-gallery');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create project-gallery. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/project-gallery');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $project_gallery = ProjectGallery::find($id);
        $data['data'] = $project_gallery;

        return view('administrator.project-gallery.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'title' => 'required|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $project_gallery = ProjectGallery::find($id);

            if ($request->hasFile('image')) {

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/project-gallery', $image->hashName());

                Storage::delete('public/project-gallery/' . $project_gallery->image);

                $project_gallery->update([
                    'title' => $request->title,
                    'image' => $image->hashName(),
                ]);
            } else {
                $project_gallery->update([
                    'title' => $request->title,
                ]);
            }
            if ($project_gallery) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/project-gallery');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit project-gallery. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit project-gallery. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $project_gallery = ProjectGallery::find($id);
            Storage::delete('public/project-gallery/' . $project_gallery->image);

            if ($project_gallery->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/project-gallery');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted project-gallery. Please try again. Error:' . $e->getMessage());
        }
    }
}
