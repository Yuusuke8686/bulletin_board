@extends('layouts.app')

@section('content')
    <p>以下の内容で登録します</p>
    <form action="{{ route('user.complete')}}" method="post">
        @csrf
        <input type="text" name="login_id" value={{$login_id}}>
        <input type="text" name="password" value={{$password}}>
        <input type="text" name="nickname" value={{$nickname}}>
        <button type="submit">登録</button>
    </form>
@endsection

