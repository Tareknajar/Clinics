<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'age',
        'phone',
        'Gender',
    ];

    public function rating(){
        return $this->hasMany(ratings::class);
    }

    public function preview(){
        return $this->hasMany(previews::class);
    }
    public function condition(){
        return $this->hasMany(medical_conditions::class);
    }
}
