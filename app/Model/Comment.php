<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [
        'id'
    ];

    public function admin()
    {
        // adminとは多対1
        return $this->belongsTo(Admin::class);
    }

    public function thread()
    {
        // threadとは多対1
        return $this->belongsTo(Thread::class);
    }
}
