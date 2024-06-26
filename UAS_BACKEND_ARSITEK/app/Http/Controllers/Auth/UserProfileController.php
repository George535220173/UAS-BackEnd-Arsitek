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
    // Tampilkan halaman profil pengguna
    public function show()
    {
        return view('profile');
    }

    // Ganti username pengguna
    public function changeUsername(Request $request)
    {
        try {
            $request->validate([
                'new_username' => 'required|string|max:255',
                'auth_code' => 'required|string|max:5',
                'password' => 'required|string',
            ]);

            if (!Hash::check($request->password, Auth::user()->password)) {
                return response()->json(['success' => false, 'errors' => ['password' => 'Password is incorrect']]);
            }

            if ($request->auth_code !== session('auth_code')) {
                return response()->json(['success' => false, 'errors' => ['auth_code' => 'Authentication code is incorrect']]);
            }

            $user = Auth::user();
            $user->name = $request->new_username;
            $user->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'errors' => ['server' => 'Server error: ' . $e->getMessage()]]);
        }
    }

    // Ganti email pengguna
    public function changeEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|email|max:255',
            'auth_code' => 'required|string|max:5',
            'password' => 'required|string',
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return response()->json(['success' => false, 'errors' => ['password' => 'Password is incorrect']]);
        }

        if ($request->auth_code !== session('auth_code')) {
            return response()->json(['success' => false, 'errors' => ['auth_code' => 'Authentication code is incorrect']]);
        }

        $user = Auth::user();
        $user->email = $request->new_email;
        $user->save();

        return response()->json(['success' => true]);
    }

    // Ganti password pengguna
    public function changePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|string|min:6|confirmed',
            'auth_code' => 'required|string|max:5',
        ]);

        if ($request->auth_code !== session('auth_code')) {
            return response()->json(['success' => false, 'errors' => ['auth_code' => 'Authentication code is incorrect']]);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['success' => true]);
    }

    // Ganti nomor telepon pengguna
    public function changePhone(Request $request)
    {
        try {
            $request->validate([
                'new_value' => 'required|string|max:16',
                'password' => 'required|string',
            ]);

            if (!Hash::check($request->password, Auth::user()->password)) {
                return response()->json(['success' => false, 'errors' => ['password' => 'Password is incorrect']]);
            }

            $user = Auth::user();
            $user->phone = $request->new_value;
            $user->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'errors' => ['server' => 'Server error: ' . $e->getMessage()]]);
        }
    }

    // Ganti alamat pengguna
    public function changeAddress(Request $request)
    {
        try {
            $request->validate([
                'new_value' => 'required|string|max:255',
                'password' => 'required|string',
            ]);

            if (!Hash::check($request->password, Auth::user()->password)) {
                return response()->json(['success' => false, 'errors' => ['password' => 'Password is incorrect']]);
            }

            $user = Auth::user();
            $user->address = $request->new_value;
            $user->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'errors' => ['server' => 'Server error: ' . $e->getMessage()]]);
        }
    }

    // Ganti jenis kelamin pengguna
    public function changeGender(Request $request)
    {
        try {
            $request->validate([
                'new_value' => 'required|string|in:male,female',
                'password' => 'required|string',
            ]);

            if (!Hash::check($request->password, Auth::user()->password)) {
                return response()->json(['success' => false, 'errors' => ['password' => 'Password is incorrect']]);
            }

            $user = Auth::user();
            $user->gender = $request->new_value;
            $user->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'errors' => ['server' => 'Server error: ' . $e->getMessage()]]);
        }
    }

    // Kirim kode autentikasi ke email pengguna
    public function sendAuthCode()
    {
        $authCode = strtoupper(Str::random(5));
        session(['auth_code' => $authCode]);

        Mail::to(Auth::user()->email)->send(new AuthCodeMail($authCode));

        return response()->json(['message' => 'Authentication code sent']);
    }

    // Update data opsional pengguna (phone, address, gender)
    public function updateOptionalFields(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:16',
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

    // Hapus data opsional pengguna (phone, address, gender)
    public function deleteOptionalFields(Request $request)
    {
        $request->validate([
            'field' => 'required|string|in:phone,address,gender',
        ]);

        $user = Auth::user();
        $field = $request->input('field');

        if ($field === 'phone') {
            $user->phone = null;
        } elseif ($field === 'address') {
            $user->address = null;
        } elseif ($field === 'gender') {
            $user->gender = null;
        }
        $user->save();

        return response()->json(['success' => true]);
    }
}
