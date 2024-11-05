<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'text',
        'img',
        'like',
        'dislike',
        'view',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function views()
    {
        return $this->hasOne(View::class,'post_id','id');
    }
    public function like_or_dislikes()
    {
        return $this->hasOne(LikeOrDislike::class, 'post_id', 'id');
    }
    public function comments()
    {
        return $this->hasOne(Comment::class, 'user_id', 'id');
    }
}
