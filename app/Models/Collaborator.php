<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $fillable = [
        'user_id',
        'repository_id',
        'role',
    ];

    //Database relationships
    //User
    public function users()
    {
        return $this->hasMany(User::class);
    }

    //Repository
    public function repository()
    {
        return $this->belongsTo(Repository::class);
    }
}
