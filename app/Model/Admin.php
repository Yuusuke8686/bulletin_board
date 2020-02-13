<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['login_id', 'password', 'nickname'];

    // リレーションはコメントCRUD実装時に一緒に実装
}
