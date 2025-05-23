<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockScreenController extends Controller
{
    public function lock()
    {
        session()->put('is_locked', true);

        return redirect()->route('lock_screen.show');
    }

    public function show()
    {
        return view('auth.lock-screen');
    }

    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            session()->forget('is_locked');

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['password' => 'The provided password is incorrect.']);
    }
}
