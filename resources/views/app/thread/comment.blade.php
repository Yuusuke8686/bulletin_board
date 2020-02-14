@extends('layouts.app')

@section('content')
<h1>コメント一覧</h1>
<h2>{{$threads->thread_name}}</h2>
@if(isset($comments))
    @foreach($comments as $comment)
        <ul>
            <li>{{$comment->admin->nickname}}</li>
            <li> {{$comment->body}} : {{$comment->created_at}}</li>
        </ul>
    @if($comment->admin_id == Auth::id())
        <button>
            <a href="{{route('thread.comment.edit.show', ['comment_id' => $comment->id])}}">編集</a>
        </button>
        <button>
            <a href="{{route('thread.comment.delete.confirm', ['comment_id' => $comment->id])}}">削除</a>
        </button>
    @endif
    @endforeach
@else
    <h3>コメントがまだありません</h3>
@endif

<h3>コメント投稿</h3>
@if($threads->quantity < 100)
    <form action="{{route('thread.comment.create.send', ['thread_id' => $threads->id])}}" method="post">
        @csrf
        <div class="text-danger">{{$errors->first('body')}}</div>
        <input type="text" name="body">
        <div>300文字以内で投稿してください</div>
        <button type="submit">投稿</button>
    </form>
@else
    <div>これ以上コメントできません</div>
@endif
@if(Auth::id() === $threads->admin_id)
<button>
    <a href="{{route("thread.delete.confirm", ['thread_id' => $threads->id])}}">スレッド削除</a>
</button>
@endif
@endsection

