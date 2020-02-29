<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Model\Thread;

interface ThreadRepositoryInterface
{
    // 一覧表示
    public function index(Thread $thread);

    // 作成機能
    public function create(string $thread_name, int $admin_id, Thread $thread);

    // 削除
    public function delete(int $thread_id, Thread $thread);

    //一件取得
    public function find(int $thread_id, Thread $thread);

    // 更新日時変更
    public function save(int $thread_id, Thread $thread);

}