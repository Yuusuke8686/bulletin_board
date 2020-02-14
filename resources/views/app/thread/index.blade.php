@extends('layouts.app')

@section('content')
<div class="ml-5">
    <h2>スレッド一覧</h2>
</div>
<div class="container">
    <div class="mx-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>スレッド名</th>
                <th>作成日時</th>
                <th>更新日時</th>
            </tr>
            </thead>
            <tbody>
@foreach($threads as $thread)
@if(!$thread->trashed())
            <tr>
                <td>{{$thread->id}}</td>
                <td><a href={{ route('thread.comment.create.show', ['thread_id' => $thread->id]) }}>{{$thread->thread_name}}({{$thread->quantity}})</a></td>
                <td>{{$thread->created_at}}</td>
                <td>{{$thread->update_at}}</td>
            </tr>
@endif
@endforeach
            </tbody>
        </table>
        {{$threads->links()}}
    @if(!isset($threads))
        <div>スレッドがありません</div>
    @endif
        <div>
            <p class="lead">スレッド作成はこちらから</p>
        </div>
        <div class="my-2">
            <a href="{{ route('thread.create.show')}}" class="btn btn-outline-primary">スレッド作成</a>
        </div>
    </div>
</div>
@endsection

