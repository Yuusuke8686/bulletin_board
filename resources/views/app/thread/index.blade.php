<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スレッド一覧</title>
</head>
<body>
    <h2>スレッド一覧ページ</h2>
{{--@if(isset($threads))--}}
@foreach($threads as $thread)
    @if($thread->isDelete == 0)
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
