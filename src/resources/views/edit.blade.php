@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}" />
@endsection 

@section('content')
<div class="layout">
    <form class="form" action="/mypage/profile" method="POST">
    @csrf
        <h1>プロフィール設定</h1>
        <div class="">
            <div class="circle">
                <img src="{{ $profile->image ?? '' }}" alt="" name="image">
            </div>
            <input type="file">
        </div>
        <div class="">
            <h4>ユーザー名</h4>
            <input type="text" class="edit" name="name" value="{{ $user->name ?? '' }}">
        </div>
        <div class="">
            <h4>郵便番号</h4>
            <input type="text" class="edit" name="post_number" value="{{ $profile->post_number ?? '' }}">
        </div>
        <div class="">
            <h4>住所</h4>
            <input type="text" class="edit" name="address" value="{{ $profile->address ?? '' }}">
        </div>
        <div class="">
            <h4>建物名</h4>
            <input type="text" class="edit" name="building" value="{{ $profile->building ?? '' }}">
        </div>
        <button class="button">更新する</button>    
    </form>
</div>


@endsection