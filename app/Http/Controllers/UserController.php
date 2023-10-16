<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{
    public function UserDashboard()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('frontend.dashboard', compact('profileData'));
    }
    public function UserLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
