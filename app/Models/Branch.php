<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
    ];

    //Database relationships
    //Commit
    public function commit()
    {
        return $this->hasMany(Commit::class);
    }

    //Repository
    public function repository(){
        return $this->belongsTo(Repository::class);
    }
}
