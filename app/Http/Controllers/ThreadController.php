<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Thread;

class ThreadController extends Controller
{
    /**
     * TODO とりあえずControllerにベタ書き、時間があればサービス層作る
     */


    /**
     * スレッド作成画面表示
     * @param NULL
     * @return View
     */
    public function showCreateThread()
    {
        return view('app.thread.create');
    }

    /**
     * スレッド作成機能
     * @param Request $request
     * @return View
     */
    public function createThread(Request $request)
    {
        $thread = new Thread();

        // フォームからタイトルを取得
        $thread_name = $request->thread_name;

        // TODO バリデーション

        $thread->fill(['thread_name' => $thread_name, 'quantity' => 0]);

        if ($thread->save()) {
            // threadテーブルからデータを取得
            $threads = $thread->all();
            return view('app.thread.index', compact('threads'));
        }
        else {
            return view('app.thread.create');
        }
    }

    /**
     * スレッド一覧表示機能
     * @param Thread $thread
     * @return View
     */
    public function indexThread(Thread $thread)
    {
        // threadテーブルからデータを取得
        $threads = $thread->all();

        // スレッド一覧画面にデータを持っていく
        return view('app.thread.index', compact('threads'));
    }

    /**
     * スレッド削除確認画面表示
     * @param int $thread_id
     * @return View
     */
    public function showThreadDeleteConfirm(int $thread_id)
    {
        return view('app.thread.deleteConfirm', ['thread_id' => $thread_id]);
    }

    /**
     * スレッド削除機能
     * @param int $thread_id
     * @param Thread $thread
     * @return View
     */
    public function deleteThread(Thread $thread, int $thread_id)
    {
        // 削除処理後に表示されるメッセージ
        $thread_index_message = 'スレッドの削除に失敗しました。';

        if ($thread->find($thread_id)->delete()) {
           $thread_index_message = 'スレッドの削除に成功しました';
            // threadテーブルからデータを取得
            $threads = $thread->all();
        }

        return view('app.thread.index', compact('threads'))->with('thread_index_message', $thread_index_message);

    }
}
