<?php

namespace App\Http\Service;

use App\Http\Requests\ThreadValiRequest;
use App\Http\Repository\ThreadRepositoryInterface;
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
    public function createThread(ThreadValiRequest $reqyest)
    {
        $thread_name = $request->thread_name;
        $admin_id = Auth::id();

        return $this->threadRepository->create($thread_name, $admin_id);
    }

    /**
     * スレッド削除機能
     * @param int $thread_id
     */
    public function destroyThread(int $thread_id)
    {
        return $this->threadRepository->destroy($thread_id);
    }

    /**
     * スレッド一件取得
     * @param
     */
    public function findThread(int $thread_id)
    {
        return $this->threadRepository->find($thread_id);
    }
    
}