<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class previews extends Model
{
    use HasFactory;

    protected $fillable=[
        'date',
        'time',
        'doctor_id',
        'patient_id'
    ];
    public function doctor(){
        return $this->belongsTo(doctors::class,'doctor_id');
    }
    public function patient(){
        return $this->belongsTo(patients::class,'patient_id');
    }

}
