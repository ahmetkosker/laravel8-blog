<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category)
    {
        $user = $request->session()->get('user_id');
        $categories = DB::select('select * from categories');
        // $category = DB::table('categories')->insert([
        //     'parent_id' => 0,
        //     'title' => 'Hayvanlar',
        //     'status' => 'False'
        // ]);
        return view('profile.admin_categories', ['user' => $user, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    public function show_adding(Request $request, Category $category)
    {
        $user = $request->session()->get('user_id');
        $data = DB::select('select * from categories where parent_id = ?', [0]);
        return view('profile.admin_category_add', ['user' => $user, 'data' => $data]);
    }

    public function adding_category(Request $request, Category $category)
    {
        $parent = $request->input('parent');
        $title = $request->input('title');
        $keywords = $request->input('keywords');
        $description = $request->input('description');
        $slug = $request->input('slug');
        $status = $request->input('status');
        DB::table('categories')->insert([
            'parent_id' => $parent,
            'title' => $title,
            'keywords' => $keywords,
            'description' => $description,
            'slug' => $slug,
            'status' => $status
        ]);
        return 'added';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
