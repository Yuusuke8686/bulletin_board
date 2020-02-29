<?php

namespace App\Service;

use App\Http\Requests\ThreadValiRequest;
use App\Repository\ThreadRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ThreadService
{
    protected $threadRepository;

    public function __construct(ThreadRepositoryInterface $threadRepository)
    {
        $this->threadRepository = $threadRepository;
    }

    /**
     * スレッド一覧表示
     * @param NULL
     */
    public function indexThread()
    {
        return $this->threadRepository->index();
    }

    /**
     * スレッド作成
     * @param ThreadValiREquest $request
     */
    public function createThread(ThreadValiRequest $request)
    {
        try {
            $thread_name = $request->thread_name;
            $admin_id = Auth::id();

            return $this->threadRepository->create($thread_name, $admin_id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * スレッド削除機能
     * @param int $thread_id
     */
    public function deleteThread(int $thread_id)
    {
        try {
            return $this->threadRepository->delete($thread_id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * スレッド一件取得
     * @param int $thread_id
     */
    public function findThread(int $thread_id)
    {
        return $this->threadRepository->find($thread_id);
    }

    /**
     * スレッド更新日更新
     * @param int $thread_id
     */
    public function saveUpdateAt(int $thread_id)
    {
        try {
            return $this->threadRepository->save($thread_id);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
}