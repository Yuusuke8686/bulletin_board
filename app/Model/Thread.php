<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    /**
     * @return HasMany
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
