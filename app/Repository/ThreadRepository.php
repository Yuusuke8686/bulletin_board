<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Model\Thread;
use Illuminate\Support\Facades\DB;

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
        $threadArray = ['thread_name' => $thread_name, 'admin_id' => $admin_id];
        DB::beginTransaction();
        try {
            // 保存
            $thread->fill($threadArray)->save();
            DB::commit();  
            
            return $thread;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * 削除機能
     * @param int $thread_id
     */
    public function delete(int $thread_id, Thread $thread)
    {
        DB::beginTransaction();
        try {
            $thread->find($thread_id)->delete();
            DB::commit();

            return $thread;
        } catch (\Exception $e) {
            DB::rollback();
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
        DB::beginTransaction();
        try {
            $thread->find($thread_id)->save();
            DB::commit();

            return $thread;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }


}
