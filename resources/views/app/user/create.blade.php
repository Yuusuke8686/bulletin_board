<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー登録</title>
</head>
<body>
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
</body>
</html>

