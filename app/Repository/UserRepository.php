<?php

namespace App\Http\Controllers;

use App\Model\Admin;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * 新規登録
     * 
     */
    public function create()
    {
        $admin = fill([
            'login_id' => $request->login_id,
            'password' => $request->password,
            'nickname' => $request->nickname
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
    public function deleteUser(int $userId)
    {
        // 削除対象のユーザーを取得
        $deleteAdmin = $admin->where('id', $userId)->first();

        if($admin->destroy($userId)){
            return true;
        }
        return false;
    }
}