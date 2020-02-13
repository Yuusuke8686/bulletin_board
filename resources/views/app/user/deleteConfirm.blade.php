<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    {{-- <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー削除確認</title>
</head>
<body>
@include('layouts.header')
    <div>ユーザー削除します。戻れません。</div>
    <button>
        <a href="{{ route('user.delete') }}">削除</a>
    </button>
</body>
</html>
