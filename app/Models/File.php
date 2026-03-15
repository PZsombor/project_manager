<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'name',
        'commit_id',
        'path',
    ];

    //Database relationships
    //Commit
    public function commit()
    {
        return $this->belongsTo(Commit::class);
    }
}
