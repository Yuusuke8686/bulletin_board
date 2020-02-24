@extends('layouts.app')

@section('content')
<h2>コメント編集</h2>
<div class="container">
    <div class="mx-3">
        <div class="card" style="30%">
            <div class="card-body">
                <form action="{{route('thread.comment.edit.send')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <p class="lead">300文字以内で入力してください</p>
                        <input class="form-control" type="text" name="body" value="{{$comments->body}}">
                        <div class="text-danger">{{$errors->first('body')}}</div>
                        <input class="form-control" type="hidden" name="comment_id" value="{{$comments->id}}">
                    </div>
                    <button class="btn btn-outline-primary" type="submit">確定</button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
