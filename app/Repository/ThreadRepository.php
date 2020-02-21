<?php

namespace App\Http\Repository;

use Illuminate\Http\Request;
use App\Model\Thread;

class ThreadRepository implements ThreadRepositoryInterface
{
    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }
    
    /**
     * 一覧表示
     * 
     */
    public function index()
    {
        return $thread->paginate(10);
    }

    /**
     * 作成機能
     * @param Request $request
     * @param int $admin_id
     */
    public function create(Request $request, int $admin_id)
    {
        $thread->fill([
            'thread_name' => $request->thread_name,
            'admin_id' => $admin_id
        ]);

        // 保存
        if($thread->save()){
            return true;
        }
        return false;
    }

    /**
     * 削除機能
     * @param int $thread_id
     */
    public function destroy(int $thread_id)
    {
        return $thread->find($thread_id)->delete();
      
    }

    /**
     * 一件取得
     * 
     */
    public function find(int $thred_id)
    {
        return $thread->find($thread_id);
    }
}
