@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection 

@section('content')
<div>
    <table>
        <tr>
            <th></th>
            <th>ユーザー名</th>
            <th>
                <button>プロフィールを編集</button>
            </th>
        </tr>
        <tr>
            <th>出品した商品</th>
            <th>購入した商品</th>
        </tr>
        <tr>
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