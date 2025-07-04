<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name', 'party', 'votes'];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
