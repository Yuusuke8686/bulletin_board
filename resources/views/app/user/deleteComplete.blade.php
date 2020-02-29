@extends('layouts.app')

@section('content')
    <h2>退会完了</h2>
@if(session('flashMessage'))
    <div class="alert alert-success flashMessage">
        {{session('flashMessage')}}
    </div>
@endif
    <a href="{{route('top')}}" class="btn btn-outline-primary">トップへ戻る</a>
@endsection

