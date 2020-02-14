@extends('layouts.app')

@section('content')
<h2>スレッド一覧ページ</h2>
@foreach($threads as $thread)
    @if(!$thread->trashed())
    <ul>
        <li>{{$thread->id}}</li>
        <li>
            <a href={{ route('thread.comment', ['thread_id' => $thread->id]) }}>
                {{$thread->thread_name}}
            </a>
        </li>
        <li>{{$thread->quantity}}</li>
        <li>{{$thread->created_at}}</li>
        <li>{{$thread->update_at}}</li>
        <li>
            <button>
                <a href="{{route('thread.delete.confirm', ['thread_id' => $thread->id])}}">削除</a>
            </button>
        </li>
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

