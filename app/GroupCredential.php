<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupCredential extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'username',
        'password',
        'group_id',
    ];

    /**
     * Retrieve group that belongs to credential
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
