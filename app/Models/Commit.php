<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    protected $fillable = [
        'branch_id',
        'user_id',
        'messages',
    ];

    //Database relationships
    //File
    public function files()
    {
        return $this->hasMany(File::class);
    }

    //Branch
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    //User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
