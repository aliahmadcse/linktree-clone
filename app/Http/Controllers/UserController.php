<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show a single resource
     *
     * @param User $user
     * @return view
     */
    public function show(User $user)
    {
        $user->load('links');
        return view('users.show', [
            'user' => $user
        ]);
    }
    /**
     * Display an edit form with current authenticated user data
     *
     * @return view
     */
    public function edit()
    {
        return view('users.edit', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Update user resources
     *
     * @param Request $request
     * @return redirect
     */
    public function update(Request $request)
    {
        // always want a full hexadecimal e.g #ff0022
        $request->validate([
            'text_color' => 'required|size:7|starts_with:#',
            'background_color' => 'required|size:7|starts_with:#'
        ]);

        Auth::user()->update($request->only('background_color', 'text_color'));

        return redirect()->back()->with(['success' => 'Changes saved successfully']);
    }
}
