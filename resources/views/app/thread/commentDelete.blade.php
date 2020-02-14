@extends('layouts.app')

@section('content')
<h2>コメント削除</h2>
@if(isset($commentDeleteMessage))
<div>{{$commentDeleteMessage}}</div>
@endif
<div>コメントを削除します</div>
<textarea name="body" id="" cols="10" rows="10" disabled="disabled">
    {{$comment->body}}
</textarea>
<form action="{{route('thread.comment.delete')}}" method="post">
    @csrf
    <input type="hidden" name="comment_id" value="{{$comment->id}}">
    <button type="submit">削除</button>
</form>
@endsection

