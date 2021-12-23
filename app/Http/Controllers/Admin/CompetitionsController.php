<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competitions = Competition::all();

        return view('admin.competitions.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.competitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'from' => 'required|date|after:yesterday',
            'to' => 'required|date|after:from',
        ]);

        $competition = new Competition($request->all());
        $competition->save();

        return redirect()
            ->route('admin.competitions.index')
            ->with('success', "Soutěž {$competition->name} byla úspěšně vytvořena!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        $projects = $competition->projects
            ->map(function ($project) {
                $project->total = $project
                    ->evaluations
                    ->sum(fn($evaluation) => $evaluation->score);
                return $project;
            })
            ->sortByDesc('total');

        return view('admin.competitions.show', compact('competition', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        return view('admin.competitions.edit', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'from' => 'required|date|after:yesterday',
            'to' => 'required|date|after:from',
        ]);

        $competition->update($request->all());
        $competition->save();

        return redirect()
            ->route('admin.competitions.index')
            ->with('success', "Soutěž {$competition->name} byla úspěšně vytvořena!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();

        return redirect()
            ->route('admin.competitions.index')
            ->with('success', "Soutěž {$competition->name} byla úspěšně odstraněna!");
    }
}
