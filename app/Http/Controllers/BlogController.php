<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, blogs $blogs)
    {
        $user = $request->session()->get('user_id');
        $blogs = DB::select('select * from blogs');
        return view('profile.blogs', ['user' => $user, 'data' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validation = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $category_id = $request->input('category_id');
        $title = $request->input('title');
        $keywords = $request->input('keywords');
        $description = $request->input('description');
        $slug = $request->input('slug');
        $status = $request->input('status');
        DB::table('blogs')->insert([
            'category_id' => $category_id,
            'title' => $title,
            'keywords' => $keywords,
            'description' => $description,
            'slug' => $slug,
            'status' => $status,
            'image' => Storage::putfile('images', $request->file('image'))
        ]);
        return redirect('/admin/blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, blogs $blogs)
    {
        $user = $request->session()->get('user_id');
        $categories = DB::select('select * from categories');
        return view('profile.adding_blog', ['user' => $user, 'data' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, blogs $blogs, $id)
    {
        $user = $request->session()->get('user_id');
        $category = DB::select('select * from categories');
        $blog = DB::select('select * from blogs where id = ?', [$id]);
        return view('profile.editing_blog', ['user' => $user, 'blog' => $blog, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blogs $blogs, $id)
    {
        $category_id = $request->input('category_id');
        $title = $request->input('title');
        $keywords = $request->input('keywords');
        $description = $request->input('description');
        $slug = $request->input('slug');
        $status = $request->input('status');
        if ($request->file('image')) {
            $image = Storage::putfile('images', $request->file('image'));
        } else {
            $image = '';
        }
        $update = DB::table('blogs')
            ->where('id', $id)
            ->update([
                'category_id' => $category_id,
                'title' => $title,
                'keywords' => $keywords,
                'description' => $description,
                'slug' => $slug,
                'status' => $status,
                'image' => $image
            ]);
        return redirect('/admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(blogs $blogs, $id)
    {
        DB::table('blogs')->where('id', $id)->delete();
        return redirect('/admin/blog');
    }
}
