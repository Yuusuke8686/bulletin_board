<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    {{-- <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー登録</title>
</head>
<body>
@include('layouts.header')
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
</body>
</html>
