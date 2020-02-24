@extends('layouts.app')

@section('content')
    <h2>退会完了</h2>
@if(session('errorMessage'))
    <div class="alert alert-success errorMessage">
        {{session('errorMessage')}}
    </div>
@endif
    <a href="{{route('top')}}" class="btn btn-outline-primary">トップへ戻る</a>
@endsection

