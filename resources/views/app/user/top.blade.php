@extends('layouts.app')

@section('content')

    <p>こんにちわん</p>
    <form action="{{ route('login.send')}}" method="post">
        @csrf
        <label for="login_id">ログインID</label>
            <input type="text" name="login_id">
        <label for="password">パスワード</label>
            <input type="password" name="password">
        <button type="submit">ログイン</button>
    </form>

    <p>登録</p>
    <button>
        <a href="{{ route('user.create')}}">ユーザー登録</a>
    </button>
@endsection
