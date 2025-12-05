@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}" />
@endsection 

@section('content')
<div class="">
    <h2>住所の変更</h2>
    <form action="" method="POST">
    @csrf
        <h3 class="tytle">郵便番号</h3>
        <input type="text" class="" name="post_number" value="{{$profile->post_number}}">
        <h3 class="tytle">住所</h3>
        <input type="text" class="" name="address" value="{{$profile->address}}">
        <h3 class="tytle">建物名</h3>
        <input type="text" class="" name="building" value="{{$profile->building}}">
        <button>更新する</button>
    </form>
</div>


@endsection