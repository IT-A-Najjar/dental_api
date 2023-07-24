<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pateints extends Model
{
    use HasFactory;
    protected $fillable=[
        'full_name',
        'age',
        'phone_number',
        'user_id',
        'illness_id',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Illness(){
        return $this->belongsTo(Illnesse::class);
    }
}
