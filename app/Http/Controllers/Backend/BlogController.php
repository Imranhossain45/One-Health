<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeBlogs = Blog::where('status', 'published')->get();
        $draftBlogs = Blog::where('status', 'draft')->get();
        $trashBlogs = Blog::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.blog.index', compact('activeBlogs', 'draftBlogs', 'trashBlogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bPhoto = $request->file('bPhoto');
        $aPhoto = $request->file('aPhoto');
        $request->validate([
            'title' => 'required|unique:blogs,title',
            'auther' => 'required',
            'description' => 'required',
            'bPhoto' => 'required|mimes:png,jpg,jpeg|max:2000',
            'aPhoto' => 'required|mimes:png,jpg,jpeg|max:2000',
            'status' => 'published',
        ]);
        if ($bPhoto) {
            $bPhotoName = uniqid() . '.' . $bPhoto->getClientOriginalExtension();
            Image::make($bPhoto)->save(public_path('storage/blog/bPhoto/' . $bPhotoName));
        }
        if ($aPhoto) {
            $aPhotoName = uniqid() . '.' . $aPhoto->getClientOriginalExtension();
            Image::make($aPhoto)->save(public_path('storage/blog/aPhoto/' . $aPhotoName));
        }

        Blog::create([
            'title' => $request->title,
            'auther' => $request->auther,
            'description' => $request->description,
            'bPhoto' => $bPhotoName,
            'aPhoto' => $aPhotoName,
        ]);
        return back()->with('success', 'Blog Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $bPhoto = $request->file('bPhoto');
        $aPhoto = $request->file('aPhoto');
        $request->validate([
            'title' => 'required',
            'auther' => 'required',
            'description' => 'required',
            'bPhoto' => 'required|mimes:png,jpg,jpeg|max:2000',
            'aPhoto' => 'required|mimes:png,jpg,jpeg|max:2000',
            'status' => 'published',
        ]);
        if ($bPhoto) {
            $bPhotopath = public_path('storage/blog/bPhoto/' . $blog->bPhoto);
            if (file_exists($bPhotopath)) {
                unlink($bPhotopath);
            }

            $bPhotoName = uniqid() . '.' . $bPhoto->getClientOriginalExtension();
            Image::make($bPhoto)->save(public_path('storage/blog/bPhoto/' . $bPhotoName));
        }
        if ($aPhoto) {
            $aPhotopath = public_path('storage/blog/aPhoto/' . $blog->aPhoto);
            if (file_exists($aPhotopath)) {
                unlink($aPhotopath);
            }

            $aPhotoName = uniqid() . '.' . $aPhoto->getClientOriginalExtension();
            Image::make($aPhoto)->save(public_path('storage/blog/aPhoto/' . $aPhotoName));
        }


        $blog->title = $request->title;
        $blog->auther = $request->auther;
        $blog->description = $request->description;
        $blog->bPhoto = $bPhotoName;
        $blog->aPhoto = $aPhotoName;
        $blog->status = 'published';
        $blog->save();

        return redirect(route('backend.blog.index'))->with('success', 'Blog Info Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->status == 'draft';
        $blog->save();
        $blog->delete();
        return back()->with('success', 'Blog info Trashed');
    }
    public function status(Blog $blog)
    {
        if ($blog->status == 'published') {
            $blog->status = 'draft';
            $blog->save();
        } else {
            $blog->status = 'published';
            $blog->save();
        }
        return back()->with('success', $blog->status == 'published' ? 'Blog Published' : 'Blog Drafted');
    }
    public function reStore($id)
    {
        $blog = Blog::onlyTrashed()->find($id);
        $blog->restore();
        return back()->with('success', 'Blog Restored!');
    }
    public function delete($id){
        $blog = Blog::onlyTrashed()->find($id);
        $blog->forceDelete();
        return back()->with('success', 'Blog Deleted');
    }
}
