<?php

namespace App\Repository;

use App\Model\Admin;

class UserRepository implements UserRepositoryInterface
{
    /**
     * 新規登録
     * @param array $userData
     * @param Admin $admin
     */
    public function create(array $userData, Admin $admin)
    {
        try {
            $admin->fill([
                'login_id' => $userData['login_id'],
                'password' => $userData['password'],
                'nickname' => $userData['nickname']
            ]);
    
            // adminテーブルに保存
            return $admin->save();
            
        } catch (\Exception $e) {
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
        try {
            return $admin->where('id', $userId)->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}