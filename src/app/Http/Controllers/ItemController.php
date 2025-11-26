<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Comment;
use App\Models\Profile;
// 仮↓
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
        return redirect('/mypage/profile');
    }

    public function mypage(){
        $items=Item::all();
        return view('profile',['items'=>$items]);
    }

    public function detail($item_id){
        $item = Item::findOrFail($item_id);
        $comments = $item->comments;
        return view('detail', compact('item','comments',));
    }


    // 仮↓
    public function sell(){
        return view('item');
    }

    public function edit(){
        return view('edit');
    }

    public function buy($item_id){
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        $profile = $user->profile;
        return view('buy',compact('item','profile'));
    }

    public function toggleLike($item_id){
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        if ($item->isLikedBy($user)) {
            // すでにいいねしている → 削除
            $item->likes()->where('user_id', $user->id)->delete();
        } 
        else {
            // まだいいねしていない → 追加
            $item->likes()->create([
                'user_id' => $user->id,
            ]);
        }
        return redirect()->route('detail', ['item_id' => $item->id])->with(compact('item'));
    }

    public function comment($item_id,Request $request){
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        $form = [
            'user_id' => $user->id,
            'item_id' => $item->id,
            'comment' => $request->comment,
        ];
        Comment::create($form);
        return redirect()->route('detail', ['item_id' => $item->id])->with(compact('item'));
    }
}
