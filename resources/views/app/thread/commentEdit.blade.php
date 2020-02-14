@extends('layouts.app')

@section('content')
<h2>コメント編集</h2>
<form action="{{route('thread.comment.edit.send')}}" method="post">
    @csrf
    <div class="text-danger">{{$errors->first('login_id')}}</div>
    <input type="text" name="body" value="{{$comments->body}}">
    <input type="hidden" name="comment_id" value="{{$comments->id}}">
    <div>300文字以内で入力してください</div>
    <button type="submit">確定</button>
</form>
@endsection
