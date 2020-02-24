@extends('layouts.app')

@section('content')
<h2>コメント削除</h2>
@if(session('errorMessage'))
    <div class="alert alert-success errorMessage">
        {{session('errorMessage')}}
    </div>
@endif
<div class="container">
    <div class="mx-3">
        <div class="lead">コメントを削除します</div>
        <div class="card my-3">
            <div class="card-body">
                <div>
                    {{$comment->body}}
                </div>
            </div>
        </div>
    </div>
    <div class="mx-3">
        <form action="{{route('thread.comment.delete')}}" method="post">
            <div class="form-group">
                @csrf
                <input class="form-control" type="hidden" name="comment_id" value="{{$comment->id}}">
                <input class="form-control" type="hidden" name="body" value="{{$comment->body}}">
                <button class="btn btn-outline-danger" type="submit">削除</button>
            </div>
        </form>
    </div>
</div>
@endsection

