<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function index()
    {
        $profile['profile'] = Profile::latest()->get();
        return view('administrator.profile.index', $profile);
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $profile = Profile::find($id);
        $data['data'] = $profile;

        return view('administrator.profile.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'title_footer_1' => 'required',
                'title_footer_2' => 'required',
                'title_footer_3' => 'required',
                'title_footer_4' => 'required',
                'desc_title_footer_4' => 'required',
                'address' => 'required',
                'city' => 'required',
                'country' => 'required',
                'postal_code' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'vision' => 'required',
                'mission' => 'required',
                'facebook' => 'required',
                'instagram' => 'required',
                'linkedin' => 'required',
                'twitter' => 'required',
                'link_map' => 'required',
                'copy_right' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', //logo
            ]);

            $profile = Profile::find($id);

            if ($request->hasFile('image')) {

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/profile', $image->hashName());

                Storage::delete('public/profile/' . $profile->image);

                $profile->update([
                    'title_footer_1' => $request->title_footer_1,
                    'title_footer_2' => $request->title_footer_2,
                    'title_footer_3' => $request->title_footer_3,
                    'title_footer_4' => $request->title_footer_4,
                    'desc_title_footer_4' => $request->desc_title_footer_4,
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $request->country,
                    'postal_code' => $request->postal_code,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'vision' => $request->vision,
                    'mission' => $request->mission,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'linkedin' => $request->linkedin,
                    'twitter' => $request->twitter,
                    'link_map' => $request->link_map,
                    'copy_right' => $request->copy_right,
                    'image' => $request->image->hashName(),
                ]);
            } else {
                $profile->update([
                    'title_footer_1' => $request->title_footer_1,
                    'title_footer_2' => $request->title_footer_2,
                    'title_footer_3' => $request->title_footer_3,
                    'title_footer_4' => $request->title_footer_4,
                    'desc_title_footer_4' => $request->desc_title_footer_4,
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $request->country,
                    'postal_code' => $request->postal_code,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'vision' => $request->vision,
                    'mission' => $request->mission,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'linkedin' => $request->linkedin,
                    'twitter' => $request->twitter,
                    'link_map' => $request->link_map,
                    'copy_right' => $request->copy_right,
                ]);
            }

            if ($profile) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/profile');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit profile. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit profile. Please try again. Error:' . $e);
        }
    }
}
