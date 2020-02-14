@extends('layouts.app')

@section('content')
<h2>本当にスレッド削除ですか</h2>
<button>
    <a href="{{route('thread.delete', ['thread_id' => $thread_id])}}">削除</a>
</button>
@endsection

