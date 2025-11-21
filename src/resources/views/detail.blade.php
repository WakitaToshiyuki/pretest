@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection 

@section('content')

<div class="layout">
    <div class="flame">
        <div class="flame_left">
            <img class="image" src="{{$item->image}}" alt="代替テキスト">
        </div>
        <div class="flame_right">
            <div class="name">
                <h2>{{$item->name}}</h2>
            </div>
            <div class="brand">
                <p>{{$item->brand}}</p>
            </div>
            <div class="price">
                <p>￥{{$item->price}}(税込み)</p>
            </div>
            <div class="like">
                <form action="{{ route('like',['item_id'=>$item->id]) }}" method="POST">
                    @csrf
                    <button type="submit" id="like-button" item_id="{{ $item->id }}">
                        {{ $item->likes()->count() }} いいね
                    </button>
                </form>
            </div>
            <div class="button">購入手続きへ</div>
            <div class="item_detail">
                <p>{{$item->explanation}}</p>
            </div>
            <div class="item_info">
                <div class="category"></div>
                <div class="quality">
                    <p>商品の状態</p>
                    <p>{{$item->quality}}</p>
                </div>
            </div>
            <div class="comment">
                <form action="{{ route('comment',['item_id'=>$item->id]) }}" method="POST">
                @csrf
                    <p>コメント()</p>
                    
                    <div class="others">
                        <div class=""></div>
                        <div class=""></div>
                    </div>
                    
                    <p class="">
                        商品へのコメント
                    </p>
                    <textarea name="comment"></textarea>
                    <div class="">
                        <button type="submit">コメントを送信する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection