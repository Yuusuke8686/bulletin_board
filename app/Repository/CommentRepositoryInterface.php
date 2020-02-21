<?php

namespace App\Http\Repository;

use Illuminate\Http\Request;
use App\Model\Comment;

interface CommentRepositoryInterface
{
    // 一覧表示
    public function index(int $thread_id);

    // 投稿機能
    public function create(Request $request, int $thread_id, int $admin_id);

    // 編集機能
    public function edit(Request $request);

    // 一件取得
    public function find(int $comment_id);

    // 削除
    public function destroy(Request $request);
}