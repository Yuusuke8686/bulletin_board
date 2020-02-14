<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentValiRequest;
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

    /**
     * コメント投稿機能
     * @param CommentValiRequest $request
     * @param Comment $comment
     * @param Thread $thread
     * @param int $thread_id
     * @return Factory|RedirectResponse|View
     */
    public function createComment(CommentValiRequest $request, Comment $comment, Thread $thread, int $thread_id)
    {
        // フォームからコメントを取得する //
        $body = $request->body;

        // 現在ログイン中のユーザーIDを取得する //
        $admin_id =  Auth::id();

        $comment->fill(['thread_id' => $thread_id, 'admin_id' => $admin_id, 'body' => $body]);

        if($comment->save()){
            // スレッド数を1増やす //
            $thread->incrementQuantity($thread_id);

            // 保存できたらコメント一覧画面に遷移する //
            $comments = $comment->where('thread_id', $thread_id)->get();

            $threads = Thread::find($thread_id);

            return view('app.thread.comment', compact('comments', 'threads'));
        }

        return view('app');
    }

    /**
     * コメント編集画面表示
     * @param Comment $comment
     * @param int $comment_id
     * @return Factory|View
     */
    public function showEditComment(Comment $comment, int $comment_id)
    {
        // 該当コメントを取得する //
        $comments = $comment->find($comment_id);

        return view('app.thread.commentEdit', ['comments' => $comments]);
    }

    /**
     * コメント編集機能
     * @param CommentValiRequest $request
     * @param Comment $comment
     * @return Factory|View
     */
    public function editComment(CommentValiRequest $request, Comment $comment)
    {
        // フォームから編集されたコメント内容を取得する //
        $body = $request->body;
        $comment_id = $request->comment_id;

        // コメントを更新する //
       if($comment->where('id', $comment_id)->update(['body' => $body])) {

           // $comment_idを元に$thread_idを取得する
           $thread_id = $comment->where('id', $comment_id)->value('thread_id');

           $comments = $comment->where('thread_id', $thread_id)->get();

           $threads = Thread::find($thread_id);

            // 更新正常に行われた場合 //
           return view('app.thread.comment', compact('comments', 'threads'));
       }

       return redirect()->back();
    }

    /**
     * コメント削除確認画面表示
     * @param int $comment_id
     * @param Comment $comment
     * @return Factory|View
     */
    public function showCommentDeleteConfirm(int $comment_id, Comment $comment)
    {
        $comment = $comment->find($comment_id);

        return view('app.thread.commentDelete', compact('comment'));
    }

    /**
     * コメント削除機能
     * @param Request $request
     * @param Comment $comment
     * @param Thread $thread
     * @return Factory|View
     */
    public function commentDelete(Request $request, Comment $comment, Thread $thread)
    {
        // フォームから送信されたcomment_idを取得する
        $comment_id = $request->comment_id;

        // $comment_idを元に$thread_idを取得する
        $thread_id = $comment->where('id', $comment_id)->value('thread_id');

        if($comment->destroy($comment_id)){
            // コメント数を1減らす //
            $thread->decrementQuantity($thread_id);

            $comments = $comment->where('thread_id', $thread_id)->get();

            $threads = Thread::find($thread_id);

            // 更新正常に行われた場合 //
            return view('app.thread.comment', compact('comments', 'threads'));
        }

        $comment = $comment->find($comment_id);
        $commentDeleteMessage = '正常に削除できませんでした';
        return view('app.thread.commentDelete', compact('comment'))->with('commentDeleteMessage', $commentDeleteMessage);
    }
}
