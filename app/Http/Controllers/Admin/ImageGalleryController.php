<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $blog_id = $id;
        $title = $request->input('title');
        DB::table('images')->insert([
            'blog_id' => $blog_id,
            'title' => $title,
            'image' => Storage::putfile('images', $request->file('image'))
        ]);
        return redirect()->route('showing image gallery', ['id' => $blog_id])->with('success', 'Image added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image, Request $request, $blog_id)
    {
        $user = $request->session()->get('user_id');
        $blog = DB::select('select * from blogs where id = ?', [$blog_id]);
        $images = DB::select('select * from images where blog_id = ?', [$blog_id]);
        return view('admin.adding_image', ['user' => $user, 'data' => $blog, 'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image, Request $request, $blog_id, $image_id)
    {
        DB::table('images')->where('id', $image_id)->delete();
        return redirect()->route('showing image gallery', ['id' => $blog_id])->with('success', 'Image deleted');
    }


    public function user_store(Request $request, $user_id, $id)
    {
        if (Auth::user()->id == $user_id) {
            $blog_id = $id;
            $title = $request->input('title');
            DB::table('images')->insert([
                'blog_id' => $blog_id,
                'title' => $title,
                'image' => Storage::putfile('images', $request->file('image'))
            ]);
            return redirect()->route('user showing blog', ['user_id' => $user_id]);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function user_show(Image $image, Request $request, $user_id, $blog_id)
    {
        if (Auth::user()->id == $user_id) {
            $user = $request->session()->get('user_id');
            $blog = DB::select('select * from blogs where id = ?', [$blog_id]);
            $images = DB::select('select * from images where blog_id = ?', [$blog_id]);
            return view('user.adding_image', ['user' => $user, 'data' => $blog, 'images' => $images]);
        } else {
            return redirect()->route('home');
        }
    }

    public function user_destroy(Image $image, Request $request, $user_id, $blog_id, $image_id)
    {
        if (Auth::user()->id == $user_id) {
            DB::table('images')->where('id', $image_id)->delete();
            $image = Image::find($image_id);
            Storage::delete('$image->image');
            return redirect()->route('user showing blog', ['user_id', $user_id]);
        } else {
            return redirect()->route('home');
        }
        // $blog = DB::select('select * from blogs where id = ?', [$blog_id]);

    }
}
