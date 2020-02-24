<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadValiRequest;
use Illuminate\Http\Request;
use App\Service\ThreadService;

class ThreadController extends Controller
{
    protected $threadService;

    public function __construct(ThreadService $threadService)
    {
        $this->threadService = $threadService;
    }


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
     * @param ThreadValiRequest $request
     * @return View
     */
    public function createThread(ThreadValiRequest $request)
    {
        if($this->threadService->createThread($request)){
            $threads = $this->threadService->indexThread();

            return view('app.thread.index', compact('threads'));
        }

        $errorMessage = 'スレッド作成に失敗しました';
        return view('app.thread.create');
    }

    /**
     * スレッド一覧表示機能
     * @param Thread $thread
     * @return View
     */
    public function indexThread()
    {
        $threads = $this->threadService->indexThread();

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
        if(!$this->threadService->deleteThread()){
            session()->flash('errorMessage', 'スレッドの削除に失敗しました');
        }
        $threads = $this->threadService->indexThread();

        return view('app.thread.index', compact('threads'));
    }
}
