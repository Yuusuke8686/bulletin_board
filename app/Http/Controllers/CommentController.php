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
     * @return Factory|View
     */
    public function showCommentIndex(int $thread_id)
    {
        $comments = $this->commentService->indexComment($thread_id);

        // 紐づいているスレッドを取得
        $threads = $this->threadService->findThread($thread_id);

        return view('app.thread.comment', compact('comments', 'threads'));

    }

    /**
     * コメント投稿機能
     * @param CommentValiRequest $request
     * @param int $thread_id
     * @return Factory|RedirectResponse|View
     */
    public function createComment(CommentValiRequest $request, int $thread_id)
    {
        if(!$this->commentService->createComment($request, $thread_id)){
            session()->flash('errorMessage', 'コメントの投稿に失敗しました');
        }
        $comments = $this->commentService->indexComment($thread_id);
        $threads = $this->threadService->findThread($thread_id);

        //スレッドの更新日時のみ変更する
        $this->threadService->saveUpdateAt($thread_id);

        return view('app.thread.comment', compact('comments', 'threads'));
    }

    /**
     * コメント編集画面表示
     * @param int $comment_id
     * @return Factory|View
     */
    public function showEditComment(int $comment_id)
    {
        $comments = $this->commentService->findComment($comment_id);

        return view('app.thread.commentEdit', ['comments' => $comments]);
    }

    /**
     * コメント編集機能
     * @param CommentValiRequest $request
     * @return Factory|View
     */
    public function editComment(CommentValiRequest $request)
    {
        if(!$this->commentService->editComment($request)){
            session()->flash('errorMessage', '正常に更新できませんでした');
        }
        // 紐づいているスレッドを取得する
        $thread_id = $this->commentService->getThreadId($request);
        $threads = $this->threadService->findThread($thread_id);

        // スレッドに紐づいているコメントを全件取得
        $comments = $this->commentService->indexComment($thread_id);

        return view('app.thread.comment', compact('comments', 'threads'));
    }

    /**
     * コメント削除確認画面表示
     * @param int $comment_id
     * @return Factory|View
     */
    public function showCommentDeleteConfirm(int $comment_id)
    {
        $comment = $this->commentService->findComment($comment_id);

        return view('app.thread.commentDelete', compact('comment'));
    }

    /**
     * コメント削除機能
     * @param CommentValiRequest $request
     * @param Comment $comment
     * @param Thread $thread
     * @return Factory|View
     */
    public function commentDelete(CommentValiRequest $request)
    {
        // thread_idを取得する
        $thread_id = $this->commentService->getThreadId($request);

        // 削除
        if($this->commentService->deleteComment($request)){
            session()->flash('errorMessage', 'コメント削除に失敗しました');
        }
        session()->flash('errorMessage', 'コメントを削除しました');
        //スレッドとコメントを取得
        $threads = $this->threadService->findThread($thread_id);
        $comments = $this->commentService->indexComment($thread_id);

        return view('app.thread.comment', compact('comments', 'threads'));
    }
}
