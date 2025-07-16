<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('frontend.Auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'nullable|in:admin,member',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? 'member',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect()->route('admin.index'); // route admin dashboard
        } else {
            return redirect('/'); // home hoặc trang khác
        }
    }

    public function showLoginForm()
    {
        return view('frontend.Auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect('/admin/reports');  // Chuyển đến trang reports admin
        } else {
            Auth::logout();
            return back()->withErrors(['email' => 'Bạn không có quyền truy cập admin.']);
        }
    }

    return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
