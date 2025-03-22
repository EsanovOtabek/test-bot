<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()   ) return redirect()->intended('/');
        return view('admin.login');
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'telegram_id' => 'required|exists:users,telegram_id',
            'password' => 'required',
        ]);

        $user = User::where('telegram_id', $request->telegram_id)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Noto‘g‘ri Telegram ID yoki parol!');
        }

        if (!$user->is_admin) {
            return redirect()->back()->with('error', 'Sizda ruxsat yo‘q.');
        }

        Auth::attempt($request->only(['telegram_id', 'password']));
        return redirect()->route('admin.index')->with('success', "Admin bo'lib kirdingiz");
    }

    public function logout()
    {
        session()->flush();
        session()->regenerate();
        Auth::logout();
        return redirect('/login')->with('success', 'Chiqdingiz!');
    }

}
