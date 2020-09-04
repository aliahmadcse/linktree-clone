<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('links');
        return view('users.show', [
            'user' => $user
        ]);
    }
    /**
     * Undocumented function
     *
     * @return 
     */
    public function edit()
    {
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
    }
}
