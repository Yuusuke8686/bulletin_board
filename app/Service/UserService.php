<?php

namespace App\Service;

use App\Http\Requests\UserValiRequest;
use App\Http\Requests\LoginUserValiRequest;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * ユーザー新規登録確認確認確認
     * @param UserValiRequest $request
     */
    public function createConfirmUser(UserValiRequest $request)
    {
        $userConfirmData = [
            'login_id' => $request->login_id,
            'password' => $request->password,
            'nickname' => $request->nickname
        ];

        return $userConfirmData;
    }

    /**
     * ユーザー新規登録
     * @param UserValiRequest $request
     */
    public function createUser(UserValiRequest $request)
    {
        $userData = [
            'login_id' => $request->login_id,
            'password' => Hash::make($request->password),
            'nickname' => $request->nickname
        ];

        return $this->userRepository->create($userData);
    }

    /**
     * ユーザーログイン機能
     * @param LoginUserValiRequest $request
     */
    public function login(LoginUserValiRequest $request)
    {
        $auth_info = [
            'login_id' => $request->login_id,
            'password' => $request->password
        ];

        return Auth::attempt($auth_info);
    }

    /**
     * ユーザーログアウト機能
     * @param NULL
     */
    public function logout()
    {
        return Auth::logout();
    }

    /**
     * ユーザー削除機能
     * 
     */
    public function deleteUser()
    {
        $userId = Auth::id();
        
        // 削除する前にログアウトする
        Auth::logout();

        return $this->userRepository->delete($userId);
    }
}