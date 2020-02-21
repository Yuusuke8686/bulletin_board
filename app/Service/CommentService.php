<?php

namespace App\Http\Service;

use App\Http\Requests\CommentValiRequest;
use App\Http\Repository\CommentRepositoryInterface;
use App\Http\Repository\ThreadRepositoryInterface;

class CommentService
{
    protected $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * コメント一覧表示
     * 
     */
    public function indexComment()
    {
        // コメントを全件取得する
        return $this->commentRepository->index($thread_id);
    }

    /**
     * コメント投稿機能
     * @param CommentValiRequest $request
     */
    public function createComment(CommentValiRequest $request, int $thread_id)
    {
        // 必要なものを配列でまとめる
        $newCommentArray = [
            'thread_id' => $thread_id,
            'admin_id' => Auth::id(),
            'body' => $request->body
        ];

        return $this->commentRepository->create($commentArray);
    }

    /**
     * コメント編集
     * @param CommentValiRequest $request
     */
    public function editComment(CommentValiRequest $request)
    {
        $editCommentArray = [
            'body' => $request->body,
            'comment_id' => $request->comment_id
        ];

        return $this->commentRepository->edit($editCommentArray);
    }

    /**
     * コメント一件取得
     * @param $comment_id
     */
    public function findComment(int $comment_id)
    {
        return $comment->find($comment_id);
    }

    /**
     * コメント削除
     * @param Request $request
     */
    public function deleteComment(Request $request)
    {
        $comment_id = $request->comment_id;

        return $this->commentRepository->destroy($comment_id);
    }
}