<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illnesse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function States(){
        return $this->hasMany(state::class);
    }
    public function Pateints(){
        return $this->hasMany(Pateints::class);
    }
    
}
