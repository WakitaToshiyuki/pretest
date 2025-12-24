<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Purchase;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ExhibitionRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PurchaseRequest;

class ItemController extends Controller
{
    public function index(){
        $items=Item::all();
        return view('index', ['items' => $items]);
    }

    public function search(Request $request){
        $search = $request->input("search_word");
        $items=Item::where('name','LIKE',"%{$search}%")->get();
        return view('index', ['items' => $items]);
    }

    public function login(){
        return view('auth.login');
    }

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
        $categories = $item->categories;
        return view('detail', compact('item','comments','categories',));
    }

    public function sell(){
        $user = auth()->user();
        return view('item');
    }

    public function sell_action(ExhibitionRequest $request){
        $user = auth()->user();
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName(); 
        $file->storeAs('public/images', $filename);
        $form = [
            'user_id' => $user->id,
            'name' => $request->name,
            'explanation' => $request->explanation,
            'price' => $request->price,
            'quality' => $request->quality,
            'image' => $filename,
            'brand' => $request->brand,
        ];
        $item = Item::create($form);
        $categoryIds = [];
        foreach ($request->category as $categoryName) {
            $category = Category::firstOrCreate(['category' => $categoryName]);
            $categoryIds[] = $category->id;
        }
        $item->categories()->sync($categoryIds);
        return redirect('/');
    }

    public function edit(){
        $user = auth()->user();
        $profile = $user->profile;
        return view('edit',compact('user','profile',));
    }

    public function update(ProfileRequest $request){
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();
        $form = [
            'user_id' => $user->id,
            'name' => $request->name,
            'post_number' => $request->post_number,
            'address' => $request->address,
            'building' => $request->building,
        ];

        if ($request->hasFile('image')) {
            if ($profile && $profile->image) {
                Storage::delete($profile->image);
            }
            $form['image'] = $request->file('image')->store('public/images');
        }else{
            $form['image'] = $profile->image ?? null;
        }

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
        $address = session('temp_data');
        return view('buy',compact('item','profile','address'));
    }

    public function purchase($item_id,purchaseRequest $request){
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        $form =[
            'user_id'=>$user->id,
            'item_id'=>$item->id,
            'method'=>$request->method,
            'post_number'=>$request->post_number,
            'address'=>$request->address,
            'building'=>$request->building,
        ];
        Purchase::create($form);
        return redirect('/');
    }

    public function address($item_id){
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        $profile = $user->profile;
        return view('address',compact('item','profile'));
    }

    public function change($item_id,AddressRequest $request){
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        $profile = $user->profile;
        session([
            'temp_data' => [
                'post_number' => $request->input('post_number'),
                'address'=> $request->input('address'),
                'building'=> $request->input('building'),
            ]
        ]);
        return redirect()->route('buy', ['item_id' => $item->id]);
    }

    public function toggleLike($item_id){
        $item = Item::findOrFail($item_id);
        $user = auth()->user();
        if ($item->isLikedBy($user)) {
            $item->likes()->where('user_id', $user->id)->delete();
        } 
        else {
            $item->likes()->create([
                'user_id' => $user->id,
            ]);
        }
        return redirect()->route('detail', ['item_id' => $item->id])->with(compact('item'));
    }

    public function comment($item_id,CommentRequest $request){
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
