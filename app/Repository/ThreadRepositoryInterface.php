<?php

namespace App\Http\Repository;

use Illuminate\Http\Request;
use App\Model\Thread;

interface ThreadRepositoryInterface
{
    // 一覧表示
    public function index();

    // 作成機能
    public function create(Request $request, int $admin_id);

    // 削除
    public function destroy(int $thread_id);
}