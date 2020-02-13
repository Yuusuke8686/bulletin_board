<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>退会感完了</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <div>退会完了</div>
    <button>
        <a href="{{ route('top')}}">トップへ戻る</a>
    </button>
@endsection
</body>
</html>
