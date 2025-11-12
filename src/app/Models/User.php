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

}
