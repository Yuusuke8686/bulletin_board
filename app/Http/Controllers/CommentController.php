<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentValiRequest;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Service\ThreadService;
use App\Service\CommentService;
use App\Model\Thread;
use App\Model\Comment;


class CommentController extends Controller
{
    protected $commenrService;
    protected $threadService;

    public function __construct(CommentService $commentService, ThreadService $threadService)
    {
        $this->commentService = $commentService;
        $this->threadService = $threadService;
    }

    /**
     * コメント一覧表示
     * @param $thread_id
     * @param Thread $thread
     * @param Comment $comment
     * @return Factory|View
     */
    public function showCommentIndex(int $thread_id, Thread $thread, Comment $comment)
    {
        $comments = $this->commentService->indexComment($thread_id, $comment);

        // 紐づいているスレッドを取得
        $threads = $this->threadService->findThread($thread_id, $thread);

        return view('app.thread.comment', compact('comments', 'threads'));

    }

    /**
     * コメント投稿機能
     * @param CommentValiRequest $request
     * @param int $thread_id
     * @param Thread $thread
     * @param Comment $comment
     * @return Factory|RedirectResponse|View
     */
    public function createComment(CommentValiRequest $request, int $thread_id, Thread $thread, Comment $comment)
    {
        try {
            $this->commentService->createComment($request, $thread_id, $comment);          
            // スレッドの更新日時のみ更新する
            $this->threadService->saveUpdateAt($thread_id, $thread);
        } catch (\Exception $e) {
            session()->flash('flashMessage', 'コメントの投稿に失敗しました');
        }
        // スレッドとコメント一覧を取得する
        $comments = $this->commentService->indexComment($thread_id, $comment);
        $threads = $this->threadService->findThread($thread_id, $thread);
        
        return view('app.thread.comment', compact('comments', 'threads'));
    }

    /**
     * コメント編集画面表示
     * @param int $comment_id
     * @param Comment $comment
     * @return Factory|View
     */
    public function showEditComment(int $comment_id, Comment $comment)
    {
        $comments = $this->commentService->findComment($comment_id, $comment);

        return view('app.thread.commentEdit', ['comments' => $comments]);
    }

    /**
     * コメント編集機能
     * @param CommentValiRequest $request
     * @param Thread $thread
     * @param Comment $comment
     * @return Factory|View
     */
    public function editComment(CommentValiRequest $request, Thread $thread, Comment $comment)
    {
        try {
            $this->commentService->editComment($request, $comment);
        } catch (\Exception $e) {
            session()->flash('flashMessage', '正常に更新できませんでした');
        }

        // 紐づいているスレッドを取得する
        $thread_id = $this->commentService->getThreadId($request, $comment);
        $threads = $this->threadService->findThread($thread_id, $thread);

        // スレッドに紐づいているコメントを全件取得
        $comments = $this->commentService->indexComment($thread_id, $comment);

        return view('app.thread.comment', compact('comments', 'threads'));

    }

    /**
     * コメント削除確認画面表示
     * @param int $comment_id
     * @param Comment $comment
     * @return Factory|View
     */
    public function showCommentDeleteConfirm(int $comment_id, Comment $comment)
    {
        $comment = $this->commentService->findComment($comment_id, $comment);

        return view('app.thread.commentDelete', compact('comment'));
    }

    /**
     * コメント削除機能
     * @param CommentValiRequest $request
     * @param Thread $thread
     * @param Comment $comment
     * @return Factory|View
     */
    public function commentDelete(CommentValiRequest $request, Thread $thread, Comment $comment)
    {
        $flashMessage = null;
        try {
            // thread_idを取得する
            $thread_id = $this->commentService->getThreadId($request,$comment);

            $this->commentService->deleteComment($request, $comment);
            $flashMessage = 'コメントを削除しました';
        } catch (\Exception $e) {
            $flashMessage = 'コメントの削除に失敗しました';
        }

        //スレッドとコメントを取得
        $threads = $this->threadService->findThread($thread_id, $thread);
        $comments = $this->commentService->indexComment($thread_id, $comment);

        session()->flash('flashMessage', $flashMessage);
        return view('app.thread.comment', compact('comments', 'threads'));

    }
}
