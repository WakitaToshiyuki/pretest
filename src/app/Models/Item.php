<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable=['user_id','name','explanation','price','image','brand'];
    public function categories(): BelongsToMany{
        return $this->belongsToMany(Category::class);
    }

    public function goods() {
        return $this->hasMany(Good::class);
    }
    public function isLikedBy(User $user) {
        return $this->goodss()->where('user_id', $user->id)->exists();
    }

}
