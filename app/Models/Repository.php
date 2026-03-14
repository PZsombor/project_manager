<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'status',
        ];

    //Database relationships
    //Branche
    public function branch()
    {
        return $this->hasMany(Branch::class);
    }

    //Collaborator
    public function collaborator()
    {
        return $this->hasMany(Collaborator::class);
    }

    //User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
