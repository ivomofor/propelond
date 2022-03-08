<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use MediaAlly;

    protected $fillable = ['description', 'image_path', 'video_path', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->with("user");
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
