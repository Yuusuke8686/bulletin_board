<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [
        'id'
    ];

    // リレーションはコメントCRUD実装時に一緒に実装
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
