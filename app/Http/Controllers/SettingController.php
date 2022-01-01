<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('settings')->first();
        if ($data == '') {
            DB::table('settings')->insert([
                'title' => 'Project Title',
            ]);
        } else {
            $user = $request->session()->get('user_id');
            $setting = DB::table('settings')->first();
            return view('profile.setting', ['setting' => $setting, 'user' => $user]);
        }
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $validation = $request->validate([
            'title' => 'required',
        ]);

        $title = $request->input('title');
        $keywords = $request->input('keywords');
        $description = $request->input('description');
        $company = $request->input('company');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $fax = $request->input('fax');
        $email = $request->input('email');
        $smtpserver = $request->input('smtpserver');
        $smtpemail = $request->input('smtpemail');
        $smtppassword = $request->input('smtppassword');
        $smtpport = $request->input('smtpport');
        $facebook = $request->input('facebook');
        $instagram = $request->input('instagram');
        $twitter = $request->input('twitter');
        $youtube = $request->input('youtube');
        $aboutus =  $request->input('aboutus');
        $contact = $request->input('contact');
        $references = $request->input('references');
        $status = $request->input('status');
        DB::table('settings')
            ->where('id', 1)
            ->update([
                'title' => $title,
                'keywords' => $keywords,
                'description' => $description,
                'company' => $company,
                'address' => $address,
                'phone' => $phone,
                'fax' => $fax,
                'email' => $email,
                'smtpserver' => $smtpserver,
                'smtpemail' => $smtpemail,
                'smtppassword' => $smtppassword,
                'smtpport' => $smtpport,
                'facebook' => $facebook,
                'instagram' => $instagram,
                'twitter' => $twitter,
                'youtube' => $youtube,
                'aboutus' => $aboutus,
                'contact' => $contact,
                'references' => $references,
                'status' => $status,
            ]);

        return redirect()->route('showing setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
