<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'consultation_id',
    ];
    public function Consultation() {
        return $this->belongsTo(Consultation::class);
    }
}
