<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents project registered in coding competition.
 *
 * @property int $id
 * @property int $competition_id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property string $code_url
 * @property string $production_url?
 *
 * @property \Carbon\Carbon $created_at?
 * @property \Carbon\Carbon $updated_at?
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_id', 'name', 'description',
        'code_url', 'production_url',
    ];

    /**
     * Relations
     */
    public function competition() { return $this->belongsTo(Competition::class); }
    public function user() { return $this->belongsTo(User::class); }
    public function evaluations() { return $this->hasMany(ProjectEvaluation::class); }
}
