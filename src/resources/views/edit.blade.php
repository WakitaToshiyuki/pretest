@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}" />
@endsection 

@section('content')
<div class="layout">
    <form action="">
    @csrf
        <h1>プロフィール設定</h1>
        <div class="">
            <img src="" alt="">
            <input type="file">
        </div>
        <div class="">
            <h4>ユーザー名</h4>
        </div>
        <div class="">
            <h4>郵便番号</h4>
        </div>
        <div class="">
            <h4>住所</h4>
        </div>
        <div class="">
            <h4>建物名</h4>
        </div>
        <button class="">更新する</button>    
    </form>
</div>


@endsection