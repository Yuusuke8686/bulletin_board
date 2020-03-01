<?php

namespace App\Repository;

use Exception;
use App\Model\Admin;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    /**
     * 新規登録
     * @param array $userData
     * @param Admin $admin
     */
    public function create(array $userData, Admin $admin)
    {
        DB::beginTransaction();
        try {
            // adminテーブルに保存
            $admin->fill($userData)->save();
            DB::commit();
            
            //return $admin;
        } catch (\Exception $e) {
            DB::rollback();
           throw $e;
        }
    }

    /**
     * 削除機能
     * @param int $userId
     * @param Admin $admin
     */
    public function delete(int $userId, Admin $admin)
    {
        DB::beginTransaction();
        try {
            $admin->where('id', $userId)->delete();
            DB::commit();

            return $admin;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}