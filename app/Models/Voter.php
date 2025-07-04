<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $fillable = ['name', 'email', 'has_voted'];

    public function vote()
    {
        return $this->hasOne(Vote::class);
    }
}
