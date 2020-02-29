@extends('layouts.app')

@section('content')
<h2>スレッド削除完了した！</h2>
@if(session('flashMessage'))
    <div class="alert alert-success flashMessage">
        {{session('flashMessage')}}
    </div>
@endif
    <a href="{{route('thread.index')}}" class="btn btn-outline-primary">掲示板に戻る</a>
@endsection
