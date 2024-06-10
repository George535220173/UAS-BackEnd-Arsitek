<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\AuthCodeMail;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }

    public function changeUsername(Request $request)
    {
        $request->validate([
            'new_username' => 'required|string|max:255',
            'auth_code' => 'required|string|max:5',
            'password' => 'required|string',
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors(['password' => 'Password is incorrect']);
        }

        if ($request->auth_code !== session('auth_code')) {
            return back()->withErrors(['auth_code' => 'Authentication code is incorrect']);
        }

        $user = Auth::user();
        $user->name = $request->new_username;
        $user->save();

        return redirect()->route('profile')->with('success', 'Username updated successfully');
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|email|max:255',
            'auth_code' => 'required|string|max:5',
            'password' => 'required|string',
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors(['password' => 'Password is incorrect']);
        }

        if ($request->auth_code !== session('auth_code')) {
            return back()->withErrors(['auth_code' => 'Authentication code is incorrect']);
        }

        $user = Auth::user();
        $user->email = $request->new_email;
        $user->save();

        return redirect()->route('profile')->with('success', 'Email updated successfully');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|string|min:6|confirmed',
            'auth_code' => 'required|string|max:5',
        ]);

        if ($request->auth_code !== session('auth_code')) {
            return back()->withErrors(['auth_code' => 'Authentication code is incorrect']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Password updated successfully');
    }

    public function sendAuthCode()
    {
        $authCode = strtoupper(Str::random(5));
        session(['auth_code' => $authCode]);

        Mail::to(Auth::user()->email)->send(new AuthCodeMail($authCode));

        return response()->json(['message' => 'Authentication code sent']);
    }

    public function updateOptionalFields(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|digits:11',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',
        ]);

        $user = Auth::user();
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function deleteOptionalFields()
    {
        $user = Auth::user();
        $user->phone = null;
        $user->address = null;
        $user->gender = null;
        $user->save();

        return redirect()->route('profile')->with('success', 'Optional fields deleted successfully');
    }
    
}
