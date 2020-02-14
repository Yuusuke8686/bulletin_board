@extends('layouts.app')

@section('content')
<h2>スレッド作成</h2>
    <form action="/thread/create" method="post">
        @csrf
        <label for="thread_name">スレッド名</label>
        <input type="text" name="thread_name">

        <button type="submit">作成</button>
    </form>

@endsection

