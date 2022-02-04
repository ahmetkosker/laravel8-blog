<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Blog $blogs)
    {
        $blogs = Blog::all();
        return view('admin.blogs', ['data' => $blogs]);
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
            'slug' => 'required',
        ]);

        $category_id = $request->input('category_id');
        $title = $request->input('title');
        $keywords = $request->input('keywords');
        $description = $request->input('description');
        $slug = $request->input('slug');
        $category = Category::find($category_id);
        $status = $request->input('status');
        if ($request->file('image')) {
            $image = Storage::putfile('images', $request->file('image'));
        } else {
            $image = '';
        }
        if ($request->file('blogfile')) {
            $blogfile = Storage::putfile('files', $request->file('blogfile'));
        } else {
            $blogfile = '';
        }
        DB::table('blogs')->insert([
            'category_id' => $category_id,
            'title' => $title,
            'user_id' => Auth::user()->id,
            'keywords' => $keywords,
            'description' => $description,
            'slug' => $slug,
            'status' => $status,
            'image' => $image,
            'file' => $blogfile,
        ]);
        return redirect()->route('showing blogs')->with('success', 'Blog Created');
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
    public function show(Request $request, Blog $blogs)
    {
        $user = $request->session()->get('user_id');
        $categories = DB::select('select * from categories where status="true"');
        return view('admin.adding_blog', ['user' => $user, 'data' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blog $blogs, $id)
    {
        $user = $request->session()->get('user_id');
        $category = DB::select('select * from categories');
        $blog = Blog::find($id);
        return view('admin.editing_blog', ['user' => $user, 'blog' => $blog, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blogs, $id)
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
        if ($request->file('blogfile')) {
            $blogfile = Storage::putfile('files', $request->file('blogfile'));
        } else {
            $blogfile = '';
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
                'image' => $image,
                'file' => $blogfile,
            ]);
        return redirect()->route('showing blogs')->with('success', 'Blog Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blogs, $id)
    {
        DB::table('blogs')->where('id', $id)->delete();
        return redirect()->route('showing blogs')->with('success', 'Blog Deleted');
    }

    public function saving_Comment(Request $request, $user_id, $id)
    {
        $comment = request()->input('comment');
        $rate = request()->input('rate');
        -DB::table('comments')->insert([
            'comment' => $comment,
            'rate' => $rate,
            'blog_id' => $id,
            'user_id' => $user_id,
            'ip' => $request->ip(),
        ]);

        return redirect('/');
    }

    public static function single_blog(Request $request, $id, $slug)
    {
        $blog = Blog::where('slug', '=', $slug)->first();
        $category =  Category::find($id);
        $images = DB::select('select * from images where blog_id = ?', [$blog->id]);
        return view('home.single_blog', ['blog' => $blog, 'category' => $category, 'images' => $images]);
    }
}
