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
