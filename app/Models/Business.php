<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
    ];
    public function User() {
        return $this->belongsTo(User::class);
    }
}
