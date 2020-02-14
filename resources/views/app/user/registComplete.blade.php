@extends('layouts.app')

@section('content')
    <p>登録完了！！</p>
    <button>
        <a href="{{ route('thread.index')}}">掲示板へ</a>
    </button>
@endsection

