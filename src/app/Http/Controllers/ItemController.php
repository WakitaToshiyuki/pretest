<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Comment;
use App\Models\Profile;
// 仮↓
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\CreateNewUser;

class ItemController extends Controller
{
    public function index(){
        $items=Item::all();
        return view('index', ['items' => $items]);
    }

    public function login(){
        return view('auth.login');
    }

    // public function check(Request $request){
    //     $credentials=$request->only('email', 'password');

    //     if(Auth::attempt($credentials)){
    //         dd($credentials);
    //         return redirect('/');
    //     }
    // }

    // public function logout(){
    //     $items=Item::all();
    //     return redirect('/');
    // }

    public function register(){
        return view('auth.register');
    }

    public function save(Request $request, CreateNewUser $creator){
        $user = $creator->create($request->all());
        Auth::login($user);
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
        $user = auth()->user();
        $profile = $user->profile;
        return view('edit',compact('user','profile',));
    }

    public function update(Request $request){
        $user = auth()->user();

        $request->merge(['user_id'=>$user->id]);
        $form = $request->all();
        // $form = [
        //     'user_id' => $user->id,
        //     'name' => $request->name,
        //     'post_number' => $request->post_number,
        //     'address' => $request->address,
        //     'building' => $request->building,
        //     'image' => $request->image,
        // ];
        unset($form['_token']);
        $profile = Profile::where('user_id', $user->id)->first();
        // $profile = $user->profile;
        if($profile){
            $profile->update($form);
            $profile->user->update([
                'name' => $profile->name,
            ]);
        }else{
            Profile::create($form);
            $user->update([
                'name' => $request->name,
            ]);
        }
        return redirect('/');
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
