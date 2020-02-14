@extends('layouts.app')

@section('content')
    <div>ユーザー削除します。戻れません。</div>
    <button>
        <a href="{{ route('user.delete') }}">削除</a>
    </button>
@endsection

