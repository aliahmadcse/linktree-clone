<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Returns the default link view with all links for authenticated
     * user
     * 
     * @return view
     */
    public function index()
    {
        $links = Auth::user()->links()
            ->withCount('visits')
            ->with('latestVisit')
            ->get();
        // return $links;
        return view('links.index', [
            'links' => $links
        ]);
    }

    /**
     * Displays view for creating a new resource(link)
     *
     * @return view
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Create a link resource
     *
     * @param Request $request
     * @return redirect to index action
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link = Auth::user()->links()
            ->create($request->only(['name', 'link']));

        if ($link) {
            return redirect()->to('/dashboard/links');
        }

        return redirect()->back();
    }

    /**
     * Display a view with link to edit
     *
     * @param Link $link
     * @return view
     */
    public function edit(Link $link)
    {
        // enforcing that a user can edit only his/her own links
        if ($link->user_id !== Auth::id()) {
            return abort(404);
        }
        return view('links.edit', [
            'link' => $link
        ]);
    }

    /**
     * Updates a link resource
     *
     * @param Request $request
     * @param Link $link
     * @return redirect to index action
     */
    public function update(Request $request, Link $link)
    {
        // enforcing that a user can edit only his/her own links
        if ($link->user_id !== Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link->update($request->only(['name', 'link']));

        return redirect()->to('/dashboard/links');
    }


    /**
     * Delete a link resource
     *
     * @param Request $request
     * @param Link $Link
     * @return redirect to index action
     */
    public function destroy(Request $request, Link $link)
    {
        if ($link->user_id !== Auth::id()) {
            abort(403);
        }
        $link->delete();

        return redirect()->to('/dashboard/links');
    }
}
