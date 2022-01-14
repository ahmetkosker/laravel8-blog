<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public static function getSetting()
    {
        return DB::table('settings')->first();
    }

    public static function mainPage()
    {
        $setting = DB::table('settings')->first();
        return view('home.main_page', ['setting' => $setting, 'user' => 'ahmet']);
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
}
