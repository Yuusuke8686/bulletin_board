<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Model\Thread;

interface ThreadRepositoryInterface
{
    // 一覧表示
    public function index();

    // 作成機能
    public function create(string $thread_name, int $admin_id);

    // 削除
    public function delete(int $thread_id);

    //一件取得
    public function find(int $thread_id);
}