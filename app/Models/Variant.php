<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $table = 'variants';
    protected $fillable = [
        'savol_id',
        'variant',
    ];
    public function question()
    {
        return $this->belongsTo(Question::class, 'savol_id');
    }
    public function javobs()
    {
        return $this->hasMany(Javob::class, 'variant_id', 'id');
    }
}
