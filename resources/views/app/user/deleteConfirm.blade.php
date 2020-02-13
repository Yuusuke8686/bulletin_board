<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー削除確認</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <div>ユーザー削除します。戻れません。</div>
    <button>
        <a href="{{ route('user.delete') }}">削除</a>
    </button>
@endsection
</body>
</html>
