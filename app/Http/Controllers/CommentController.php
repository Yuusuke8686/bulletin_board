<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Model\Thread;
use App\Model\Comment;
use App\Model\Admin;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    /**
     * TODO paginateは一旦未実装。処理もコントローラに詰め込み。余裕があればサービス層とかに分ける。
     */

    /**
     * コメント一覧表示
     * @param $thread_id
     * @param Comment $comment
     * @return Factory|View
     */
    public function showCommentIndex($thread_id, Comment $comment)
    {
        // URLからパラメータとして受け取った$thread_idを元にコメントを全件取得する //
        $comments = $comment->where('thread_id', $thread_id)->get();

        // 該当のThreadテーブルのデータを取得して渡す //
        $threads = Thread::find($thread_id);

        return view('app.thread.comment', compact('comments', 'threads'));

    }

}
