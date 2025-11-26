@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/buy.css') }}" />
@endsection 

@section('content')
<div class="layout">
    <div class="flame">
        <div class="flame_left">
            <div class="">
                <div class="">
                    <img src="{{$item->image}}" alt="代替テキスト">
                </div>
                <div class="">
                    <h3>{{$item->name}}</h3>
                    <p>￥{{$item->price}}</p>
                </div>
            </div>
            <div class="">
                <h4>支払い方法</h4>
                <form action="">
                    <select name="" >
                        <option disabled selected value>選択してください</option>
                        <option value="コンビニ払い">コンビニ払い</option>
                        <option value="カード支払い">カード支払い</option>
                    </select>
                </form>
            </div>
            <div class="">
                <div class="">
                    <h4>配送先</h4>
                    <a href="">変更する</a>
                </div>
                <p>〒{{$profile->post_number}}</p>
                <p>{{$profile->address}}{{$profile->building}}</p>
            </div>
        </div>
        <div class="flame_right">
            <form action="">
            @csrf
                <div class="">
                    <div class="">
                        <p>商品代金</p>
                        <p>￥{{$item->price}}</p>
                    </div>
                    <div class="">
                        <p>支払い方法</p>
                        <p></p>
                    </div>
                </div>
                <button>購入する</button>
            </form>
        </div>
    </div>
</div>


@endsection