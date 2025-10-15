@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection 

@section('content')
<div class="layout">
    <table>
        <tr class="label">
            <th>
                <p class="label_1">おすすめ</p>
            </th>
            <th>
                <p class="label_2">マイリスト</p>
            </th>
        </tr>
        <tr class="items">
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