<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class BlogController extends Controller
{
    public function index()
    {
        $blog['blog'] = Blog::latest()->get();
        return view('administrator.blog.index', $blog);
    }


    public function create()
    {
        $blog_category['blog_category'] = BlogCategory::latest()->get();
        return view('administrator.blog.create', $blog_category);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'desc' => 'required',
                'blog_categories_id' => 'required',
                'author' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $image->storeAs('public/blog', $image->hashName());

            $blog = Blog::create([
                'id' => Str::uuid(),
                'title' => $request->title,
                'desc' => $request->desc,
                'blog_categories_id' => $request->blog_categories_id,
                'image' => $image->hashName(),
                'author' => $request->author,
            ]);


            if ($blog) {
                Alert::success('Success', 'Data Created Successfully');
            }

            return redirect('administrator/blog');
        } catch (\Exception $e) {
            Alert::error('Error', "Failed to create blog. Please try again. Error:" . $e->getMessage());
            return redirect('administrator/blog');
        }
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $blog = Blog::find($id);
        $blog_category = BlogCategory::latest()->get();
        $data = [
            'data' => $blog,
            'blog_category' => $blog_category,
        ];

        return view('administrator.blog.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $this->validate($request, [
                'title' => 'required|max:255',
                'desc' => 'required',
                'blog_categories_id' => 'required',
                'author' => 'required|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $blog = Blog::find($id);

            if ($request->hasFile('image')) {

                //upload image
                $image = $request->file('image');
                $image->storeAs('public/blog', $image->hashName());

                Storage::delete('public/blog/' . $blog->image);

                $blog->update([
                    'title' => $request->title,
                    'desc' => $request->desc,
                    'image' => $image->hashName(),
                    'author' => $request->author,
                    'blog_categories_id' => $request->blog_categories_id,
                ]);
            } else {
                $blog->update([
                    'title' => $request->title,
                    'desc' => $request->desc,
                    'author' => $request->author,
                    'blog_categories_id' => $request->blog_categories_id,
                ]);
            }
            if ($blog) {
                Alert::success('Success', 'Data Saved Successfully');
            }

            return redirect('administrator/blog');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to edit blog. Please try again. Error:' . $e->getMessage());

            return back()->with('error', 'Failed to edit blog. Please try again. Error:' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $slider = Blog::find($id);
            Storage::delete('public/blog/' . $slider->image);

            if ($slider->delete()) {
                Alert::success('Success', 'Data Deleted Successfully');
            }
            return redirect('administrator/blog');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to deleted blog. Please try again. Error:' . $e->getMessage());
        }
    }
}
