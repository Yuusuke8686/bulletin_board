@extends('layouts.app')

@section('content')
<style>
    .toggle-mark a::after {
        text-decoration: none;
        font-family: "Font Awesome 5 Free";
        content: "\f078";
        float: right;
        text-decoration: none;
        font-weight: 900;
    }
    .toggle-mark a.collapsed::after {
    content: "\f054";
    }
</style>
<h2>コメント一覧</h2>
@if(session('errorMessage'))
<div class="row">
    <div class="col align-self-end">
        <div class="alert alert-info errorMessage">
            {{session('errorMessage')}}
        </div>
    </div>
</div>
@endif
<h3>{{$threads->thread_name}}</h3>
<div class="container">
    @if(isset($comments))
    <div class="mx-3">
        @foreach ($comments as $comment)
        <div class="row"> 
            <div class="col align-self-center">          
            <div class="card my-3" style="20%">
                <h5 class="card-header toggle-mark" id="search-header">投稿者:{{$comment->admin->nickname}}
                @if ($comment->admin_id == Auth::id()) 
                <a data-toggle="collapse" href="#edit-div-{{$comment->id}}" class="collapsed"></a>
                @endif
                </h5>
                <div class="card-body">
                    <div>
                        {{$comment->body}}
                    </div>
                    <div class="mt-4">
                        {{$comment->created_at}}
                    </div>
                </div>
                @if ($comment->admin_id == Auth::id())  
                <div class="collapse" id="edit-div-{{$comment->id}}">  
                <div class="card-footer">
                    <div class="btn-group btn-group-sm" role="group">
                    <div class="mx-3">
                        <a href={{route('thread.comment.edit.show', ['comment_id' => $comment->id])}} class="btn btn-outline-danger">編集</a>
                    </div>
                    <div class="mx-3">
                        <a href={{route('thread.comment.delete.confirm', ['comment_id' => $comment->id])}} class="btn btn-outline-danger">削除</a>
                    </div>
                    </div>
                </div>
            </div>
                @endif
            </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="mx-3">
        <h3>コメントはまだありません</h3>
    </div>
    @endif
</div>

<div class="container my-4">
@if ($threads->quantity < 100)
    <div class="mx-3　my-3">
    <div class="card" style="20%">
        <div class="card-header">コメント投稿</div>
        <div class="card-body">
            <form action="{{route('thread.comment.create.send', ['thread_id' => $threads->id])}}" method="POST">
                @csrf
                <div class="form-group">
                    <p class="lead">300文字以内で投稿してください</p>
                    <input class="form-control" type="text" name="body">
                    <div class="text-danger">{{$errors->first('body')}}</div>
                </div>
                <button class="btn btn-outline-primary" type="submit">投稿</button>
            </form>
        </div>
    </div>
@else
    <h3>これ以上コメントできません</h3>
@endif
@if (Auth::id() == $threads->admin_id)
    <div class="mx-3 my-3">
        <a href="{{route("thread.delete.confirm", ['thread_id' => $threads->id])}}" class="btn btn-outline-danger" >スレッド削除</a>
    </div>
@endif
</div>
@endsection