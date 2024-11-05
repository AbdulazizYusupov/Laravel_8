<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Javob extends Model
{
    use HasFactory;
    protected $table = 'javobs';
    protected $fillable = [
        'user_ip',
        'savol_id',
        'variant_id'
    ];
    public function question()
    {
        return $this->belongsTo(Question::class, 'savol_id');
    }
    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }
}
