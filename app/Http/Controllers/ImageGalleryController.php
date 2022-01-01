<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return redirect('/admin/blog');
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
        return view('profile.adding_image', ['user' => $user, 'data' => $blog, 'images' => $images]);
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
        // $blog = DB::select('select * from blogs where id = ?', [$blog_id]);
        DB::table('images')->where('id', $image_id)->delete();
        return redirect('admin/blog');
    }
}
