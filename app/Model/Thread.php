<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [
        'id'
    ];

    // リレーションはコメントCRUD実装時に一緒に実装
}
