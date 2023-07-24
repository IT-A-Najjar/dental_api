<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable=[
        'content',
        'is_viwe',
    ];
    public function Comments(){
        return $this->hasMany(Comments::class);
    }
}
