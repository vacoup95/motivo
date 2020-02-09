<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'id',
        'group_id',
        'user_id'
    ];

    /**
     * Retrieves users that belong to group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
