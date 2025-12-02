<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable=['user_id','name','post_number','address','building','image'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected static function booted(){
        static::updated(function ($profile) {
            if ($profile->user) {
                $profile->user->update([
                    'name' => $profile->name,
                ]);
            }
        });
    }

}
