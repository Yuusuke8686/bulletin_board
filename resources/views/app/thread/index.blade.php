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

@foreach($thread_data as $data)
    <ul>
        <li>{{$data->id}}</li>
        <li>
            <a href="/thread/comment/{$data->id}">
                {{$data->thread_name}}
            </a>
        </li>
        <li>{{$data->quantity}}</li>
        <li>{{$data->created_at}}</li>
        <li>{{$data->update_at}}</li>
    </ul>

    <button>
        <a href="/thread/create">スレッド作成</a>
    </button>
</body>
</html>
