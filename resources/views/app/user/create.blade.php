@extends('layouts.app')

@section('content')
    <h2>ユーザー登録</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-2 pt-2">
                <div class="card" style="30%">
                    <div class="card-body">
                        <p class="lead card-title">ユーザー情報を入力してください</p>
                        <div class="card-text">
                            <form action="{{ route('user.confirm') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <laebel for="login_id">ログインID</laebel>
                                    <div class="text-danger">{{$errors->first('login_id')}}</div>
                                    <input class="form-control" type="text" name="login_id" id="mail" placeholder="入力してください">

                                </div>
                                <div class="form-group">
                                    <label for="password">パスワード</label>
                                    <div class="text-danger">{{$errors->first('password')}}</div>
                                    <input class="form-control" type="password" name="password" id="pass" placeholder="入力してください">
                                </div>
                                <div class="form-group">
                                    <label for="password">ニックネーム</label>
                                    <div class="text-danger">{{$errors->first('nickname')}}</div>
                                    <input class="form-control" type="text" name="nickname" id="pass" placeholder="入力してください">
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


