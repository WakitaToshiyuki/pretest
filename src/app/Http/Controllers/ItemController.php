<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

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
            return redirect('/');
        }
    }

    public function logout(){
        $items=Item::all();
        return view('index',['items'=>$items]);
        // return redirect('/');
    }

    public function register(){
        return view('auth.register');
    }

    public function save(Request $request){
        $form=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        User::create($form);
        return redirect('/login');
    }

    public function mypage(){
        $items=Item::all();
        return view('profile',['items'=>$items]);
    }


    public function detail(){
        $items=Item::all();
        return view('detail',['items'=>$items]);
    }

}
