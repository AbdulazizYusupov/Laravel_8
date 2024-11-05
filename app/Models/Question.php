<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
        'name',
    ];
    public function variants()
    {
        return $this->hasMany(Variant::class, 'savol_id', 'id');
    }
    public function javobs()
    {
        return $this->hasMany(Javob::class, 'savol_id', 'id');
    }
}
