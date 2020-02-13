<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登録確認</title>
</head>
<body>
    <p>以下の内容で登録します</p>
    <form action="/user/complete" method="post">
        @csrf
        <input type="text" name="login_id" value={{$login_id}}>
        <input type="text" name="password" value={{$password}}>
        <input type="text" name="nickname" value={{$nickname}}>
        <button type="submit">登録</button>
    </form>
</body>
</html>