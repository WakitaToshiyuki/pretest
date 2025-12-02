<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


// ModelをAuthenticatableにした
class User extends Authenticatable
{
    use Notifiable;


    use HasFactory;
    protected $fillable=['name','email','password'];

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    // protected static function booted(){
    //     static::created(function ($user) {
    //         $user->profile()->create([
    //             'name' => $user->name,
    //             'user_id' =>$user->id,
    //         ]);
    //     });
    // }



}
