@extends('layouts.app')

@section('content')
    <h2>登録確認</h2>
@if(session('flashMessage'))
    <div class="alert alert-success flashMessage">
        {{session('flashMessage')}}
    </div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-2 pt-2">
                <div class="card" style="30%">
                    <div class="card-body">
                        <p class="lead card-title">以下の情報で登録します</p>
                        <div class="card-text">
                            <form action="{{ route('user.complete')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="login_id">ログインID</label>
                                    <div class="text-danger">{{$errors->first('login_id')}}</div>
                                    <input class="form-control" type="text" name="login_id" id="login_id" value={{$userConfirmData['login_id']}} readonly>

                                </div>
                                <div class="form-group">
                                    <label for="password">パスワード</label>
                                    <div class="text-danger">{{$errors->first('password')}}</div>
                                    <input class="form-control" type="password" name="password" id="pass" value={{$userConfirmData['password']}} readonly >
                                </div>
                                <div class="form-group">
                                    <label for="password">ニックネーム</label>
                                    <div class="text-danger">{{$errors->first('nickname')}}</div>
                                    <input class="form-control" type="text" name="nickname" id="nickname" value={{$userConfirmData['nickname']}} readonly>
                                </div>
                                <button class="btn btn-outline-primary" type="submit">登録</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

