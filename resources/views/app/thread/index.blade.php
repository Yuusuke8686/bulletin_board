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

@foreach($threads as $thread)
    <ul>
        <li>{{$thread->id}}</li>
        <li>
            <a href={{ route('thread.index', ['thread_id' => $thread->id]) }}>
                {{$thread->thread_name}}
            </a>
        </li>
        <li>{{$thread->quantity}}</li>
        <li>{{$thread->created_at}}</li>
        <li>{{$thread->update_at}}</li>
    </ul>

    <button>
        <a href="/thread/create">スレッド作成</a>
    </button>
</body>
</html>
