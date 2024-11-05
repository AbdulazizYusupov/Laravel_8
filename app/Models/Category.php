<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Post;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'tr',
        'is_active'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
