<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'username',
        'password',
        'user_id',
    ];

    /**
     * Retrieve user that belongs to credential
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
