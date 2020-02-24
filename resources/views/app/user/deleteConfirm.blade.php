@extends('layouts.app')

@section('content')
    <h3>ユーザー削除します。戻れません。</h3>
@if(session('errorMessage'))
    <div class="alert alert-success errorMessage">
        {{session('errorMessage')}}
    </div>
@endif
    <div class="mx-auto mt-auto" style="width: 200px;">
        <a class="btn btn-outline-primary" href="{{ route('user.delete') }}">削除</a>
    </div>
@endsection

