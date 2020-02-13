<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    {{-- <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スレッド一覧</title>
</head>
<body>
@include('layouts.header')
<h2>スレッド一覧ページ</h2>
@foreach($threads as $thread)
    @if(!$thread->trashed())
    <ul>
        <li>{{$thread->id}}</li>
        <li>
            <a href={{ route('thread.comment', ['thread_id' => $thread->id]) }}>
                {{$thread->thread_name}}
            </a>
        </li>
        <li>{{$thread->quantity}}</li>
        <li>{{$thread->created_at}}</li>
        <li>{{$thread->update_at}}</li>
        <li>
            <button>
                <a href="{{route('thread.delete.confirm', ['thread_id' => $thread->id])}}">削除</a>
            </button>
        </li>
    </ul>
    @endif
@endforeach
{{--@else--}}
    <div>スレッドがありません</div>
{{--@endif--}}
    <button>
        <a href="{{route('thread.create.show')}}">スレッド作成</a>
    </button>
</body>
</html>
