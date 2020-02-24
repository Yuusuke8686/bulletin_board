<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Model\Comment;

interface CommentRepositoryInterface
{
    // 一覧表示
    public function index(int $thread_id);

    // 投稿機能
    public function create(array $newCommentArray);

    // 編集機能
    public function edit(array $editCommentArray);

    // 一件取得
    public function find(int $comment_id);

    // 削除
    public function destroy(int $comment_id);
}