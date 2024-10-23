<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medical_conditions extends Model
{
    use HasFactory;
    protected $fillable=[
        'the_condition',
        'Tests',
        'patients_id'];

        public function patient(){
            return $this->belongsTo(patients::class,'patients_id');
        }
}
