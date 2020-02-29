<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Model\Thread;

class ThreadRepository implements ThreadRepositoryInterface
{
    /**
     * 一覧表示
     * @param Thread $thread
     */
    public function index(Thread $thread)
    {
        return $thread->paginate(10);
    }

    /**
     * 作成機能
     * @param string $thread_name
     * @param int $admin_id
     */
    public function create(string $thread_name, int $admin_id, Thread $thread)
    {
        try {
            $thread->fill([
                'thread_name' => $thread_name,
                'admin_id' => $admin_id
            ]);
    
            // 保存
            return $thread->save();
            
        } catch (\Exception $e) {
            throw $e;
        }

    }

    /**
     * 削除機能
     * @param int $thread_id
     */
    public function delete(int $thread_id, Thread $thread)
    {
        try {
            return $thread->find($thread_id)->delete();
        } catch (\Exception $e) {
            throw $e;
        }
      
    }

    /**
     * 一件取得
     * @param int $thread_id
     */
    public function find(int $thread_id, Thread $thread)
    {
        return $thread->find($thread_id);
    }

    /**
     * update日時更新
     * @param int $thread_id
     */
    public function save(int $thread_id, Thread $thread)
    {
        try {
            return $thread->find($thread_id)->save();
        } catch (\Exception $e) {
            throw $e;
        }
    }


}
