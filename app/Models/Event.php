<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $table = "events";

    protected $fillable = [
        "ar_name",
        "en_name",
        "city_id",
        "start_date",
        "end_date",
        "open_time",
        "close_time",
        "ar_description",
        "en_description",
        "ar_location",
        "en_location",
        "map_location"
    ];

    public $timestamps = false;

    public function setArNameAttribute($value)
    {
        $this->attributes['ar_name'] = strtolower($value);
    }
    public function setEnNameAttribute($value)
    {
        $this->attributes['en_name'] = strtolower($value);
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d');
    }
    public function getStartDateAttribute()
    {
         return Carbon::parse($this->attributes['start_date'])->format('Y-m-d');
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::parse($value)->format('Y-m-d');
    }
    public function getEndDateAttribute()
    {
         return Carbon::parse($this->attributes['end_date'])->format('Y-m-d');
    }

    public function setOpenTimeAttribute($value)
    {
        $this->attributes['open_time'] = Carbon::parse($value)->format('H:i');
    }
    public function getOpenTimeAttribute()
    {
         return Carbon::parse($this->attributes['open_time'])->format('H:i');
    }

    public function setCloseTimeAttribute($value)
    {
        $this->attributes['close_time'] = Carbon::parse($value)->format('H:i');
    }
    public function getCloseTimeAttribute()
    {
         return Carbon::parse($this->attributes['close_time'])->format('H:i');
    }

    public function city()
    {
    return $this->belongsTo(City::class);
    }

    public function images(){
        return $this->hasMany('App\Models\Image1','event_id','id');
    }

}
