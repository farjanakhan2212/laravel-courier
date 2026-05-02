<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // $user=new User();
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->password= Hash::make($request->password);
        // $user->save();

        // Auto-login after registration
        Auth::login($user);

        return redirect('/dashboard');
    }
    
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
      
        return back()->withErrors(['message' => 'Invalid credentials']);
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }

}
?>