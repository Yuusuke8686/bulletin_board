<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登録完了</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <p>登録完了！！</p>
    <button>
        <a href="{{ route('thread.index')}}">掲示板へ</a>
    </button>
@endsection
</body>
</html>
