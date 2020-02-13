<!doctype html>
<html lang=ja>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スレッド削除画面</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<h2>本当にスレッド削除ですか</h2>
<button>
    <a href="{{route('thread.delete', ['thread_id' => $thread_id])}}">削除</a>
</button>
@endsection
</body>
</html>
