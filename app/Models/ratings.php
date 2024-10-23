<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratings extends Model
{
    use HasFactory;

    protected $fillable=[
        'reate',
        'comment',
        'patient_id',
        'doctor_id',
    ];
    public function patient(){
        return $this->belongsTo(patients::class,'patient_id');
    }

    public function doctor(){
        return $this->belongsTo(doctors::class,'doctor_id');
    }
}
