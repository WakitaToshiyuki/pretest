@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/buy.css') }}" />
@endsection 

@section('content')
<div class="layout">
    <div class="flame">
        <form action="" method="POST">
        @csrf
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
                    <select name="method" id="select">
                        <option disabled selected value>選択してください</option>
                        <option value="コンビニ払い">コンビニ払い</option>
                        <option value="カード支払い">カード支払い</option>
                    </select>
                </div>
                <div class="">
                    <div class="">
                        <h4>配送先</h4>
                        <a href="{{ route('address',['item_id'=>$item->id]) }}">変更する</a>
                    </div>
                    <div class="">
                        <p>〒</p>
                        <p>{{ $address['post_number'] ?? $profile->post_number }}</p>
                        <input type="hidden" name="post_number" value="{{ $address['post_number'] ?? $profile->post_number }}">
                    </div>
                    <div class="">
                        <p>{{ $address['address'] ?? $profile->address }}</p>
                        <input type="hidden" name="address" value="{{ $address['address'] ?? $profile->address }}">
                        <p>{{ $address['building'] ?? $profile->building }}</p>
                        <input type="hidden" name="building" value="{{ $address['building'] ?? $profile->building }}">
                    </div>
                </div>
            </div>
            <div class="flame_right">
                <div class="">
                    <div class="">
                        <p>商品代金</p>
                        <p>￥{{$item->price}}</p>
                    </div>
                    <div class="">
                        <p>支払い方法</p>
                        <p>
                            <span id="selectedValue"></span>
                            <script>
                                document.getElementById('select').addEventListener('change', function() {
                                    document.getElementById('selectedValue').textContent = this.value;
                                });
                            </script>
                        </p>
                    </div>
                </div>
                <button>購入する</button>
            </div>
        </form>
    </div>
</div>


@endsection