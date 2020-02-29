@extends('layouts.app')

@section('content')

<div class="ml-3">
    <h3>掲示板です！！！！！</h3>
</div>
@if(session('flashMessage'))
    <div class="alert alert-info flashMessage">
        {{session('flashMessage')}}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 pt-2">
            <div class="card" style="30%">
                <div class="card-body">
                    <p class="lead card-title">ログインしてください</p>
                    <div class="card-text">
                        <form action="{{ route('login.send')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="login_id">ログインID</label>
                                <div class="text-danger">{{$errors->first('login_id')}}</div>
                                <input class="form-control" type="text" name="login_id" id="mail" placeholder="入力してください">

                            </div>
                            <div class="form-group">
                                <label for="password">パスワード</label>
                                <div class="text-danger">{{$errors->first('password')}}</div>
                                <input class="form-control" type="password" name="password" id="pass" placeholder="入力してください">
                            </div>
                            <button class="btn btn-outline-primary" type="submit">ログイン</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-3">
        <p class="lead">アカウントを持っていない方はこちらから会員登録をお願いします</p>
    </div>
    <div class="my-3">
        <a href="{{ route('user.create')}}" class="btn btn-outline-primary">登録</a>
    </div>
</div>
@endsection
