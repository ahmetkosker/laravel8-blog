<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $results = DB::select('select * from admins where email = ?', [$email]);
        if ($results && $results[0]->password == $password) {
            $request->session()->put('user_id', $email);
            return redirect('/admin/panel');
        } else {
            return redirect('/admin/login');
        }
    }
}
