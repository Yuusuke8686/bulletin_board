<?php

namespace App\Service;

use Exception;
use App\Http\Requests\ThreadValiRequest;
use App\Repository\ThreadRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Model\Thread;

class ThreadService
{
    protected $threadRepository;

    public function __construct(ThreadRepositoryInterface $threadRepository)
    {
        $this->threadRepository = $threadRepository;
    }

    /**
     * スレッド一覧表示
     * @param Thread $thread
     */
    public function indexThread(Thread $thread)
    {
        return $this->threadRepository->index($thread);
    }

    /**
     * スレッド作成
     * @param ThreadValiREquest $request
     * @param Thread $thread
     */
    public function createThread(ThreadValiRequest $request, Thread $thread)
    {
        try {
            $thread_name = $request->thread_name;
            $admin_id = Auth::id();

            return $this->threadRepository->create($thread_name, $admin_id, $thread);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * スレッド削除機能
     * @param int $thread_id
     * @param Thread $thread
     */
    public function deleteThread(int $thread_id, Thread $thread)
    {
        try {
            return $this->threadRepository->delete($thread_id, $thread);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * スレッド一件取得
     * @param int $thread_id
     * @param Thread $thread
     */
    public function findThread(int $thread_id, Thread $thread)
    {
        return $this->threadRepository->find($thread_id, $thread);
    }

    /**
     * スレッド更新日更新
     * @param int $thread_id
     * @param Thread $thread
     */
    public function saveUpdateAt(int $thread_id, Thread $thread)
    {
        try {
            return $this->threadRepository->save($thread_id, $thread);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
}