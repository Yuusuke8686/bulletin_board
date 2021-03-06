<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\ThreadValiRequest;
use Illuminate\Http\Request;
use App\Service\ThreadService;
use App\Model\Thread;

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
     * @param Thread $thread
     * @return View
     */
    public function createThread(ThreadValiRequest $request, Thread $thread)
    {
        $nextPage = null;
        $threads = null;

        try {
            $this->threadService->createThread($request, $thread);
            
            // スレッド一覧を取得
            $threads = $this->threadService->indexThread($thread);
            $nextPage = 'app.thread.index';
    
            return view('app.thread.index', compact('threads'));    
        } catch (\Exception $e) {
            $nextPage = 'app.thread.create';
            session()->flash('flashMessage', 'スレッド作成に失敗しました');
        }
        return view($nextPage);
    }

    /**
     * スレッド一覧表示機能
     * @param Thread $thread
     * @return View
     */
    public function indexThread(Thread $thread)
    {
        $threads = $this->threadService->indexThread($thread);

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
    public function deleteThread(int $thread_id, Thread $thread)
    {
        $threads = null;

        try {
            $this->threadService->deleteThread($thread_id, $thread);
            // スレッド一覧を取得
            $threads = $this->threadService->indexThread($thread);
        } catch (\Exception $e) {
            session()->flash('flashMessage', 'スレッドの削除に失敗しました');
        }
        return view('app.thread.index', compact('threads'));
    }
}
