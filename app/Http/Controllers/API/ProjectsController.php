<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectEvaluation;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Evaluates the project.
     *
     * @param Request $request
     * @param Project $project
     * @return void
     */
    public function evaluate(Request $request, Project $project)
    {
        $request->validate([
            'score' => 'required|integer|min:0|max:10'
        ]);
        
        return ProjectEvaluation::updateOrCreate([
            'user_id' => auth()->id(),
            'project_id' => $project->id,
        ], [
            'score' => $request->score,
        ]);
        
        return 'ok';
    }
    
    /**
     * Removes given evaluation of the project.
     *
     * @param Request $request
     * @param Project $project
     * @return void
     */
    public function unevaluate(Request $request, Project $project)
    {
        if (!$evaluation = $project->evaluations()->where('user_id', auth()->id())->first())
            return abort(404);
            
        $evaluation->delete();
        return response()
            ->noContent();
    }

    public function store(Request $request)
    {
        $request->validate([
            'competition_id' => "required|int",
            'name' => 'required|string',
            'description' => "required|string",
            'code_url' => ["required", "string", "regex:/^(https?:\/\/)?git(hub|lab|bucket).com\/.+$/i"]
        ]);

        $project = new Project;
        $project->competition_id = $request->competition_id;
        $project->user_id = auth()->id();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->code_url = $request->code_url;
        $project->saveOrFail();
        return $project->load("user"); 
    }
}
