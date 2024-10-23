<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialization extends Model
{
    use HasFactory;
    protected $fillable=['name_specialization'];

    public function doctor(){
        return $this->hasOne(doctors::class);
    }
}
