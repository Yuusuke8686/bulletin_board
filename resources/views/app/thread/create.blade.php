@extends('layouts.app')

@section('content')
<h2>スレッド作成</h2>
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
                    <p class="lead card-title">スレッドを作成します</p>
                    <div class="card-text">
                        <form action="/thread/create" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="thread_name">スレッド名</label>
                                <div class="text-danger">{{$errors->first('thread_name')}}</div>
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

