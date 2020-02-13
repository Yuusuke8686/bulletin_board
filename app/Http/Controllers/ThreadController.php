<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Thread;

class ThreadController extends Controller
{
    //
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
            return view('app.thread.index');
        }
        else {
            return view('app.thread.create');
        }
    }

    /**
     * スレッド一覧表示機能
     * @param NULL
     * @return View
     */
    public function indexThread()
    {
        // threadテーブルからデータを取得
        $thread_data = Thread::all();

        // スレッド一覧画面にデータを持っていく
        return view('app.thread.index', ['thread_data' => $thread_data]);
    }
}
