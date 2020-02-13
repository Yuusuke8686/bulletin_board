<!doctype html>
<html lang=ja>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>削除完了</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<h2>削除完了でーす</h2>
<button>
    <a href="{{route('thread.index')}}">掲示板に戻る</a>
</button>
@endsection
</body>
</html>
