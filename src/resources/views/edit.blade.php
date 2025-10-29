@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}" />
@endsection 

@section('content')
<div class="layout">
    <form class="form" action="">
    @csrf
        <h1>プロフィール設定</h1>
        <div class="">
            <div class="circle">
                <img src="" alt="">
            </div>
            <input type="file">
        </div>
        <div class="">
            <h4>ユーザー名</h4>
            <input type="text" class="edit" value="">
        </div>
        <div class="">
            <h4>郵便番号</h4>
            <input type="text" class="edit" value="">
        </div>
        <div class="">
            <h4>住所</h4>
            <input type="text" class="edit" value="">
        </div>
        <div class="">
            <h4>建物名</h4>
            <input type="text" class="edit" value="">
        </div>
        <button class="button">更新する</button>    
    </form>
</div>


@endsection