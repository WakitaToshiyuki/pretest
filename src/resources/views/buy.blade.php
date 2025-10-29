@extends('layouts.app') 
@section('css')
<link rel="stylesheet" href="{{ asset('css/buy.css') }}" />
@endsection 

@section('content')
<div class="layout">
    <div class="flame">
        <div class="flame_left">
            <div>
                <img src="" alt="">
            </div>
        </div>
        <div class="flame_right">
            <form action="">
            @csrf
                <h2></h2>
                <p></p>
                <p></p>
                <div></div>
                <button>購入手続きへ</button>
            </form>
        </div>
    </div>
</div>


@endsection