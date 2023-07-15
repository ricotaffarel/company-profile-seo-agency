<?php

namespace App\Http\Controllers;

use App\Models\MyTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class MyTeamController extends Controller
{
    public function index()
    {
        $myteam['myteam'] = MyTeam::latest()->get();
        return view('administrator.myteam.index', $myteam);
    }


    public function create()
    {
        return view('administrator.myteam.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:255',
                'position' => 'required|max:255',
                'facebook' => 'required|max:255',
                'instagram' => 'required|max:255',
                'twitter' => 'required|max:255',
                'linkedin' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $image->storeAs('public/myteam', $image->hashName());

            $myteam = MyTeam::create([
                'id' => Str::uuid(),
                'name' => $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'image' => $image->hashName(),
            ]);


            if ($myteam) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/myteam');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create myteam. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/myteam');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $myteam = MyTeam::find($id);
        $data['data'] = $myteam;

        return view('administrator.myteam.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'name' => 'required|max:255',
                'position' => 'required|max:255',
                'facebook' => 'required|max:255',
                'instagram' => 'required|max:255',
                'twitter' => 'required|max:255',
                'linkedin' => 'required|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $myteam = MyTeam::find($id);

            if ($request->hasFile('image')) {

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/myteam', $image->hashName());

                Storage::delete('public/myteam/' . $myteam->image);

                $myteam->update([
                    'name' => $request->name,
                    'position' => $request->position,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'twitter' => $request->twitter,
                    'linkedin' => $request->linkedin,
                    'image' => $image->hashName(),
                ]);
            } else {
                $myteam->update([
                    'name' => $request->name,
                    'position' => $request->position,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'twitter' => $request->twitter,
                    'linkedin' => $request->linkedin,
                ]);
            }
            if ($myteam) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/myteam');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit myteam. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit myteam. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $myteam = MyTeam::find($id);
            Storage::delete('public/myteam/' . $myteam->image);

            if ($myteam->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/myteam');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted myteam. Please try again. Error:' . $e->getMessage());
        }
    }
}
