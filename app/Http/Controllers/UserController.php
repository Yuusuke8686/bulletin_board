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
        if($this->userService->createUser($request)){
            $threads = $this->threadService->indexThread();

            // スレッド一覧
            return view('app.thread.index', compact('threads'));
        }
        $errorMessage = 'ユーザー登録に失敗しました';
        return view('app.user.create')->with('errorMessage', $errorMessage);
    }

    /**
     * ユーザーログイン
     * @param LoginUserValiRequest $request
     * @return View
     */
    public function loginUser(LoginUserValiRequest $request)
    {
        if($this->userService->login($request)){
            $threads = $this->threadService->indexThread();
            
            // スレッド一覧
            return view('app.thread.index', compact('threads'));
        }

        $errorMessage = 'ログインに失敗しました';
        return view('app.user.top')->with('errorMessage', $errorMessage);
    }

    /**
    * ユーザーログアウト
    * @param NULL
    * @return View
    */
    public function logoutUser()
    {
        if(!$this->userService->logout()){
            $errorMessage = 'ログアウトに失敗しました';
        }
        $errorMessage = 'ログアウトに失敗しました';

        return view('app.user.top')->with('errorMessage', $errorMessage);
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
    * @param Admin $admin
    * @return View
    */
    public function deleteUser(Admin $admin)
    {
        if($this->userService->deleteUser()){
            return view('app.user.top');
        }

        session()>flash('errorMessage', 'ユーザーの削除に失敗しました');
        return redirect()->back();
    }
}
