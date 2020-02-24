@extends('layouts.app')

@section('content')
<h2>本当にスレッド削除ですか</h2>
@if(session('errorMessage'))
    <div class="alert alert-success errorMessage">
        {{session('errorMessage')}}
    </div>
@endif
    <a href="{{route('thread.delete', ['thread_id' => $thread_id])}}" class="btn btn-outline-danger">削除</a>
@endsection

