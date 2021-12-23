<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents evaluation from user to project.
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property int $score
 */
class ProjectEvaluation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'project_id', 'score'];
    public $timestamps = false;

    /**
     * Relations
     */
    public function user() { return $this->belongsTo(User::class); }
    public function project() { return $this->belongsTo(Project::class); }
}
