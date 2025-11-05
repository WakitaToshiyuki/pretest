<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;

// 仮↓
use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\Middleware\Authenticate as Middleware;
// use Laravel\Fortify\Features;

class ItemController extends Controller
{
    public function index(){
        $items=Item::all();
        return view('index', ['items' => $items]);
    }

    public function login(){
        return view('auth.login');
    }

    public function check(Request $request){
        $credentials=$request->only('email', 'password');

        if(Auth::attempt($credentials)){
            dd($credentials);
            return redirect('/');
        }
    }

    public function logout(){
        $items=Item::all();
        return redirect('/');
    }

    public function register(){
        return view('auth.register');
    }

    public function save(Request $request){
        $form=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];
        User::create($form);
        return redirect('/login');
    }

    public function mypage(){
        $items=Item::all();
        return view('profile',['items'=>$items]);
    }


    public function detail($item_id){
        // $item=Item::find($request->id);
        // $items=Item::all();
        // return view('detail',['item'=>$item]);

        // 仮↓
        $item = Item::findOrFail($item_id);
        return view('detail', compact('item'));
    }

    public function sell(){
        return view('item');
    }

    public function edit(){
        return view('edit');
    }

    public function buy(){
        return view('buy');
    }

}
