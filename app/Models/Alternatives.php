<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Alternatives extends Model
{
    use HasFactory;

    public function criterias(): BelongsToMany {
        return $this->belongsToMany(criterias::class, 'evaluations');
    }
}
