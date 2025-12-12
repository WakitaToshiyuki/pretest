<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;
    protected $fillable=['user_id','name','explanation','quality','price','image','brand'];
    public function categories(): BelongsToMany{
        return $this->belongsToMany(Category::class, 'category_item');
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
    public function isLikedBy(User $user) {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'item_id');
    }

}
