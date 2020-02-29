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
        try {
            $userData = [
                'login_id' => $request->login_id,
                'password' => Hash::make($request->password),
                'nickname' => $request->nickname
            ];
    
            return $this->userRepository->create($userData);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * ユーザーログイン機能
     * @param LoginUserValiRequest $request
     */
    public function login(LoginUserValiRequest $request)
    {
        try {
            $auth_info = [
                'login_id' => $request->login_id,
                'password' => $request->password
            ];
    
            return Auth::attempt($auth_info);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * ユーザーログアウト機能
     * @param NULL
     */
    public function logout()
    {
        try {          
            return Auth::logout();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * ユーザー削除機能
     * 
     */
    public function deleteUser()
    {
        try {
            $userId = Auth::id();
            // 削除する前にログアウトする
            Auth::logout();
            return $this->userRepository->delete($userId);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}