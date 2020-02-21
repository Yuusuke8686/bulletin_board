<?php

namespace App\Http\Repository;

use Illuminate\Http\Request;
use App\Model\User;

interface UserRepositoryInterface
{
    // 一覧表示
    public function index();

    // 作成機能
    public function create();

    // 削除
    public function destroy(int $userId);
}