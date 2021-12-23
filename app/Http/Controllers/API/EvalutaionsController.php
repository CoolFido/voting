<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class EvalutaionsController extends Controller
{
    public function show(Request $request, Project $project)
    {
        return $project->evaluations()->where('user_id', auth()->id())->first();
    }
}
