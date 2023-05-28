<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = "plans";

    protected $fillable = [ 
    "name",
    "tourist_id",
    "breakfast_id",
    "lunch_id",
    "dinner_id",
    "landmark_id",
    "event_id",
    "start_time",
    "end_time",
    "type_id",
    "city_id",
    "start_date",
    "end_date",
    "stars",
    ];

    public $timestamps = false;

    public function setArNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
    public function setEnNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function city()
    {
    return $this->belongsTo(City::class);
    }
}
