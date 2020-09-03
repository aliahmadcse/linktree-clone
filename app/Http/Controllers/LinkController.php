<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use Auth;

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
        $links = Auth::user()->links()->get();
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
        $link = Auth::user()->links()
            ->create($request->only(['name', 'link']));

        if ($link) {
            return redirect()->to('/dashboard/links');
        }

        return redirect()->back();
    }

    public function edit(Link $link)
    {
    }

    public function update(Request $request, Link $link)
    {
    }

    public function destory(Request $request, Link $Link)
    {
    }
}
