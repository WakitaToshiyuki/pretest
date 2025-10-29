@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection 

@section('content')
<div class="layout">
    <table>
        <tr class="label">
            <th>
                <div class="circle">
                    <img class="profile" src="" alt="">
                </div>
            </th>
            <th>ユーザー名</th>
            <th>
                <a href="/mypage/profile">プロフィールを編集</a>
            </th>
        </tr>
        <tr>
            <th>出品した商品</th>
            <th>購入した商品</th>
        </tr>
        <tr class="item">
            @foreach ($items as $item)
            <td>
                <div class="item_card">
                    <img class="image" src="{{$item->image}}" alt="代替テキスト">
                    <p>{{$item->name}}</p>
                </div>
            </td>
            @endforeach
        </tr>
    </table>
</div>


@endsection