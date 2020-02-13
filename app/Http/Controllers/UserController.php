<?php

namespace App\Http\Controllers;

use App\Model\Thread;
use Illuminate\Http\Request;
use App\Model\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

/**
 * TODO とりあえずcontrollerにベタガキ。余裕があればサービス層とレポジトリ層に分ける。
 */

class UserController extends Controller
{
    use AuthenticatesUsers;

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
     * @param Request $request
     * @return View
     */
    public function confirmRegistUser(Request $request)
    {
        // フォームのデータを取得
        $login_id = $request->login_id;
        $password = $request->password;
        $nickname = $request->nickname;

        // TODO バリデーション実装 //

        // 確認画面に返す //
        return view('app.user.registConfirm', compact('login_id', 'password', 'nickname'));

    }

    /**
    * ユーザー新規登録
    * @param Request $request
    * @return View
    */
    public function registUser(Request $request)
    {
        $admin = new Admin;

        // フォームのデータを取得
        $login_id = $request->login_id;
        $password = $request->password;
        $nickname = $request->nickname;

        $admin->fill(['login_id' => $login_id, 'password' => Hash::make($password), 'nickname' => $nickname]);

        // Adminテーブルに保存する
        if ($admin->save()) {
            // threadテーブルからデータを取得
            $threads = $thread->all();

            // スレッド一覧画面にデータを持っていく
            return view('app.thread.index', compact('threads'));
        }

        return view('app.user.create');

    }

    /**
     * ユーザーログイン
     * @param Request $request
     * @param Thread $thread
     * @return View
     */
    public function loginUser(Request $request, Thread $thread)
    {
        // フォームからログインに使用するデータを取得
         $auth_info = [
             'login_id' => $request->login_id,
             'password' => $request->password
        ];

        if (Auth::attempt($auth_info)){
            // threadテーブルからデータを取得
            $threads = $thread->all();

            // スレッド一覧画面にデータを持っていく
            return view('app.thread.index', compact('threads'));
        }

        return view('app.user.top');

    }

    /**
    * ユーザーログアウト
    * @param NULL
    * @return View
    */
    public function logoutUser()
    {
        Auth::logout();

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
    * @param Admin $admin
    * @return View
    */
    public function deleteUser(Admin $admin)
    {
        // 現在ログイン中のユーザー情報を取得 //
        $userid = Auth::id();

        //ログアウトしてセッション・メモリからユーザー情報削除
        Auth::logout();

        $admin = Admin::where('id', $userid)->first();

        if ($admin->id === $userid) {
            // Adminテーブルから該当のユーザーを削除
            if ($admin->destroy($userid)) {
                return redirect()->route('user.deleteComplete');
            }
        }

        return redirect()->back();
    }
}
