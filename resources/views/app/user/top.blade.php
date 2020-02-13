<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TOP</title>
</head>
<body>
    <p>こんにちわん</p>
    <form action="{{ route('login')}}" method="post">
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
</body>
</html>
