<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionsController extends Controller
{
    /**
     * Get list of current competitions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Competition::query()
            ->where('from', '<=', today())
            ->where('to', '>=', today())
            ->get();
    }

    /**
     * Get information about specific competition.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Competition $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Competition $competition)
    {
        abort_unless(
            $competition->from <= today() && $competition->to >= today(),
            404
        );

        return $competition
            ->load([
                'projects' => fn($query) => $query->with('user'),
            ]);
    }
}
