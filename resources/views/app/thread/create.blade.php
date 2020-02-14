@extends('layouts.app')

@section('content')
<h2>スレッド作成</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 pt-2">
            <div class="card" style="30%">
                <div class="card-body">
                    <p class="lead card-title">スレッドを作成します</p>
                    <div class="card-text">
                        <form action="/thread/create" method="post">
                            @csrf
                            <div class="form-group">
                                <laebel for="login_id">スレッド名</laebel>
                                <div class="text-danger">{{$errors->first('login_id')}}</div>
                                <input class="form-control" type="text" name="thread_name"  placeholder="入力してください">
                            </div>
                            <button class="btn btn-outline-primary" type="submit">作成</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

