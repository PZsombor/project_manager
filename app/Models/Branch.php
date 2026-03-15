<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name', 
        'repository_id',
    ];

    //Database relationships
    //Commit
    public function commits()
    {
        return $this->hasMany(Commit::class);
    }

    //Repository
    public function repository(){
        return $this->belongsTo(Repository::class);
    }
}
