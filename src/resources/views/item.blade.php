@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}" />
@endsection 

@section('content')
<div class="layout">
    <form action="" method="post" class="form">
    @csrf
        <h1 class="title">商品の出品</h1>
        <div>
            <h4>商品画像</h4>
            <div>
                <input type="file">
            </div>
        </div>
        <div>
            <div>
                <h2>商品の詳細</h2>
            </div>
            <h4>カテゴリー</h4>
            <div class="checkbox">
                <label for="category-fashion">
                    <input type="checkbox" id="category-fashion" name="category" value="ファッション" class="button">
                    <span class="word">ファッション</span>
                </label>
                <label for="category-kaden">
                    <input type="checkbox" id="category-kaden" name="category" value="家電" class="button">
                    <span class="word">家電</span>
                </label>
                <label for="category-interior">
                    <input type="checkbox" id="category-interior" name="category" value="インテリア" class="button">
                    <span class="word">インテリア</span>
                </label>
                <label for="category-ladies">
                    <input type="checkbox" id="category-ladies" name="category" value="レディース" class="button">
                    <span class="word">レディース</span>
                </label>
                <label for="category-mens">
                    <input type="checkbox" id="category-mens" name="category" value="メンズ" class="button">
                    <span class="word">メンズ</span>
                </label>
                <label for="category-cosmetics">
                    <input type="checkbox" id="category-cosmetics" name="category" value="コスメ" class="button">
                    <span class="word">コスメ</span>
                </label>
                <label for="category-book">
                    <input type="checkbox" id="category-book" name="category" value="本" class="button">
                    <span class="word">本</span>
                </label>
                <label for="category-game">
                    <input type="checkbox" id="category-game" name="category" value="ゲーム" class="button">
                    <span class="word">ゲーム</span>
                </label>
                <label for="category-sport">
                    <input type="checkbox" id="category-sport" name="category" value="スポーツ" class="button">
                    <span class="word">スポーツ</span>
                </label>
                <label for="category-kitchen">
                    <input type="checkbox" id="category-kitchen" name="category" value="キッチン" class="button">
                    <span class="word">キッチン</span>
                </label>
                <label for="category-handmade">
                    <input type="checkbox" id="category-handmade" name="category" value="ハンドメイド" class="button">
                    <span class="word">ハンドメイド</span>
                </label>
                <label for="category-accessory">
                    <input type="checkbox" id="category-accessory" name="category" value="アクセサリー" class="button">
                    <span class="word">アクセサリー</span>
                </label>
                <label for="category-toy">
                    <input type="checkbox" id="category-toy" name="category" value="おもちゃ" class="button">
                    <span class="word">おもちゃ</span>
                </label>
                <label for="category-baby_kid">
                    <input type="checkbox" id="category-baby_kid" name="category" value="ベビー・キッズ" class="button">
                    <span class="word">ベビー・キッズ</span>
                </label>
            </div>
            <div>
                <h4>商品の状態</h4>
                <select name="quality" >
                    <option disabled selected value>選択してください</option>
                    <option value="良好">良好</option>
                    <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
                    <option value="やや傷や汚れあり">やや傷や汚れあり</option>
                    <option value="状態が悪い">状態が悪い</option>
                </select>
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
                <input type="number">
            </div>
        </div>
        <button>出品する</button>
    </form>
</div>


@endsection