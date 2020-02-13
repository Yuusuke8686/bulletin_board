<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [
        'id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
