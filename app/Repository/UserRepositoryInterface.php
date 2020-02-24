<?php

namespace App\Repository;

use App\Model\Admin;

interface UserRepositoryInterface
{

    // 作成機能
    public function create(array $userData);

    // 削除
    public function delete(int $userId);
}