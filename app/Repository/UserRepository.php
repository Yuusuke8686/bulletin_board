<?php

namespace App\Repository;

use App\Model\Admin;

class UserRepository implements UserRepositoryInterface
{
    /**
     * 新規登録
     * @param array $userData
     */
    public function create(array $userData)
    {
        $admin = new Admin();

        $admin->fill([
            'login_id' => $userData['login_id'],
            'password' => $userData['password'],
            'nickname' => $userData['nickname']
        ]);

        // adminテーブルに保存
        if($admin->save()){
            return true;
        }
        return false;
    }

    /**
     * 削除機能
     * @param int $userId
     */
    public function delete(int $userId)
    {
        $admin = new Admin();

        // 削除対象のユーザーを取得
        $deleteAdmin = $admin->where('id', $userId)->first();

        if($admin->destroy($userId)){
            return true;
        }
        return false;
    }
}