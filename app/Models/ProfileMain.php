<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMain extends Model
{
    use HasFactory;
    protected $fillable = ['uname', 'fname', 'lname', 'gender', 'contact_no', 'location', 'profession', 'short_desc', 'facebook_link', 'insta_link', 'twitter_link', 'youtube_link', 'linkdin_link', 'github_link', 'web_link', 'img_path', 'header_img_path', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}