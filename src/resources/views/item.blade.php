@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}" />
@endsection 

@section('content')
<div>
    <form action="">
    @csrf
        <h1>商品の出品</h1>
        <div>
            <h4>商品画像</h4>
            <div>
                <button>画像を選択する</button>
            </div>
        </div>
        <div>
            <div>
                <h2>商品の詳細</h2>
            </div>
            <div>
                <h4>カテゴリー</h4>
                <input type="text">
            </div>
            <div>
                <h4>商品の状態</h4>
                <input type="text">
            </div>
        </div>
        <div>
            <div>
                <h2>商品名と説明</h2>
            </div>
            <div>
                <h4>商品名</h4>
                <input type="text">
            </div>
            <div>
                <h4>ブランド名</h4>
                <input type="text">
            </div>
            <div>
                <h4>商品の説明</h4>
                <input type="text">
            </div>
            <div>
                <h4>販売価格</h4>
                <input type="text">
            </div>
        </div>
        <button></button>
    </form>
</div>


@endsection