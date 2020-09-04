<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Visit;

class VisitController extends Controller
{
    /**
     * Stores a visit to the link
     *
     * @param Request $request
     * @param Link $link
     * @return success
     */
    public function store(Request $request, Link $link)
    {
        return $link->visits()->create([
            'user_agent' => $request->userAgent()
        ]);
    }
}
