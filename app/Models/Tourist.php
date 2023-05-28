<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;


class Tourist extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = "tourists";

    protected $fillable = [
        "name",
        "email",
        "password",
        "city_id",
        "date_of_birth",
        "nationality_id"
    ];

    public $timestamps = false;

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = Carbon::parse($value)->format('d-m-y');
    }
    public function getDateOfBirthAttribute()
    {
         return Carbon::parse($this->attributes['date_of_birth'])->format('d-m-y');
    }

    public function favorites(){
        return $this->hasMany('App\Models\Favorite','tourist_id','id');
    }
    
}
