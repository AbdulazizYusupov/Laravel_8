<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeOrDislike extends Model
{
    use HasFactory;
    protected $table = 'like_or_dislikes';
    protected $fillable = [
        'post_id',
        'user_id',
        'value'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
