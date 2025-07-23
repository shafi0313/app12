<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller
{
    public function index()
    {
        $sessions = DB::table('sessions')
            ->where('user_id', user()->id)
            ->orderBy('last_activity', 'desc')
            ->get();

        return view('admin.my-profile.index', compact('sessions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:191'],
            'phone_number' => ['nullable', 'string', 'min:1', 'max:32'],
            'address' => ['nullable', 'string', 'min:1', 'max:191'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp'],

        ]);

        if ($request->hasFile('image')) {
            $data['image'] = processAndStoreImage($request->image, 'user', [300, 300]);
        }

        if ($request->filled('password')) {
            $this->validatePasswordUpdate($request, $data);
        }

        try {
            User::findOrFail(user()->id)->update($data);

            return response()->json(['message' => 'The information has been inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again.'], 500);
        }
    }

    public function sessionLogout(Request $request)
    {
        $session = DB::table('sessions')->where('id', $request->session_id)->first();

        if ($session) {
            DB::table('sessions')->where('id', $request->session_id)->delete();

            return back()->with('success', 'The session has been logged out');
            // return response()->json(['message' => 'The session has been logged out'], 200);
        }

        return back()->with('error', 'The session does not exist');
        // return response()->json(['message' => 'The session does not exist'], 404);
    }

    public function allSessionLogout(Request $request)
    {
        try {
            DB::table('sessions')->where('user_id', user()->id)->delete();

            return redirect()->route('login');
        } catch (\Exception $e) {
            return back()->with('error', 'The session does not exist');
        }
    }

    protected function validatePasswordUpdate($request, &$data)
    {
        if (! Hash::check($request->password, user()->password)) {
            return response()->json(['message' => 'The password is incorrect'], 422);
        }

        if (empty($request->new_password) || empty($request->confirm_password)) {
            return response()->json(['message' => 'The new password and confirm password are required'], 422);
        }

        if ($request->new_password === $request->confirm_password) {
            $data['password'] = Hash::make($request->new_password);
        } else {
            return response()->json(['message' => 'The new password and confirm password do not match'], 422);
        }
    }
}
