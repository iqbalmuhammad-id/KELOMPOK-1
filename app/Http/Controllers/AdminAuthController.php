<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $admin = DB::table('admins')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if (!$admin) {
            return back()->with('error', 'Username atau Password salah');
        }

        session(['admin' => $admin]);
        return redirect('/dashboard');
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect('/');
    }
}