<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{



    public static function getSetting()
    {
        return DB::table('settings')->first();
    }

    public static function categoryList()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    public static function mainPage(Request $request)
    {
        $setting = DB::table('settings')->first();
        $blogs = DB::select('select * from blogs where status = ? limit 6', ['true']);
        return view('home.main_page', ['setting' => $setting, 'blogs' => $blogs]);
    }

    public static function aboutus()
    {
        return view('home.aboutus');
    }

    public static function references()
    {
        return view('home.references');
    }

    public static function fag()
    {
        return view('home.fag');
    }

    public static function contact()
    {
        return view('home.contact');
    }

    public static function myaccount()
    {
        return view('home.myaccount');
    }

    public static function mycomments_edit($user_id, $id)
    {
        if (Auth::user()->id == $user_id) {
            $comment = Comment::find($id);
            return view('home.mycomments_edit', ['data' => $comment]);
        } else {
            return redirect()->route('home');
        }
    }

    public static function mycomments_update(Request $request, $user_id, $id)
    {
        if (Auth::user()->id == $user_id) {
            $comment = DB::table('comments')->where('id', $id)->update([
                'comment' => $request->input('comment'),
            ]);
            return redirect()->route('mycomments', ['user_id' => $user_id])->with('success', 'Comment updated');
        } else {
            return redirect()->route('home');
        }
    }

    public static function mycomments_delete($user_id, $id)
    {
        if (Auth::user()->id == $user_id) {
            DB::table('comments')->where('id', $id)->delete();
            return redirect()->route('mycomments', ['user_id' => $user_id])->with('success', 'Comment deleted');
        } else {
            return redirect()->route('home');
        }
    }

    public static function mycomments($id)
    {
        if (Auth::user()->id == $id) {
            $user = User::find($id);
            $comments = Comment::where('user_id', $id)->get();
            return view('home.mycomments', ['data' => $comments]);
        } else {
            return redirect()->route('home');
        }
    }


    public static function contactForm(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');
        $ip = $request->ip();
        DB::table('messages')->insert([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
            'ip' => $ip,
        ]);

        return redirect()->route('contact')->with('message', 'Your Message Saved');
    }

    public static function categoryProduct(Request $request, $id)
    {
        $category = Category::find($id);
        $blogs = DB::table('blogs')->where('category_id', '=', $id)->where('status', '=', 'true')->get();
        return view(
            'home.categoryBlogs',
            ['blogs' => $blogs, 'category' => $category]
        );
    }

    public static function fix()
    {
        return redirect()->route('/');
    }
}
