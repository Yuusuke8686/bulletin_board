@extends('layouts.app')

@section('content')
    <p>ユーザー登録</p>
    <form action="{{ route('user.confirm') }}" method="post">
        @csrf
        <label for="login_id">ログインID</label>
            <input type="text" name="login_id">
        <label for="password">パスワード</label>
            <input type="password" name="password">
        <label for="nickname">ニックネーム</label>
            <input type="text" name="nickname">
        <button type="submit">確認</button>
    </form>
@endsection


