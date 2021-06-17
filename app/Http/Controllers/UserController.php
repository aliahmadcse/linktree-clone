<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Image;

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
        $links = Auth::user()->links()
            ->withCount('visits')
            ->with('latestVisit')
            ->get();
        return view('users.edit', [
            'user' => Auth::user(),
            'links'=>$links,
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
            'background_color' => 'required|size:7|starts_with:#',
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        Auth::user()->update($request->input());

        return redirect()->back()->with(['success' => 'Changes saved successfully']);
    }



    public function updateprofilepic(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('profile_pic')){
            $profile_pic = $request->file('profile_pic');
            $filename = time() . '.' . $profile_pic->getClientOriginalExtension();
            Image::make($profile_pic)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::user();
            $user->profile_pic = $filename;
            $user->save();
        }

        $links = Auth::user()->links()
            ->withCount('visits')
            ->with('latestVisit')
            ->get();
        return view('users.edit', [
            'user' => Auth::user(),
            'links'=>$links,
        ]);

    }
}
