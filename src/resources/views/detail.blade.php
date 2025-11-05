@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection 

@section('content')

<!-- <h1>OK</h1>
<div class="item_card">
    <img class="image" src="{{$item->image}}" alt="代替テキスト">
    <p>{{$item->name}}</p>
</div> -->

<div class="layout">
    <div class="flame">
        <div class="flame_left">
            <img class="image" src="{{$item->image}}" alt="代替テキスト">
        </div>
        <div class="flame_right">
            <div class="name">
                <h2>{{$item->name}}</h2>
            </div>
            <div class="brand"></div>
            <div class="price"></div>
            <div class="good"></div>
            <div class="button"></div>
            <div class="item_detail"></div>
            <div class="item_info"></div>
            <div class="comment"></div>
        </div>
    </div>
</div>

@endsection