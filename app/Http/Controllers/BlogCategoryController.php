<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class BlogCategoryController extends Controller
{
    public function index()
    {
        $blog_category['blog_category'] = BlogCategory::latest()->get();
        return view('administrator.blog-category.index', $blog_category);
    }


    public function create()
    {
        return view('administrator.blog-category.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:255',
                'desc' => 'required',
            ]);

            $blog_category = BlogCategory::create([
                'id' => Str::uuid(),
                'name' => $request->name,
                'desc' => $request->desc,
            ]);


            if ($blog_category) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/blog-category');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create blog-category. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/blog-category');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $blog_category = BlogCategory::find($id);
        $data['data'] = $blog_category;

        return view('administrator.blog-category.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'name' => 'required|max:255',
                'desc' => 'required|max:255',
            ]);

            $blog_category = BlogCategory::find($id);

            $blog_category->update([
                'name' => $request->name,
                'desc' => $request->desc,
            ]);
            if ($blog_category) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/blog-category');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit blog-category. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit blog-category. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $blog_category = BlogCategory::find($id);

            if ($blog_category->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/blog-category');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted blog-category. Please try again. Error:' . $e->getMessage());
        }
    }
}
