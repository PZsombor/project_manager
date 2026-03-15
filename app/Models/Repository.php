<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $fillable = [
        'name',
        'category',
        'user_id',
        'description',
        'status',
        ];

    //Database relationships
    //Branche
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    //Collaborator
    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }

    //User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
