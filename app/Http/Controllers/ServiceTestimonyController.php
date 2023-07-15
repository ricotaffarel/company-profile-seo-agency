<?php

namespace App\Http\Controllers;

use App\Models\ServiceTestimony;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;


class ServiceTestimonyController extends Controller
{
    public function index()
    {
        $service_testimony['service_testimony'] = ServiceTestimony::latest()->get();
        return view('administrator.service-testimony.index', $service_testimony);
    }


    public function create()
    {
        $service['service'] = Service::latest()->get();
        return view('administrator.service-testimony.create', $service);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:255',
                'desc' => 'required',
                'job' => 'required',
                'services_id' => 'required',
            ]);

            $service_testimony = ServiceTestimony::create([
                'id' => Str::uuid(),
                'name' => $request->name,
                'desc' => $request->desc,
                'job' => $request->job,
                'services_id' => $request->services_id,
            ]);


            if ($service_testimony) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/service-testimony');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create blog. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/service-testimony');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $service_testimony = ServiceTestimony::find($id);
        $service = Service::latest()->get();
        $data = [
            'data' => $service_testimony,
            'service' => $service
        ];

        return view('administrator.service-testimony.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'name' => 'required|max:255',
                'desc' => 'required',
                'job' => 'required',
                'services_id' => 'required',
            ]);

            $service_testimony = ServiceTestimony::find($id);

            $service_testimony->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'job' => $request->job,
                'services_id' => $request->services_id,
            ]);

            if ($service_testimony) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/service-testimony');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit service category. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit service category. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $service_testimony = ServiceTestimony::find($id);

            if ($service_testimony->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/service-testimony');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted service testimony. Please try again. Error:' . $e->getMessage());
        }
    }
}
