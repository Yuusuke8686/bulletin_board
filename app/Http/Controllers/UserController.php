<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserValiRequest;
use App\Http\Requests\UserValiRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Service\UserService;
use App\Service\ThreadService;

class UserController extends Controller
{
    use AuthenticatesUsers;

    protected $userService;
    protected $threadservice;

    public function __construct(UserService $userService, ThreadService $threadservice)
    {
        $this->userService = $userService;
        $this->threadService = $threadservice;
    }

    /**
    * TOPページ表示
    * @param NULL
    * @return View
    */
    public function showTop()
    {
        return view('app.user.top');
    }

    /**
    * ユーザー新規登録フォーム表示
    * @param NULL
    * @return View
    */
    public function showRegistForm()
    {
        return view('app.user.create');
    }

    /**
     * ユーザー新規登録確認
     * @param UserValiRequest $request
     * @return View
     */
    public function confirmRegistUser(UserValiRequest $request)
    {
        $userConfirmData = $this->userService->createConfirmUser($request);

        // 確認画面
        return view('app.user.registConfirm', compact('userConfirmData'));
    }

    /**
     * ユーザー新規登録
     * @param UserValiRequest $request
     * @param Thread $thread
     * @return View
     */
    public function registUser(UserValiRequest $request)
    {
        $flashMessage = null;
        $nextPage = 'app.user.top';   
        
        try {
            $this->userService->createUser($request);
            $flashMessage = 'ユーザー登録完了';
        } catch (\Exception $e) {
            $flashMessage = 'ユーザー登録に失敗しました';
        }
        
        session()->flash('flashMessage', $flashMessage);
        return view($nextPage);
    }

    /**
     * ユーザーログイン
     * @param LoginUserValiRequest $request
     * @return View
     */
    public function loginUser(LoginUserValiRequest $request)
    {
        $threads = null;
        $flashMessage = null;
        $nextPage = null;   

        try {
            $threads = $this->threadService->indexThread();
            $flashMessage = 'ログインしました';
            $nextPage = 'app.thread.index';
        } catch (\Exception $e) {
            $flashMessage = 'ログインに失敗しました';
            $nextPage = 'app.user.top';   
        }
        session()->flash('flashMessage', $flashMessage);
        return view($nextPage, compact('threads'));
    }

    /**
    * ユーザーログアウト
    * @param NULL
    * @return View
    */
    public function logoutUser()
    {   
        $flashMessage = null;

        try {
            $ths->userService->logout();
            $flashMessage = 'ログアウトしました';
        } catch (\Exception $e) {
            $flashMessage = 'ログアウトに失敗しました';
        }
        session()->flash('flashMessage', $flashMessage);
        return view('app.user.top');
    }

    /**
    * ユーザー退会確認画面
    *@param NULL
    *@return View
    */
    public function showConfirmDeleteUser()
    {
        return view('app.user.deleteConfirm');
    }

    /**
    * ユーザー退会
    * @return View
    */
    public function deleteUser()
    {
        try {
            $this->userService->deleteUser();
        } catch (\Exception $e) {
            return redirect()->back();
        }
        return view('app.user.top');
    }
}
