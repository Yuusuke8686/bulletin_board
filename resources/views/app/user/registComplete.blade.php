@extends('layouts.app')

@section('content')
    <h2>登録完了！！</h2>
@if(session('flashMessage'))
    <div class="alert alert-success flashMessage">
        {{session('flashMessage')}}
    </div>
@endif
    <a href="{{route('thread.index')}}" class="btn btn-outline-primary">掲示板へ</a>
@endsection

