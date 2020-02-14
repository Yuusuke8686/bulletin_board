@extends('layouts.app')

@section('content')
<h2>スレッド一覧ページ</h2>
@foreach($threads as $thread)
    @if(!$thread->trashed())
    <ul>
        <li>{{$thread->id}}</li>
        <li>
            <a href={{ route('thread.comment.create.show', ['thread_id' => $thread->id]) }}>
                {{$thread->thread_name}}
            </a>
        </li>
        <li>{{$thread->quantity}}</li>
        <li>{{$thread->created_at}}</li>
        <li>{{$thread->update_at}}</li>
    </ul>
    @endif
@endforeach
{{--@else--}}
    <div>スレッドがありません</div>
{{--@endif--}}
    <button>
        <a href="{{route('thread.create.show')}}">スレッド作成</a>
    </button>
@endsection

