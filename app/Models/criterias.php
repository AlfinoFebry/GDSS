<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class criterias extends Model
{
    use HasFactory;

    public function alternatives(): BelongsToMany {
        return $this->belongsToMany(Alternatives::class, 'evaluations');
    }
}
