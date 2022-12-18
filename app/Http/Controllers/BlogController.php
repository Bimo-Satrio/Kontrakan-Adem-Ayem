<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }


    public function index(Request $request)
    {

        if ($request->has('search')) {
            $blog = Blog::where('judul', 'LIKE', '%' . $request->search . '%')->paginate(3);
        } else {
            $blog = Blog::paginate(3);
        }

        return view('blog.index', compact(['blog']));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $blog = Blog::create($request->except(['_token', 'submit']));
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->move('foto/', $request->file('thumbnail')->getClientOriginalName());
            $blog->thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $blog->save();
        }

        return redirect('/blog');
    }


    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blog.edit', compact(['blog']));
    }


    public function update($id, Request $request)
    {
        $blog = Blog::find($id);
        $blog->update($request->except(['_token', 'submit']));
        return  redirect('/blog');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return  redirect('/blog');
    }


    public function detail($id)
    {
        $blog = Blog::find($id);
        return view('blog.detail', compact(['blog']));
    }
}
