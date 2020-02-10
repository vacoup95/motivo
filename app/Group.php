<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    /**
     * Retrieves users that belong to group
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_group');
    }
}
