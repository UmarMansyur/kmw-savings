<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Authentication extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $member = Member::where('email', '=', $credentials['email'])->where('password', $credentials['password'])->first();
            if ($member != null) {
                Session::flush();
                $request->session()->push('user', $member);
                notify()->success("Anda berhasil login", 'Berhasil');
                return redirect('/user/dashboard');
            } else {
                if (Auth::attempt($credentials)) {
                    notify()->success('Anda berhasil login', 'Berhasil');
                    return redirect('/admin/dashboard');
                }
                return throw new Exception('Akun tidak terdaftar');
            }
        } catch (\Throwable $th) {
            notify()->error($th->getMessage(), 'Gagal');
            return redirect('/');
        }
    }

    public function logout() {
        if(Auth::check()) {
            Auth::logout();
        } else {
            Session::flush();
        }
        notify()->success('Anda berhasil logout', 'Berhasil');
        return redirect('/');
    }
}
