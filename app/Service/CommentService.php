<?php

namespace App\Service;

use App\Http\Requests\CommentValiRequest;
use App\Repository\CommentRepositoryInterface;
use App\Repository\ThreadRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    protected $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * コメント一覧表示
     * @param int $thread_id
     */
    public function indexComment(int $thread_id)
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

        return $this->commentRepository->create($newCommentArray);
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
     * スレッドID取得
     * @param Request $request
     */
    public function getThreadId(CommentValiRequest $request)
    {
        $comment_id = $request->comment_id;
        return $this->commentRepository->getThreadId($comment_id);
    }

    /**
     * コメント一件取得
     * @param $comment_id
     */
    public function findComment(int $comment_id)
    {
        return $this->commentRepository->find($comment_id);
    }

    /**
     * コメント削除
     * @param Request $request
     */
    public function deleteComment(CommentValiRequest $request)
    {
        $comment_id = $request->comment_id;

        return $this->commentRepository->destroy($comment_id);
    }
}