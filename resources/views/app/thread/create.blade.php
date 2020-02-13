<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スレッド作成</title>
</head>
<body>
<h2>スレッド作成</h2>
    <form action="/thread/create" method="post">
        <label for="thread_name">スレッド名</label>
        <input type="text" name="thread_name">

        <button type="submit">作成</button>
    </form>
</body>
</html>
