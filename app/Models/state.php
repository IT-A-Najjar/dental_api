<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;
    protected $fillable=[
        'state_name','description','time','place','pateint_id','illness_id'
    ];

    public function Illnesse() {
        return $this->belongsTo(Illnesse::class);
    }
    public function Pateint() {
        return $this->belongsTo(Pateints::class);
    }
}
