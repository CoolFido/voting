<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents coding competition.
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $from
 * @property \Carbon\Carbon $to
 *
 * @property \Carbon\Carbon $created_at?
 * @property \Carbon\Carbon $updated_at?
 */
class Competition extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'from', 'to'];
    public $dates = ['from', 'to'];

    /**
     * Relations
     */
    public function projects() { return $this->hasMany(Project::class); }
}
