<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctors extends Model
{
    use HasFactory;

    protected $fillable=['name','age','phone','Specialization_id'];
    
    public function Specialization(){
        return $this->belongsTo(specialization::class,'Specialization_id');
    }

    public function rating(){
        return $this->hasMany(ratings::class);
    }
    public function preview(){
        return $this->hasMany(previews::class);
    }


}
