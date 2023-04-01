<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'slug','category_id','user_id','img_path','body','short_desc'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function getLikedAttribute()
{
    return $this->likes()->where('user_id', auth()->id())->where('type', 0)->exists();
}

public function getDislikedAttribute()
{
    return $this->likes()->where('user_id', auth()->id())->where('type', 1)->exists();
}

public function getLikesCountAttribute()
{
    return $this->likes()->where('type', 0)->count();
}

public function getDislikesCountAttribute()
{
    return $this->likes()->where('type', 1)->count();
}

}
