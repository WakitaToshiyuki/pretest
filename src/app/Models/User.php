<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// 仮↓
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


// ModelをAuthenticatableにした
class User extends Authenticatable
{
    // 仮↓
    use Notifiable;


    use HasFactory;
    protected $fillable=['name','email','password'];

    public function goods() {
        return $this->hasMany(Good::class);
    }

}
