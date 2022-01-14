<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    protected $appends = [
        'getParentsTree'
    ];

    public static function getParentsTree($category, $title)
    {
        if ($category->parent_id == 0) {
            return $title;
        }
        $parent = Category::find($category->parent_id);
        $title = $parent->title . ' > ' . $title;

        return CategoryController::getParentsTree($parent, $title);
    }
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
        $categories = Category::with('children')->get();
        return view('profile.admin_categories', ['user' => $user, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function showing_edit(Request $request, Category $category, $id)
    {
        $user = $request->session()->get('user_id');
        $data = DB::select('select * from categories');
        $category = DB::select('select * from categories where id = ?', [$id]);
        return view('profile.category_edit', ['user' => $user, 'data' => $data, 'category' => $category]);
    }

    public function edit(Request $request, Category $category, $id)
    {
        $validation = $request->validate([
            'title' => 'required',
            'parent' => 'required',
        ]);

        $parent_id = request()->input('parent');
        $title = request()->input('title');
        $keywords = request()->input('keywords');
        $description = request()->input('description');
        $slug = request()->input('slug');
        $status = request()->input('status');
        $update = DB::table('categories')
            ->where('id', $id)
            ->update(['parent_id' => $parent_id, 'title' => $title, 'keywords' => $keywords, 'description' => $description, 'slug' => $slug, 'status' => $status]);
        return redirect('/admin/categories');
    }

    public function show_adding(Request $request, Category $category)
    {
        $user = $request->session()->get('user_id');
        $data = DB::select('select * from categories');
        return view('profile.admin_category_add', ['user' => $user, 'data' => $data]);
    }

    public function adding_category(Request $request, Category $category)
    {
        $validation = $request->validate([
            'title' => 'required',
            'parent' => 'required',
        ]);

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
        return redirect('/admin/categories');
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
    public function destroy(Request $request, Category $category, $id)
    {
        DB::table('categories')->where('id', $id)->delete();
        DB::table('categories')->where('parent_id', $id)->delete();
        return redirect('/admin/categories');
    }
}
