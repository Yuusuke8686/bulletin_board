<?php

namespace App\Http\Controllers;

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
    * @param null
    * @return View
    */
    public function showTop()
    {
        return view('app.user.top');
    }

    /**
    * ユーザー新規登録フォーム表示
    * @param
    * @return
    */
    public function showRegistForm()
    {
        return view('app.user.create');
    }

    /**
    * ユーザー新規登録確認
    * @param
    * @return
    */
    public function confirmRegistUser(Request $request)
    {
        // フォームのデータを取得 //
        $login_id = $request->login_id;
        $password = $request->password;
        $nickname = $request->nickname;

        // TODO バリデーション実装 //

        // 確認画面に返す //
        return view('app.user.registConfirm', compact('login_id', 'password', 'nickname'));

    }

    /**
    * ユーザー新規登録
    * @param
    * @return
    */
    public function registUser(Request $request)
    {
        $admin = new Admin;

        // フォームのデータを取得 //
        $login_id = $request->login_id;
        $password = $request->password;
        $nickname = $request->nickname;

        $admin->fill(['login_id' => $login_id, 'password' => Hash::make($password), 'nickname' => $nickname]);

        // Adminテーブルに保存する //
        if (true == $admin->save()) {
            return view('app.thread.index');
        }
        else {
            return view('app.user.create');
        }
    }

    /**
    * ユーザーログイン
    * @param
    * @return
    */
    public function loginUser(Request $request)
    {
        // フォームからログインに使用するデータを取得 //
         $auth_info = [
             'login_id' => $request->login_id,
             'password' => $request->password
        ];

        if (true == Auth::attempt($auth_info)){
            // 認証成功の場合はスレッド一覧に遷移する //
            return view('app.thread.index');
        }
        else {
            return view('app.user.top');
        }
    }

    /**
    * ユーザーログアウト
    * @param
    * @return
    */
    public function logoutUser()
    {
        Auth::logout();

        return view('app.user.top');
    }

    /**
    * ユーザー退会確認画面
    *@param
    *@return
    */
    public function showConfirmDeleteUser()
    {
        return view('app.user.deleteConfirm');
    }

    /**
    * ユーザー退会
    * @param
    * @return
    */
    public function deleteUser()
    {
        // 現在ログイン中のユーザー情報を取得 //
        $userid = Auth::id();

        //ログアウトしてセッション・メモリからユーザー情報削除 //
        Auth::logout();

        // Adminテーブルから該当のユーザーを削除 //
        if (true == DB::table('admins')->where('id', $userid)) {
            return view('app.user.deleteComplete');
        }
        else {
            return redirect()->back();
        }
    }
}
