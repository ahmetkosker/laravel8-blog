<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request, Blog $blogs, $user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user = DB::select('select * from users where id = ?', [$user_id]);
            $blogs = Blog::where('user_id', $user_id)->get();
            return view('user.showing_blog', ['user' => $user[0], 'data' => $blogs]);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Blog $blogs, $user_id)
    {
        if (Auth::user()->id == $user_id) {
            $validation = $request->validate([
                'category_id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'slug' => 'required',
                'image' => 'required',
            ]);

            $category_id = $request->input('category_id');
            $title = $request->input('title');
            $keywords = $request->input('keywords');
            $description = $request->input('description');
            $slug = $request->input('slug');
            $category = Category::find($category_id);
            DB::table('blogs')->insert([
                'category_id' => $category_id,
                'title' => $title,
                'keywords' => $keywords,
                'description' => $description,
                'slug' => $slug,
                'user_id' => $user_id,
                'image' => Storage::putfile('images', $request->file('image'))
            ]);
            return redirect()->route('user showing blog', ['user_id' => $user_id])->with('success', 'Blog Added');
        } else {
            return redirect()->route('home');
        }
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
    public function show(Request $request, Blog $blogs, $user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user = $request->session()->get('user_id');
            $categories = DB::select('select * from categories where status="true"');
            return view('user.adding_blog', ['user' => $user, 'data' => $categories]);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blog $blogs, $user_id, $id)
    {
        $category = DB::select('select * from categories where status = ?', ['true']);
        $blog = Blog::find($id);
        return view('user.editing_blog', ['blog' => $blog, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blogs, $user_id, $id)
    {
        if (Auth::user()->id == $user_id) {
            $category_id = $request->input('category_id');
            $title = $request->input('title');
            $keywords = $request->input('keywords');
            $description = $request->input('description');
            $slug = $request->input('slug');
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
                    'status' => 'false',
                    'image' => $image
                ]);
            return redirect()->route('user showing blog', ['user_id' => $user_id])->with('success', 'Blog Updated');
            return redirect()->route('user showing blog', ['user_id', Auth::user()->id]);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blogs, $user_id, $id)
    {
        if (Auth::user()->id == $user_id) {
            DB::table('blogs')->where('id', $id)->delete();
            $blog = Blog::find($id);
            Storage::delete('$blog->image');
            return redirect('/');
        } else {
            return redirect()->route('home');
        }
    }

    //User message control

    public function user_messages($id)
    {
        if (Auth::user()->id == $id) {
            $user = User::find($id);
            $messages = DB::select('select * from messages where name = ?', [$user->name]);
            return view('user.showing_messages', ['data' => $messages]);
        } else {
            return redirect()->route('home');
        }
    }

    public function user_destroy_message(Blog $blogs, $user_id, $id)
    {
        if (Auth::user()->id == $user_id) {
            DB::table('messages')->where('id', $id)->delete();
            return redirect()->route('user showing messages', ['user_id' => $user_id])->with('message', 'Message Deleted');
        } else {
            return redirect()->route('home');
        }
    }
}
