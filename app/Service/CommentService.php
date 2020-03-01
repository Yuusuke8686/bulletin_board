<?php

namespace App\Service;

use Exception;
use App\Http\Requests\CommentValiRequest;
use App\Repository\CommentRepositoryInterface;
use App\Repository\ThreadRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Model\Comment;

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
     * @param Comment $comment
     */
    public function indexComment(int $thread_id, Comment $comment)
    {
        // コメントを全件取得する
        return $this->commentRepository->index($thread_id, $comment);
    }

    /**
     * コメント投稿機能
     * @param CommentValiRequest $request
     * @param int $thread_id
     * @param Comment $comment
     */
    public function createComment(CommentValiRequest $request, int $thread_id, Comment $comment)
    {
        try {
            // 必要なものを配列でまとめる
            $newCommentArray = [
                'thread_id' => $thread_id,
                'admin_id' => Auth::id(),
                'body' => $request->body
            ];
    
            return $this->commentRepository->create($newCommentArray, $comment);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * コメント編集
     * @param CommentValiRequest $request
     * @param Comment $comment
     */
    public function editComment(CommentValiRequest $request, Comment $comment)
    {
        try {
            // 必要な物は配列にまとめる
            $editCommentArray = [
                'body' => $request->body,
                'comment_id' => $request->comment_id
            ];

            return $this->commentRepository->edit($editCommentArray, $comment);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * スレッドID取得
     * @param Request $request
     * @param Comment $comment
     */
    public function getThreadId(CommentValiRequest $request, Comment $comment)
    {
        $comment_id = $request->comment_id;
        return $this->commentRepository->getThreadId($comment_id, $comment);
    }

    /**
     * コメント一件取得
     * @param $comment_id
     * @param Comment $comment
     */
    public function findComment(int $comment_id, Comment $comment)
    {
        return $this->commentRepository->find($comment_id, $comment);
    }

    /**
     * コメント削除
     * @param Request $request
     * @param Comment $comment
     */
    public function deleteComment(CommentValiRequest $request, Comment $comment)
    {
        try {
            $comment_id = $request->comment_id;
    
            return $this->commentRepository->destroy($comment_id, $comment);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}