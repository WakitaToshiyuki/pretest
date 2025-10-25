@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection 

@section('content')

<h1>OK</h1>
<div class="item_card">
    <img class="image" src="{{$item->image}}" alt="代替テキスト">
    <p>{{$item->name}}</p>
</div>

@endsection