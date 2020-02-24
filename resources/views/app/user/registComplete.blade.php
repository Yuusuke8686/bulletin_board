@extends('layouts.app')

@section('content')
    <h2>登録完了！！</h2>
@if(session('errorMessage'))
    <div class="alert alert-success errorMessage">
        {{session('errorMessage')}}
    </div>
@endif
    <a href="{{route('thread.index')}}" class="btn btn-outline-primary">掲示板へ</a>
@endsection

